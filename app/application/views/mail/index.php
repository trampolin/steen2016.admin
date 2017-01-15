<?php
/**
 * @author      Richard Mahr <scherhak@pferdewetten.de>
 * @copyright   2017, Pferdewetten-Service GmbH
 * @version     3.1.9
 */

?>

<ul id="mail-account-tabs" class="nav nav-tabs bordered">
    <li class="active">
        <a href="#mail-dash"  data-toggle="tab" aria-expanded="true">Dashboard</a>
    </li>
    <?php foreach ($aAccounts as $aAccount) { ?>
        <li>
            <a href="#account-<?= $aAccount['id'] ?>"  data-toggle="tab" aria-expanded="false"><?= $aAccount['address'] ?></a>
        </li>
    <?php } ?>
</ul>

<div id="mail-account-tab-content" class="tab-content padding-10">

    <div class="tab-pane fade active in" id="mail-dash">
        Dashboard
    </div>

    <?php foreach ($aAccounts as $aAccount) { ?>
        <div class="tab-pane fade" id="account-<?= $aAccount['id'] ?>">
            <?= $aAccount['address'] ?>
        </div>
    <?php } ?>
</div>
