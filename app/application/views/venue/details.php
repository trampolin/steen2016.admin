<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.12.15
 * Time: 21:16
 */

?>

<!-- widget grid -->
<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6">

            <div class="row">
                <!-- NEW WIDGET START -->
                <article class="col-xs-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-darken" id="venue-details-base"
                         data-widget-editbutton="false"
                         data-widget-colorbutton="false"
                         data-widget-fullscreenbutton="false"
                         data-widget-deletebutton="false">
                        <!-- widget options:
                                        usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                                        data-widget-colorbutton="false"
                                        data-widget-editbutton="false"
                                        data-widget-togglebutton="false"
                                        data-widget-deletebutton="false"
                                        data-widget-fullscreenbutton="false"
                                        data-widget-custombutton="false"
                                        data-widget-collapsed="true"
                                        data-widget-sortable="false"

                                        -->
                        <header>
                            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                            <h2><?= $oVenue->name ?></h2>

                        </header>

                        <!-- widget div-->
                        <div>

                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->

                            </div>
                            <!-- end widget edit box -->

                            <!-- widget content -->
                            <div class="widget-body no-padding">

                                <form id="update-venue-form" class="smart-form" novalidate="novalidate" data-id="<?= $oVenue->id ?>">

                                    <fieldset>

                                        <section>
                                            <label class="input"> <i class="icon-prepend fa fa-globe"></i>
                                                <input type="text" name="name" placeholder="Venue Name" value="<?= $oVenue->name ?>">
                                            </label>
                                        </section>

                                        <div class="row">
                                            <section class="col col-4">
                                                <label class="input"> <i class="icon-prepend fa fa-road"></i>
                                                    <input type="text" name="street" placeholder="Straße" value="<?= $oVenue->street ?>">
                                                </label>
                                            </section>
                                            <section class="col col-2">
                                                <label class="input"> <i class="icon-prepend fa fa-hashtag"></i>
                                                    <input type="text" name="number" placeholder="Hausummer" value="<?= $oVenue->number ?>">
                                                </label>
                                            </section>
                                            <section class="col col-2">
                                                <label class="input"> <i class="icon-prepend fa fa-hashtag"></i>
                                                    <input type="text" name="zip" placeholder="PLZ" value="<?= $oVenue->zip ?>">
                                                </label>
                                            </section>
                                            <section class="col col-4">
                                                <label class="input"> <i class="icon-prepend fa fa-home"></i>
                                                    <input type="text" name="city" placeholder="Stadt" value="<?= $oVenue->city ?>">
                                                </label>
                                            </section>
                                        </div>

                                    </fieldset>

                                    <fieldset>
                                        <section>
                                            <label class="textarea">
                                                <textarea rows="5" name="memo" placeholder="Kommentar"><?= $oVenue->memo ?></textarea>
                                            </label>
                                        </section>
                                    </fieldset>

                                    <footer>
                                        <button type="submit" class="btn btn-primary">
                                            Speichern
                                        </button>
                                    </footer>
                                </form>

                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->

                </article>
                <!-- WIDGET END -->
            </div>


        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="row">
                <article class="col-xs-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-darken" id="venue-details-gigs"
                         data-widget-editbutton="false"
                         data-widget-colorbutton="false"
                         data-widget-fullscreenbutton="false"
                         data-widget-deletebutton="false">
                        <!-- widget options:
                                        usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                                        data-widget-colorbutton="false"
                                        data-widget-editbutton="false"
                                        data-widget-togglebutton="false"
                                        data-widget-deletebutton="false"
                                        data-widget-fullscreenbutton="false"
                                        data-widget-custombutton="false"
                                        data-widget-collapsed="true"
                                        data-widget-sortable="false"

                                        -->
                        <header>
                            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                            <h2>Gigs</h2>
                        </header>

                        <!-- widget div-->
                        <div>

                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->

                            </div>
                            <!-- end widget edit box -->

                            <!-- widget content -->
                            <div class="widget-body no-padding">
                                <table id="venue-gigs" class="table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Datum</th>
                                        <th>Titel</th>
                                        <th>Aktion</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach($aGigs as $oGig) : ?>
                                        <tr data-id="<?= $oGig->id ?>">
                                            <td><?= $oGig->date ?></td>
                                            <td><?= $oGig->title ?></td>
                                            <td><a href="<?= base_url() ?>gig/details/<?= $oGig->id ?>" class="btn btn-primary btn-xs">Details</a> </td>
                                        </tr>
                                    <?php endforeach ?>

                                    </tbody>
                                </table>

                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->

                </article>


                <article class="col-xs-12 col-sm-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-darken" id="venue-details-persons"
                         data-widget-editbutton="false"
                         data-widget-colorbutton="false"
                         data-widget-fullscreenbutton="false"
                         data-widget-deletebutton="false">
                        <!-- widget options:
                                        usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                                        data-widget-colorbutton="false"
                                        data-widget-editbutton="false"
                                        data-widget-togglebutton="false"
                                        data-widget-deletebutton="false"
                                        data-widget-fullscreenbutton="false"
                                        data-widget-custombutton="false"
                                        data-widget-collapsed="true"
                                        data-widget-sortable="false"

                                        -->
                        <header>
                            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                            <h2>Kontakte</h2>

                            <div class="widget-toolbar" role="menu">

                                <button class="btn btn-primary">Kontakt Verknüpfen</button>
                            </div>

                        </header>

                        <!-- widget div-->
                        <div>

                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->

                            </div>
                            <!-- end widget edit box -->

                            <!-- widget content -->
                            <div class="widget-body no-padding">

                                <table id="venue-persons" class="table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Nummer</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach($aPersons as $oGig) : ?>
                                        <tr data-id="<?= $oGig->id ?>">
                                            <td><?= $oGig->firstname ?> <?= $oGig->lastname ?></td>
                                            <td><?= $oGig->phone ?></td>
                                            <td><?= $oGig->email ?></td>
                                        </tr>
                                    <?php endforeach ?>

                                    </tbody>
                                </table>

                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->

                </article>
            </div>
        </div>






    </div>

    <!-- end row -->

    <!-- end row -->

</section>
<!-- end widget grid -->

<?php $this->venue_model->venueModal() ?>


