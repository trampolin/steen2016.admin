<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 07.01.16
 * Time: 23:40
 */
?>


<div class="steen-comment-section" id="<?= $sElementId ?>" data-target-type="<?= $sTargetType ?>" data-target-id="<?= $iTargetId ?>">
    <form method="post" class="well padding-bottom-10" onsubmit="return false;" action="<?= base_url() ?>">
        <textarea id="<?= $sElementId ?>-comment-text" rows="2" class="form-control" placeholder="Schreibe einen Kommentar"></textarea>
        <div class="margin-top-10">

            <button id="<?= $sElementId ?>-write" class="btn btn-sm btn-primary pull-right" data-target-type="<?= $sTargetType ?>" data-target-id="<?= $iTargetId ?>">
                Absenden
            </button>

            <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Location"><i class="fa fa-location-arrow"></i></a>
            <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Voice"><i class="fa fa-microphone"></i></a>
            <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Photo"><i class="fa fa-camera"></i></a>
            <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add File"><i class="fa fa-file"></i></a>
        </div>
    </form>

    <?php foreach ($aComments as $aComment) { ?>
        <div class="timeline-seperator text-center"> <span><?= $aComment->insert_time ?></span>
            <div class="btn-group pull-right">
                <a href="javascript:void(0);" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><span class="caret single"></span></a>
                <ul class="dropdown-menu text-left">
                    <li>
                        <a href="javascript:void(0);">Hide this post</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">Hide future posts from this user</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">Mark as spam</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="chat-body no-padding profile-message">
            <ul>
                <li class="message">
                    <img src="<?= base_url() ?>assets/img/avatars/sunny.png" class="online" alt="sunny">
													<span class="message-text"> <a href="javascript:void(0);" class="username"><?= $aComment->username ?> <small class="text-muted pull-right ultra-light"> 2 Minutes ago </small></a> <?= $aComment->comment ?></span>
                </li>
                <?php foreach ($aComment->replies as $reply) { ?>
                    <li class="message message-reply">
                        <img src="<?= base_url() ?>assets/img/avatars/3.png" class="online" alt="user">
                        <span class="message-text"> <a href="javascript:void(0);" class="username"><?= $reply->username ?></a> <?= $reply->comment ?> </span>

                        <ul class="list-inline font-xs">
                            <li>
                                <span class="text-muted">1 minute ago </span>
                            </li>
                        </ul>

                    </li>
                <?php } ?>
                <li>
                    <div class="input-group wall-comment-reply">
                        <input class="<?= $sElementId ?>-reply-text form-control" data-parent-id="<?= $aComment->id ?>" type="text" placeholder="Auf diesen Kommentar antworten...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary <?= $sElementId ?>-reply-submit"
                                    data-target-type="<?= $sTargetType ?>"
                                    data-target-id="<?= $iTargetId ?>"
                                    data-parent-id="<?= $aComment->id ?>">
                                <i class="fa fa-reply"></i> Antworten
                            </button>
                        </span>
                    </div>
                </li>

            </ul>

        </div>
    <?php } ?>


    <script type="text/javascript">
        $(document).ready(function() {

            $('#<?= $sElementId ?>-write').click(function() {

                var targetType = $(this).data('target-type');
                var targetId = $(this).data('target-id');
                var message = $('#<?= $sElementId ?>-comment-text').val();

                $.ajax({
                    url: Steen.baseUrl + 'data/comments/write/'+targetType+'/'+targetId,
                    data: {
                        comment: message
                    },
                    method: 'POST'
                }).success(function(response) {
                    Steen.messages.success('Kommentar geschrieben');
                    window.location.reload();
                }).error(function(jqXhr) {
                    Steen.messages.error(jqXhr.responseText);
                });

            });

            $('.<?= $sElementId ?>-reply-submit').click(function() {

                var targetType = $(this).data('target-type');
                var targetId = $(this).data('target-id');
                var parentId = $(this).data('parent-id');
                var message = $('.<?= $sElementId ?>-reply-text[data-parent-id="'+parentId+'"]').val();

                $.ajax({
                    url: Steen.baseUrl + 'data/comments/reply/'+targetType+'/'+targetId+'/'+parentId,
                    data: {
                        comment: message
                    },
                    method: 'POST'
                }).success(function(response) {
                    Steen.messages.success('Kommentar geschrieben');
                    window.location.reload();
                }).error(function(jqXhr) {
                    Steen.messages.error(jqXhr.responseText);
                });

            });



        });
    </script>
</div>

