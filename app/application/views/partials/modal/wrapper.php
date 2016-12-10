<div class="modal inmodal fade" id="<?= $modalId ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog <?= $modalSize ?>">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="<?= $modalId ?>-title"><?= $modalTitle ?></h4>
                <?php if($modalSubTitle !== null) : ?>
                    <small class="font-bold"><?= $modalSubTitle ?></small>
                <?php endif ?>
            </div>
            <div class="modal-body" id="<?= $modalId ?>-body">
                <span id="<?= $modalId ?>-spinner" >
                    <span class="fa fa-spinner fa-spin"></span> Laden
                </span>

                <span id="<?= $modalId ?>-errorContainer">
                    <span class="label label-danger">Fehler</span> <span
                        id="<?= $modalId ?>-error"></span>
                </span>

                <div id="<?= $modalId ?>-details">

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Schließen</button>
            </div>
        </div>
    </div>
</div>
<?php if($modalLoadFunctionName !== null && $modalAjaxRoute !== null && $modalDataAttribute !== null) : ?>
    <script type="text/javascript">

        Steen.request.page.events.addEvent(function() {
            $('#<?= $modalId ?>-error').html('');
            $('#<?= $modalId ?>-title').html('<?= $modalTitle ?>');
            $('#<?= $modalId ?>-spinner').hide();
            $('#<?= $modalId ?>-details').hide();
            $('#<?= $modalId ?>-errorContainer').hide();

            // function name
            var <?= $modalLoadFunctionName ?> = function(sendingData) {
                var canCreateNew = <?= $modalNew ? 'true' : 'false' ?>;

                if (typeof sendingData !== 'undefined' || canCreateNew) {
                    $('#<?= $modalId ?>-error').html('');
                    $('#<?= $modalId ?>-spinner').show();
                    $('#<?= $modalId ?>-details').hide();
                    $('#<?= $modalId ?>-errorContainer').hide();

                    $.ajax({
                        url: '<?= $modalAjaxRoute ?>' + (typeof sendingData !== 'undefined' ? sendingData : 'new')
                    }).success(function (response) {
                        $('#<?= $modalId ?>-spinner').hide();
                        $('#<?= $modalId ?>-details').show();
                        $('#<?= $modalId ?>-errorContainer').hide();
                        $('#<?= $modalId ?>-details').html(response);
                    }).error(function (jqXHR, textStatus, errorThrown) {
                        $('#<?= $modalId ?>-error').html(jqXHR.responseText);
                        $('#<?= $modalId ?>-spinner').hide();
                        $('#<?= $modalId ?>-details').hide();
                        $('#<?= $modalId ?>-errorContainer').show();
                    });
                } else {
                    $('#<?= $modalId ?>-error').html('No data provided');
                    $('#<?= $modalId ?>-spinner').hide();
                    $('#<?= $modalId ?>-details').hide();
                    $('#<?= $modalId ?>-errorContainer').show();
                }
            };

            $('#<?= $modalId ?>').on('show.bs.modal', function (e) {
                //get data-id attribute of the clicked element
                var sendingData = $(e.relatedTarget).attr('<?= $modalDataAttribute ?>');
                //gwstat.debug(sendingData);
                <?= $modalLoadFunctionName ?>(sendingData);
            });
        });
    </script>
<?php endif ?>