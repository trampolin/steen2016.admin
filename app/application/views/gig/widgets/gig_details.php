<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 09.01.16
 * Time: 09:38
 */

if (!isset($oGig->writable)) {
    $oGig->writable = true;
}

if (!isset($oGig->showDetailsButton)) {
    $oGig->showDetailsButton = true;
}
?>

<form id="update-gig-form" class="smart-form" novalidate="novalidate" data-id="<?= $oGig->id ?>">

    <fieldset>

        <section>
            <label class="input"> <i class="icon-prepend fa fa-info-circle"></i>
                <input type="text" name="name" placeholder="Gig Titel" value="<?= $oGig->title ?>" <?php if(!$oGig->writable) { echo 'disabled="disabled"'; } ?>>
            </label>
        </section>

        <div class="row">
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                    <input type="date" name="date" placeholder="Datum" value="<?= $oGig->date ?>" <?php if(!$oGig->writable) { echo 'disabled="disabled"'; } ?>>
                </label>
            </section>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-clock-o"></i>
                    <input type="time" name="getin" placeholder="Get in" value="<?= $oGig->getin ?>" <?php if(!$oGig->writable) { echo 'disabled="disabled"'; } ?>>
                </label>
            </section>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-clock-o"></i>
                    <input type="time" name="doors" placeholder="Doors" value="<?= $oGig->doors ?>" <?php if(!$oGig->writable) { echo 'disabled="disabled"'; } ?>>
                </label>
            </section>
        </div>

    </fieldset>


        <footer>
            <?php if ($oGig->showDetailsButton) { ?>
                <a class="btn btn-primary" href="<?= base_url() ?>gig/details/<?= $oGig->id ?>">Details</a>
            <?php } ?>

            <?php if ($oGig->writable) { ?>

            <button type="submit" class="btn btn-primary">
                Speichern
            </button>

                <script type="text/javascript">
                    $(document).ready(function() {
                        Steen.forms.createAjaxForm(
                            '#update-gig-form',
                            'data/gig/submit/<?= $oGig->id ?>',
                            function(response) {
                                Steen.messages.success('Gig Details gespeichert');
                            },
                            function(error) {
                                Steen.messages.error(error);
                            }
                        )
                    });
                </script>
            <?php } ?>
        </footer>



</form>
