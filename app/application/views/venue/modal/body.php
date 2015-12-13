<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 11.12.15
 * Time: 14:51
 */
?>

<div class="row">
    <div class="col-xs-12">


        <form id="create-or-update-venue-form" class="smart-form" novalidate="novalidate">

            <fieldset>

                <section>
                    <label class="input"> <i class="icon-prepend fa fa-globe"></i>
                        <input type="text" name="name" placeholder="Venue Name">
                    </label>
                </section>

                <div class="row">
                    <section class="col col-4">
                        <label class="input"> <i class="icon-prepend fa fa-road"></i>
                            <input type="text" name="street" placeholder="Straße">
                        </label>
                    </section>
                    <section class="col col-2">
                        <label class="input"> <i class="icon-prepend fa fa-hashtag"></i>
                            <input type="text" name="number" placeholder="Hausummer">
                        </label>
                    </section>
                    <section class="col col-2">
                        <label class="input"> <i class="icon-prepend fa fa-hashtag"></i>
                            <input type="text" name="zip" placeholder="PLZ">
                        </label>
                    </section>
                    <section class="col col-4">
                        <label class="input"> <i class="icon-prepend fa fa-home"></i>
                            <input type="text" name="city" placeholder="Stadt">
                        </label>
                    </section>
                </div>

            </fieldset>

            <fieldset>
                <section>
                    <label class="textarea">
                        <textarea rows="3" name="memo" placeholder="Kommentar"></textarea>
                    </label>
                </section>
            </fieldset>

            <footer>
                <button type="submit" class="btn btn-primary">
                    Anlegen
                </button>
            </footer>
        </form>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#create-or-update-venue-form').ajaxForm({
                    url: '/data/venue/submit/new',
                    type: 'post',
                    success: function(response) {
                        if (Steen.request.isOk(response)) {
                            Steen.messages.success('Venue erfolgreich eingetragen');
                            $('#create-or-update-venue-form')[0].reset();
                            if (typeof addVenueTableRow !== 'undefined') {
                                addVenueTableRow(response.data);
                            }
                        } else {
                            Steen.messages.error(response.data);
                        }

                    }
                });
            });
        </script>


    </div>
</div>