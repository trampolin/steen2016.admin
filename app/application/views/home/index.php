<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.12.15
 * Time: 19:53
 */
?>
<div class="row">
    <div class="col-xs-12">
        <div class="alert alert-info">
            Willkommen, <?= $this->_sUserName ?>
        </div>
    </div>
</div>

<section id="widget-grid" class="">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="row">
                <?php $personWidget->render(); ?>
            </div>
            <div class="row">
                <?php $venueWidget->render(); ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="row">
                <?php $gigWidget->render() ?>
            </div>
            <div class="row">
                <?php $bandWidget->render() ?>
            </div>
        </div>
    </div>

</section>
