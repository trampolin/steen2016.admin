<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
                        <img src="<?= base_url() ?>assets/img/avatars/<?= $this->session->avatar ?>" alt="me" class="online" />
						<span>
							<?= $this->_sUserName ?>
						</span>
                        <i class="fa fa-angle-down"></i>
                    </a>

				</span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive-->
    <nav>
        <ul>
            <li class="">
                <a href="<?= base_url() ?>" title="Home"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Home</span></a>
            </li>
            <li class="">
                <a href="<?= base_url() ?>gig" title="Gigs"><i class="fa fa-lg fa-fw fa-bullhorn"></i> <span class="menu-item-parent">Gigs</span></a>
            </li>
            <li class="">
                <a href="<?= base_url() ?>venue" title="Gigs"><i class="fa fa-lg fa-fw fa-globe"></i> <span class="menu-item-parent">Venues</span></a>
            </li>
            <li class="">
                <a href="<?= base_url() ?>mail" title="Mails"><i class="fa fa-lg fa-fw fa-envelope"></i> <span class="menu-item-parent">Mails</span></a>
            </li>
        </ul>
    </nav>

</aside>
<!-- END NAVIGATION -->
