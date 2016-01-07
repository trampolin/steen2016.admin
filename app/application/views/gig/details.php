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
                    <div class="jarviswidget jarviswidget-color-darken" id="gig-details-base"
                         data-widget-editbutton="false"
                         data-widget-colorbutton="false"
                         data-widget-fullscreenbutton="false"
                         data-widget-deletebutton="false">

                        <header>
                            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                            <h2><?= $oGig->title ?></h2>

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

                                <?php var_dump($oGig) ?>

                                <form id="update-gig-form" class="smart-form" novalidate="novalidate" data-id="<?= $oGig->id ?>">



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
                    <div class="jarviswidget jarviswidget-color-darken" id="venue-details-base"
                         data-widget-editbutton="false"
                         data-widget-colorbutton="false"
                         data-widget-fullscreenbutton="false"
                         data-widget-deletebutton="false">

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

                                <?php var_dump($oVenue) ?>

                                <form id="update-venue-form" class="smart-form" novalidate="novalidate" data-id="<?= $oGig->id ?>">



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

            </div>
        </div>






    </div>

    <!-- end row -->

    <!-- end row -->

</section>
<!-- end widget grid -->

<?php $this->venue_model->venueModal() ?>


