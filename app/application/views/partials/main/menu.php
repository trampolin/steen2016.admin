<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.12.15
 * Time: 20:25
 */
?>
<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                        <img src="assets/img/avatars/sunny.png" alt="me" class="online" />
						<span>
							john.doe
						</span>
                        <i class="fa fa-angle-down"></i>
                    </a>

				</span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive-->
    <nav>
        <ul>
            <li class="active">
                <a href="<?= base_url() ?>" title="Home"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Home</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bullhorn"></i> <span class="menu-item-parent">Gigs</span></a>
                <ul>
                    <li>
                        <a href="<?= base_url() ?>gig"><i class="fa fa-lg fa-fw fa-info"></i> Übersicht</a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>

</aside>
<!-- END NAVIGATION -->
