/**
 * Created by rmahr1 on 12.12.15.
 */
Steen = {
    baseUrl: '/',

    init: function(baseUrl) {
        Steen.baseUrl = baseUrl;
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