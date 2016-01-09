<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 09.01.16
 * Time: 09:38
 */

if (!isset($oVenue->writable)) {
    $oVenue->writable = true;
}

if (!isset($oVenue->showDetailsButton)) {
    $oVenue->showDetailsButton = true;
}
?>

<form id="update-venue-form" class="smart-form" novalidate="novalidate" data-id="<?= $oVenue->id ?>">

    <fieldset>

        <section>
            <label class="input"> <i class="icon-prepend fa fa-globe"></i>
                <input type="text" name="name" placeholder="Venue Name" value="<?= $oVenue->name ?>" <?php if(!$oVenue->writable) { echo 'disabled="disabled"'; } ?>>
            </label>
        </section>

        <div class="row">
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-road"></i>
                    <input type="text" name="street" placeholder="Straße" value="<?= $oVenue->street ?>" <?php if(!$oVenue->writable) { echo 'disabled="disabled"'; } ?>>
                </label>
            </section>
            <section class="col col-2">
                <label class="input"> <i class="icon-prepend fa fa-hashtag"></i>
                    <input type="text" name="number" placeholder="Hausummer" value="<?= $oVenue->number ?>" <?php if(!$oVenue->writable) { echo 'disabled="disabled"'; } ?>>
                </label>
            </section>
            <section class="col col-2">
                <label class="input"> <i class="icon-prepend fa fa-hashtag"></i>
                    <input type="text" name="zip" placeholder="PLZ" value="<?= $oVenue->zip ?>" <?php if(!$oVenue->writable) { echo 'disabled="disabled"'; } ?>>
                </label>
            </section>
            <section class="col col-4">
                <label class="input"> <i class="icon-prepend fa fa-home"></i>
                    <input type="text" name="city" placeholder="Stadt" value="<?= $oVenue->city ?>" <?php if(!$oVenue->writable) { echo 'disabled="disabled"'; } ?>>
                </label>
            </section>
        </div>

    </fieldset>


        <footer>
            <?php if ($oVenue->showDetailsButton) { ?>
                <a class="btn btn-primary" href="<?= base_url() ?>venue/details/<?= $oVenue->id ?>">Details</a>
            <?php } ?>

            <?php if ($oVenue->writable) { ?>

            <button type="submit" class="btn btn-primary">
                Speichern
            </button>

                <script type="text/javascript">
                    $(document).ready(function() {
                        Steen.forms.createAjaxForm(
                            '#update-venue-form',
                            'data/venue/submit/<?= $oVenue->id ?>',
                            function(response) {
                                Steen.messages.success('Venue Details gespeichert');
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
