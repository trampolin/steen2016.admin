<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 09.01.16
 * Time: 00:05
 */

?>

<article class="col-xs-12">

    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget jarviswidget-color-darken" id="<?= $widgetId ?>"
         data-widget-editbutton="false"
         data-widget-colorbutton="false"
         data-widget-fullscreenbutton="false"
         data-widget-sortable="false"
         data-widget-deletebutton="false">

        <header>
            <span class="widget-icon"> <i class="fa <?= $widgetIcon ?>"></i> </span>
            <h2><?= $widgetTitle ?></h2>

            <?php $widgetHeaderIncludeList->render() ?>

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
                <?php $this->load->view($widgetViewPath,$widgetViewData); ?>
            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->

    </div>
    <!-- end widget -->
</article>
<!-- WIDGET END -->