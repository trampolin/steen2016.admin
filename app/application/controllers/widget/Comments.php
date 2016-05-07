<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 07.05.16
 * Time: 09:31
 */

class Comments extends Content_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * @param $elementId
     * @param $targetType
     * @param $targetId
     */
    public function load($elementId,$targetType,$targetId) {
        $this->comment_model->renderCommentSection($elementId,$targetType,$targetId);
    }
}