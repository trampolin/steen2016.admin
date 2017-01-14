/**
 * Created by rmahr1 on 12.12.15.
 */
Steen = {
    baseUrl: '/',

    init: function(baseUrl) {
        Steen.baseUrl = baseUrl;
        Steen.request.page.initLinks('body');
        Steen.request.page.events.fire();
    },

    messages: {
        success: function(message,title) {
            $.smallBox({
                title : title ? title : 'Erfolg',
                content : message ? message : 'Anfrage erfolgreich Durchgeführt',
                color : "#468847",
                icon : "fa fa-check",
                timeout : 5000
            })
        },
        error: function(message,title) {
            $.smallBox({
                title : title ? title : 'Fehler',
                content : message ? message : 'Es ist ein Fehler aufgetreten',
                color : "#b94a48",
                icon : "fa fa-exclamation-triangle",
                timeout : 5000
            })
        },
        confirm: function(content,title,yesCallback,noCallback) {

            $.SmartMessageBox({
                title: title ? title : 'Aktion bestätigen',
                content: content ? content : 'Wollen Sie diese Aktion wirklich durchführen?',
                buttons: '[Ja][Nein]'
            }, function (ButtonPressed) {
                if (ButtonPressed === "Ja") {
                    if (typeof yesCallback !== 'undefined') {
                        yesCallback();
                    }
                }
                if (ButtonPressed === "Nein") {
                    if (typeof noCallback !== 'undefined') {
                        noCallback();
                    }
                }

            });


        }
    },

    request: {
        isOk: function(response) {
            return response.success
        },

        simpleCall: function(url,success,error) {
            $.ajax(Steen.baseUrl+url,{
                type: 'POST'
            }).success(function(response) {
                if (Steen.request.isOk(response)) {
                    if (typeof success !== 'undefined') {
                        success(response.data);
                    }
                } else {
                    if (typeof error !== 'undefined') {
                        error(response.data);
                    }
                }
            }).error(function(jqXHR, textStatus, errorThrown) {
                if (typeof error !== 'undefined') {
                    error(jqXHR.responseText);
                }
            });
        },

        page: {
            currentPage: null,
            events: {
                dataTables: [],
                events: [],

                fire: function () {
                    // first fire events
                    for (var i in Steen.request.page.events.events) {
                        Steen.request.page.events.events[i]();
                    }

                    // then fire datatables
                    for (var i in Steen.request.page.events.dataTables) {
                        Steen.tables.create(
                            Steen.request.page.events.dataTables[i].selector,
                            Steen.request.page.events.dataTables[i].options
                        );
                    }

                    Steen.request.page.events.dataTables = [];
                    Steen.request.page.events.events = [];
                },

                addDataTable: function(selector, options) {
                    Steen.request.page.events.dataTables.push({
                        selector: selector,
                        options: options
                    });
                },

                addEvent: function (event) {
                    Steen.request.page.events.events.push(event);
                }
            },



            load: function(url,data,successCallback,errorCallback) {
                $.ajax({
                    type: 'GET',
                    data: data,
                    url: url
                }).success(function(response) {
                    Steen.request.page.currentPage = url;

                    $('#content').html(response);
                    Steen.request.page.initLinks('#content');
                    Steen.request.page.events.fire();

                    window.history.replaceState({},document.title,url);


                    if (typeof successCallback !== 'undefined') {
                        successCallback(response);
                    }
                    pageSetUp();
                }).error(function(jqXHR, textStatus, errorThrown) {
                    Steen.request.page.currentPage = url;

                    $('#content').html(jqXHR.responseText);
                    Steen.request.page.initLinks('#content');
                    Steen.request.page.events.fire();

                    if (typeof errorCallback !== 'undefined') {
                        errorCallback(jqXHR.responseText);
                    }
                });
            },

            initLinks: function(element) {
                $(element).find('a').off('click').click(function (event) {
                    var href = $(this).attr('href');
                    if (Steen.request.page.isLinkInternal(href)) {
                        event.preventDefault();
                        Steen.request.page.load(href);
                        return false; //for good measure
                    } else {
                        return true;
                    }
                });
            },

            isLinkInternal: function(href) {
                return (href.indexOf(Steen.baseUrl) === 0);
            }
        }

        //loadPage: function(event) {
            /*$('a').click(function (event){
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('href')
                    ,success: function(response) {
                        alert(response)
                    }
                })
                return false; //for good measure
            });*/
        //}

    },
    
    widget: {

        reload: function(selector,baseType,targetType,targetId) {
            var url = Steen.baseUrl + 'widget/'+baseType+'/load/' + targetType + '/' + (targetId ? targetId : '');
            $.ajax(
                url
            ).success(function(response) {
                var widgetBody = $(selector).closest('.jarviswidget').find('.widget-body');
                $(widgetBody).html(response);
                Steen.request.page.initLinks(widgetBody);
                Steen.request.page.events.fire();
            }).error(function(jqXHR, textStatus, errorThrown) {
                var widgetBody = $(selector).closest('.jarviswidget').find('.widget-body');
                $(widgetBody).html(jqXHR.responseText);
            });
        },

        comments: {
            reload: function(elementId,targetType,targetId) {
                $.ajax(
                    Steen.baseUrl + 'widget/comments/load/' + elementId + '/' + targetType + '/' + targetId
                ).success(function(response) {
                    $('#' + elementId).closest('.widget-body').html(response);
                    Steen.request.page.events.fire();
                }).error(function(jqXHR, textStatus, errorThrown) {
                    $('#' + elementId).closest('.widget-body').html(jqXHR.responseText);
                });

            }
        },

        band: {
            reload: function(selector,targetType,targetId) {
                Steen.widget.reload(selector,'band',targetType,targetId);
            }
        },

        person: {
            reload: function(selector,targetType,targetId) {
                Steen.widget.reload(selector,'person',targetType,targetId);
            }
        }
    },

    forms: {
        createAjaxForm: function(selector,url,successCallback,errorCallback,clearForm) {

            $(selector).ajaxForm({
                url: Steen.baseUrl + url,
                type: 'post',
                success: function(response) {
                    if (Steen.request.isOk(response)) {
                        if (typeof successCallback !== 'undefined') {
                            successCallback(response.data);
                            if (clearForm) {
                                $(selector)[0].reset();
                            }
                        }
                    } else {
                        if (typeof errorCallback !== 'undefined') {
                            errorCallback(response.data);
                        }
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (typeof errorCallback !== 'undefined') {
                        errorCallback(jqXHR.responseText);
                    }
                }
            });

        }
    },

    tables: {
        create: function(selector,options) {

            if (!options) {
                options = {};
            }

            options.autoWidth = true;

            return $(selector).DataTable(options);
        },

        createAjax: function(selector,url,columns,options) {
            if (!options) {
                options = {};
            }

            options.ajax = Steen.baseUrl+url;
            options.columns = columns;

            return Steen.tables.create(selector,options);
        }
    }
};