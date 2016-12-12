<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 06.04.16
 * Time: 18:30
 */

if (!isset($oBand->writable)) {
    $oBand->writable = true;
}

if (!isset($oBand->showDetailsButton)) {
    $oBand->showDetailsButton = true;
}

?>

<form id="update-band-form" class="smart-form" novalidate="novalidate" data-id="<?= $oBand->id ?>">

    <fieldset>

                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="name" placeholder="Bandname" value="<?= $oBand->name ?>" <?php if(!$oBand->writable) { echo 'disabled="disabled"'; } ?>>
                </label>

    </fieldset>



    <footer>
        <?php if ($oBand->showDetailsButton) { ?>
            <a class="btn btn-primary" href="<?= base_url() ?>band/details/<?= $oBand->id ?>">Details</a>
        <?php } ?>

        <?php if ($oBand->writable) { ?>

            <button type="submit" class="btn btn-primary">
                Speichern
            </button>

            <span class="btn btn-danger" id="band-details-band-<?= $oBand->id ?>">Löschen</span>

            <script type="text/javascript">
                Steen.request.page.events.addEvent(function() {
                    Steen.forms.createAjaxForm(
                        '#update-band-form',
                        'data/band/submit/<?= $oBand->id ?>',
                        function(response) {
                            Steen.messages.success('Band Details gespeichert');
                        },
                        function(error) {
                            Steen.messages.error(error);
                        }
                    );

                });

                Steen.request.page.events.addEvent(function () {

                    $('#band-details-band-<?= $oBand->id ?>').click(function() {

                        Steen.messages.confirm('Band wirklich Löschen?','Frage',function() {

                            Steen.request.simpleCall('data/band/delete/<?= $oBand->id ?>',
                                function (response) {
                                    Steen.messages.success('Band gelöscht');
                                    Steen.request.page.load('/home');
                                },
                                function (error) {
                                    Steen.messages.error(error);
                                }
                            )

                        })

                    });

                });
            </script>
        <?php } ?>
    </footer>

</form>