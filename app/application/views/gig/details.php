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
                <?php $gigWidget->render() ?>
            </div>
            <div class="row">
                <?php $personWidget->render() ?>
            </div>
            <div class="row">
                <?php $commentWidget->render() ?>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="row">
                <?php $venueWidget->render(); ?>
            </div>
            <div class="row">
                <?php $bandWidget->render(); ?>
            </div>
        </div>

    </div>



    <!-- end row -->

    <!-- end row -->

</section>
<!-- end widget grid -->

<?php $this->venue_model->venueModal() ?>


