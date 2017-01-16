<?php
/**
 * @author      Richard Mahr <scherhak@pferdewetten.de>
 * @copyright   2017, Pferdewetten-Service GmbH
 * @version     3.1.9
 */

?>

<div id="mail-main-container">
    <ul id="mail-account-tabs" class="nav nav-tabs bordered">
        <li class="active">
            <a href="#mail-dash"  data-toggle="tab" aria-expanded="true">Dashboard</a>
        </li>
        <?php foreach ($aAccounts as $aAccount) { ?>
            <li>
                <a href="#mail-tab"  data-toggle="tab" aria-expanded="false" data-account-id="<?= $aAccount['id'] ?>"><?= $aAccount['address'] ?></a>
            </li>
        <?php } ?>
    </ul>

    <div id="mail-account-tab-content" class="tab-content">

        <div class="tab-pane active" id="mail-dash">

            Dashboard

            <!--table id="inbox-table" class="table table-striped table-hover">
                <tbody>

                <tr id="msg1" class="unread">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            Alex Jones
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span><span class="label bg-color-orange">WORK</span> Karjua Marou</span> New server for datacenter needed
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>
                            <a href="javascript:void(0);" rel="tooltip" data-placement="left" data-original-title="FILES: rocketlaunch.jpg, timelogs.xsl" class="txt-color-darken"><i class="fa fa-paperclip fa-lg"></i></a>
                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg2" class="unread">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            Sadi Orlaf
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span><span class="label bg-color-teal">HOME</span> SmartAdmin.com</span> Sed ut perspiciatis unde....
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>
                            <a href="javascript:void(0);" rel="tooltip" data-placement="left" data-original-title="rocketlaunch.jpg, timelogs.xsl" class="txt-color-darken"><i class="fa fa-paperclip fa-lg"></i></a>
                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg3">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            Arik Lamora
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>Facebook.com</span> Sed ut perspiciatis unde omnis iste natus error...
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg4">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            Robin Hood
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>10 Jobs</span> Sed ut perspiciatis unde omnis iste natus error...
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg5">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            John Limar
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>Project Date</span> Sed ut perspiciatis unde omnis iste natus...
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>
                            <a href="javascript:void(0);" rel="tooltip" data-placement="left" data-original-title="payscale-changes.pdf" class="txt-color-darken"><i class="fa fa-paperclip fa-lg"></i></a>
                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg6">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            Jeff Hopkin <span class="text-danger">Draft</span>
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>Hey John!</span> Sed ut perspiciatis unde omnis...
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg7">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            Toronto News
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>Mayor Rod Fierd!</span> Sed ut perspiciatis unde sit...
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg8">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            Michael Bleigh
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>Past due</span> Sed ut perspiciatis unde omnis iste na
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg9">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            Me, Navin
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span><span class="label bg-color-teal">HOME</span> John!</span> Sed ut perspiciatis...
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg10">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            Trello Laka
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>Project development</span> @Sed ut perspiciatis unde omnis...
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg11">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            Doug Baird
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>Pora korta casta ricka?</span> Sed ut perspiciatis unde omnis iste...
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg12">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            Michael Ray, P. Eng
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>John, please add me to your linkedin</span> Linked in request pending.
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg13">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            Doug Baird
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>Pora korta casta ricka?</span> Sed ut perspiciatis unde omnis iste...
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg14">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            Doug Baird
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>Pora korta casta ricka?</span> Sed ut perspiciatis unde omnis iste...
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg15" class="unread">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            <i class="fa fa-warning text-warning"></i> System Email
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span><span class="label bg-color-orange">WORK</span> Sustem Update</span> 2:00PM to 2PM
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg16">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            Amazon.ca
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>Baby deal of the week!</span> Two new items on your cart...
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg17">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            New server for datacenter needed New server for datacenter ne...
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>Header blha blah</span> New server for datacenter needed
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg18">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            New server for datacenter needed New server for datacenter ne...
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>Header blha blah</span> New server for datacenter needed
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg19">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            System
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>SmartAdmin</span> You have a new friend request!
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg20">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            System
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>SmartAdmin</span> You have a new friend request!
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg21">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            System
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>SmartAdmin</span> You have a new friend request!
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg22">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            System
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>SmartAdmin</span> You have a new friend request!
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg23">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            Sunny
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>Important question!</span> Hey John, I hope you are okay...
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg24">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            System
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>SmartAdmin</span> You have a new friend request!
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg25">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            Dogue Biryrd
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>Hey whats up?</span> Just checking up on ya...
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>


                <tr id="msg26">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            System
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>SmartAdmin</span> You have a new friend request!
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg27">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            System
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>SmartAdmin</span> You have a new friend request!
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg28">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            System
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>SmartAdmin</span> You have a new friend request!
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg29">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            System
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>SmartAdmin</span> You have a new friend request!
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                <tr id="msg30">
                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>
                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            System
                        </div>
                    </td>
                    <td class="inbox-data-message">
                        <div>
                            <span>SmartAdmin</span> You have a new friend request!
                        </div>
                    </td>
                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>
                    <td class="inbox-data-date hidden-xs">
                        <div>
                            10:23 am
                        </div>
                    </td>
                </tr>

                </tbody>
            </table-->

            <!--script>

                //Gets tooltips activated
                $("#inbox-table [rel=tooltip]").tooltip();

                $("#inbox-table input[type='checkbox']").change(function() {
                    $(this).closest('tr').toggleClass("highlight", this.checked);
                });

                $("#inbox-table .inbox-data-message").click(function() {
                    $this = $(this);
                    getMail($this);
                })
                $("#inbox-table .inbox-data-from").click(function() {
                    $this = $(this);
                    getMail($this);
                })
                function getMail($this) {
                    //console.log($this.closest("tr").attr("id"));
                    loadURL("ajax/email-opened.html", $('#inbox-content > .table-wrap'));
                }


                $('.inbox-table-icon input:checkbox').click(function() {
                    enableDeleteButton();
                })

                $(".deletebutton").click(function() {
                    $('#inbox-table td input:checkbox:checked').parents("tr").rowslide();
                    //$(".inbox-checkbox-triggered").removeClass('visible');
                    //$("#compose-mail").show();
                });

                function enableDeleteButton() {
                    var isChecked = $('.inbox-table-icon input:checkbox').is(':checked');

                    if (isChecked) {
                        $(".inbox-checkbox-triggered").addClass('visible');
                        //$("#compose-mail").hide();
                    } else {
                        $(".inbox-checkbox-triggered").removeClass('visible');
                        //$("#compose-mail").show();
                    }
                }

            </script-->
        </div>

        <div class="tab-pane" id="mail-tab">

        </div>

        <?php /*foreach ($aAccounts as $aAccount) { ?>
            <div class="tab-pane fade" id="account-<?= $aAccount['id'] ?>">
                <?= $aAccount['address'] ?>
            </div>
        <?php }*/ ?>
    </div>


</div>

<script type="text/javascript">

    Steen.request.page.events.addEvent(function() {

        $('#mail-main-container').find('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

            var accountId = $(e.target).data('account-id');

            $('#mail-tab').html('<span class="fa fa-spinner fa-spin"></span>');

            $.ajax({
                url: '/content/mail/listLocalMails/' + accountId
            }).success(function(response) {
                $('#mail-tab').html(response);
            }).error(function() {
                $('#mail-tab').html('error');
            });

            //var target = $(e.target).attr("href"); // activated tab
            //alert(target);
        });

    });


</script>