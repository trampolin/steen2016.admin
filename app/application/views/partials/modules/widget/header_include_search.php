<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 07.05.16
 * Time: 13:11
 */
?>

<label class="input" id="<?= $widgetHeaderIncludeId ?>"> <!--i class="icon-append fa fa-question-circle"></i-->
    <input id="<?= $widgetHeaderIncludeId ?>-input" type="text" placeholder="<?= $widgetHeaderIncludeType ?> eingeben"
           data-type="<?= $widgetHeaderIncludeType ?>"
           data-connect-type="<?= $widgetHeaderIncludeConnectType ?>"
           data-connect-target-id="<?= $widgetHeaderIncludeConnectTargetId ?>"
    >
    <!--b class="tooltip tooltip-top-right">
        <i class="fa fa-warning txt-color-teal"></i>
        Some helpful information</b-->

    <script type="text/javascript">
        Steen.request.page.events.addEvent(function() {
             $('#<?= $widgetHeaderIncludeId ?>-input').autocomplete({

                 source: function( request, response ) {

                     $.getJSON(Steen.baseUrl + "data/<?= $widgetHeaderIncludeType ?>/search", request, function (data, status, xhr) {
                         /* Add a `label` property to each item */
                         $.each(data.data, function (_, item) {
                             item.label = item.name;
                             item.name = item.id;
                         });
                         
                         //Steen.messages.success(data.data.length + ' items found');

                         response(data.data);
                     });
                 },
                 minLength: 3,
                 //appendTo: "#<?= $widgetHeaderIncludeId ?>-input",

                 search: function() {
                     //$('#horse-spinner').show();
                 },

                 response: function() {
                     //$('#horse-spinner').hide();
                 },

                 select: function(event, ui) {
                     var selectId = ui.item.id;

                     $.ajax(
                         Steen.baseUrl + 'data/connect/<?= $widgetHeaderIncludeType ?>/' + selectId + '/<?= $widgetHeaderIncludeConnectType ?>/<?= $widgetHeaderIncludeConnectTargetId ?>'
                     ).success(function(response) {
                         if (Steen.request.isOk(response)) {
                             // todo reload widget;
                             Steen.messages.success('Yeah','Yeah');
                             Steen.widget['<?= $widgetHeaderIncludeType ?>'].reload('<?= $widgetHeaderIncludeId ?>','<?= $widgetHeaderIncludeConnectType ?>','<?= $widgetHeaderIncludeConnectTargetId ?>');
                         } else {
                             Steen.messages.error(response.data);
                         }
                     }).error(function(jqXHR,textStatus,errorThrown) {
                         Steen.messages.error(jqXHR.responseText);
                     });

                 },

                 /*create: function() {
                     $(this).data('ui-autocomplete')._renderItem = function (ul, item) {
                         return $( '<li>' )
                             .append('<a>'+item.label+'</a>')
                             .appendTo(ul);
                     };

                     $(this).data('ui-autocomplete')._renderMenu= function( ul, items ) {
                         var that = this;
                         $.each( items, function( index, item ) {
                             that._renderItemData( ul, item );
                         });
                     }
                 }*/
                 
                 
             });
        });
    </script>
</label>

