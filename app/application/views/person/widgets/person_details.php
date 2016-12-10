<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 06.04.16
 * Time: 18:30
 */

if (!isset($oPerson->writable)) {
    $oPerson->writable = true;
}

if (!isset($oPerson->showDetailsButton)) {
    $oPerson->showDetailsButton = true;
}

?>

<form id="update-person-form" class="smart-form" novalidate="novalidate" data-id="<?= $oPerson->id ?>">

    <fieldset>

        <div class="row">
            <section class="col col-6">
                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="firstname" placeholder="Vorname" value="<?= $oPerson->firstname ?>" <?php if(!$oPerson->writable) { echo 'disabled="disabled"'; } ?>>
                </label>
            </section>
            <section class="col col-6">
                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                    <input type="text" name="lastname" placeholder="Nachname" value="<?= $oPerson->lastname ?>" <?php if(!$oPerson->writable) { echo 'disabled="disabled"'; } ?>>
                </label>
            </section>
            <section class="col col-6">
                <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                    <input type="text" name="email" placeholder="Mail" value="<?= $oPerson->email ?>" <?php if(!$oPerson->writable) { echo 'disabled="disabled"'; } ?>>
                </label>
            </section>
            <section class="col col-6">
                <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                    <input type="text" name="phone" placeholder="Telefon" value="<?= $oPerson->phone ?>" <?php if(!$oPerson->writable) { echo 'disabled="disabled"'; } ?>>
                </label>
            </section>
        </div>

    </fieldset>



    <footer>
        <?php if ($oPerson->showDetailsButton) { ?>
            <a class="btn btn-primary" href="<?= base_url() ?>venue/details/<?= $oPerson->id ?>">Details</a>
        <?php } ?>

        <?php if ($oPerson->writable) { ?>

            <button type="submit" class="btn btn-primary">
                Speichern
            </button>

            <span class="btn btn-danger">Löschen</span>

            <script type="text/javascript">
                Steen.request.page.events.addEvent(function() {
                    Steen.forms.createAjaxForm(
                        '#update-person-form',
                        'data/person/submit/<?= $oPerson->id ?>',
                        function(response) {
                            Steen.messages.success('Personen Details gespeichert');
                        },
                        function(error) {
                            Steen.messages.error(error);
                        }
                    );

                });
            </script>
        <?php } ?>
    </footer>

</form>