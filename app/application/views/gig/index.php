<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.12.15
 * Time: 21:16
 */

?>

<!--section id="page-toprow">
    <div class="row">
        <div class="col-xs-12">
            <button class="btn btn-primary" data-toggle="modal" data-target="#gigModal">Gig anlegen</button>
        </div>
    </div>
</section-->

<!-- widget grid -->
<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-darken" id="gig-list"
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
                    <h2>Alle Gigs</h2>

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

                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                                <th>Ort</th>
                                <th>Titel</th>
                                <th>Datum</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach($aGigs as $oGig) : ?>
                            <tr>
                                <td><a href="<?= base_url() ?>venue/details/<?= $oGig->venue_id ?>"><?= $oGig->name ?></a></td>
                                <td><a href="<?= base_url() ?>gig/details/<?= $oGig->id ?>"><?= $oGig->title ?></a></td>
                                <td><?= $oGig->date ?></td>
                                <td><?= form_dropdown('',$aGigStatus,$oGig->status,'class="form-control input-xs"') ?></td>
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
        <!-- WIDGET END -->

    </div>

    <!-- end row -->

    <!-- end row -->

</section>
<!-- end widget grid -->

<?php $this->gig_model->gigModal() ?>

<script type="text/javascript" src="<?= base_url() ?>assets/js/steen/gig/index.js"></script>


