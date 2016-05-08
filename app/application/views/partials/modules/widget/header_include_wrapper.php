<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 07.05.16
 * Time: 12:52
 */

?>

<div class="widget-toolbar smart-form" role="menu">
    <?php foreach ($aWidgetHeaderIncludes as $oWidgetHeaderInclude) {
        $oWidgetHeaderInclude->render();
    } ?>
</div>
