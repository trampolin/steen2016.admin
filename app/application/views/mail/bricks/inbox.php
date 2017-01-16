<?php
/**
 * @author      Richard Mahr <scherhak@pferdewetten.de>
 * @copyright   2017, Pferdewetten-Service GmbH
 * @version     3.1.9
 */

?>

<style>
    .inbox-data-date {width: 160px}
</style>

<div id="inbox-content" class="inbox-body">
    <div class="inbox-side-bar">

        <!--a href="javascript:void(0);" id="compose-mail" class="btn btn-primary btn-block"> <strong>Compose</strong> </a-->

        <!--h6> Folder <a href="javascript:void(0);" rel="tooltip" title="" data-placement="right" data-original-title="Refresh" class="pull-right txt-color-darken"><i class="fa fa-refresh"></i></a></h6-->

        <ul id="folder-list" class="inbox-menu-lg">

            <?php foreach ($aFolders as $aFolder) { ?>
            <li class="<?= $aFolder['id'] == $iFolderId ? 'active' : '' ?>">
                <a href="javascript:void(0)" data-account-id="<?= $iAccountId ?>" data-folder-id="<?= $aFolder['id'] ?>"><?= $aFolder['folder_name'] ?></a>
            </li>
            <?php } ?>
        </ul>

        <h6> Quick Access <a href="javascript:void(0);" rel="tooltip" title="" data-placement="right" data-original-title="Add Another" class="pull-right txt-color-darken"><i class="fa fa-plus"></i></a></h6>

        <ul class="inbox-menu-sm">
            <li>
                <a href="javascript:void(0);"> Images (476)</a>
            </li>
            <li>
                <a href="javascript:void(0);">Documents (4)</a>
            </li>
        </ul>

        <div class="air air-bottom inbox-space">

            3.5GB of <strong>10GB</strong><a href="javascript:void(0);" rel="tooltip" title="" data-placement="top" data-original-title="Empty Spam" class="pull-right txt-color-darken"><i class="fa fa-trash-o fa-lg"></i></a>

            <div class="progress progress-micro">
                <div class="progress-bar progress-primary" style="width: 34%;"></div>
            </div>
        </div>

    </div>

    <div class="table-wrap custom-scroll"  style="min-height: 600px;">
        <?php //var_dump($aMails) ?>

        <table id="inbox-table" class="table table-striped table-hover custom-inbox-table">
            <tbody>
            <?php foreach ($aMails as $aMail) { ?>
                <tr id="mail-<?= $aMail['id'] ?>">

                    <td class="inbox-table-icon">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="checkbox style-2">
                                <span></span> </label>
                        </div>
                    </td>

                    <td class="inbox-data-from hidden-xs hidden-sm">
                        <div>
                            <?php if(!empty($aMail['person_id'])) { ?>
                                <a href="<?= base_url() ?>person/details/<?= $aMail['person_id'] ?>" class="badge bg-color-greenLight"><?= $aMail['firstname'] . ' ' . $aMail['lastname'] ?></a>
                            <?php } else  if (!empty($aMail['fromName'])) { ?>
                            <a class="badge badge-default" href="<?= base_url() ?>person/createFromMailIfNotExist/<?= $iAccountId ?>/<?= $aMail['id'] ?>"><span class="fa fa-plus"></span> <span class="fa fa-user"></span></a> <?= $aMail['fromName'] ?>
                            <?php } else { ?>
                            <a class="badge badge-default" href="<?= base_url() ?>person/createFromMailIfNotExist/<?= $iAccountId ?>/<?= $aMail['id'] ?>"><span class="fa fa-plus"></span> <span class="fa fa-user"></span></a> <?= $aMail['fromAddress'] ?>
                            <?php } ?>
                        </div>
                    </td>

                    <td class="inbox-data-message">
                        <div>
                            <span><?= $aMail['subject'] ?></span> <?= !empty($aMail['textPlain']) ? substr($aMail['textPlain'],0,20) : '' ?>...
                        </div>
                    </td>

                    <td class="inbox-data-attachment hidden-xs">
                        <div>

                        </div>
                    </td>

                    <td class="inbox-data-date hidden-xs">
                        <div>
                            <?= $aMail['date'] ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <script>

            //Gets tooltips activated
            $("#inbox-table [rel=tooltip]").tooltip();

            $("#inbox-table input[type='checkbox']").change(function() {
                $(this).closest('tr').toggleClass("highlight", this.checked);
            });

            $("#inbox-table .inbox-data-message").click(function() {
                $this = $(this);
                getMail($this);
            });
            $("#inbox-table .inbox-data-from").click(function() {
                $this = $(this);
                getMail($this);
            });
            function getMail($this) {
                //console.log($this.closest("tr").attr("id"));
                //loadURL("ajax/email-opened.html", $('#inbox-content > .table-wrap'));
            }


            $('.inbox-table-icon input:checkbox').click(function() {
                enableDeleteButton();
            });

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

            $('#folder-list').find('a').click(function() {
                var accountId = $(this).data('account-id');
                var folderId = $(this).data('folder-id');

                $('#mail-tab').html('<span class="fa fa-spinner fa-spin"></span>');

                $.ajax({
                    url: '/content/mail/listLocalMails/' + accountId + '/' + folderId
                }).success(function(response) {
                    $('#mail-tab').html(response);
                }).error(function() {
                    $('#mail-tab').html('error');
                });
            });

        </script>

    </div>
</div>


