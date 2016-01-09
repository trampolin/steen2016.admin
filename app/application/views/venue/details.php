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

                <?php $this->load->view('partials/modules/widget_wrapper',$venueWidget->getData()) ?>

            </div>

            <div class="row">

                <?php $this->load->view('partials/modules/widget_wrapper',$commentWidgetData) ?>

            </div>


        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="row">
                <?php $this->load->view('partials/modules/widget_wrapper',$gigWidgetData) ?>


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


