<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.05.16
 * Time: 09:51
 */
?>

<script type="text/javascript">
    Steen.request.page.events.addEvent(function() {

        $('#<?= $widgetId ?>').find('.disconnect-stuff-button').click(function () {

            var that = this;

            Steen.messages.confirm('Diese Verknüpfung wirklich löschen?','Frage', function() {

                var sourceType = $(that).data('source');
                var sourceId = $(that).data('source-id');
                var targetType = $(that).data('target');
                var targetId = $(that).data('target-id');

                var url = 'data/disconnect/' + sourceType + '/' + sourceId + '/' + targetType + '/' + targetId;

                Steen.request.simpleCall(url,function (response) {

                    //Steen.messages.success('jaaaa');
                    Steen.widget[targetType].reload('#<?= $widgetId ?>',sourceType,sourceId);

                }, function(error) {
                    Steen.messages.error(error);

                });

            });

        });

    });
</script>

<!-- END TABLE FOOTER -->