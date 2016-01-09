<?php

/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.01.16
 * Time: 16:59
 */
class Comments extends Ajax_Controller
{

    public function __construct() {
        parent::__construct();

        $this->user_model->getUserId();
    }

    public function write($sType,$iTargetId) {
        if (empty($this->input->post('comment'))) {
            $this->jsonOutput('Comment is empty',false);
        } else {
            $this->jsonOutput($this->comment_model->write($sType,$iTargetId,$this->input->post('comment')),true);
        }
    }

    public function reply($sType,$iTargetId,$iParentId) {
        if (empty($this->input->post('comment'))) {
            $this->jsonOutput('Comment is empty',false);
        } else {
            $this->jsonOutput($this->comment_model->write($sType,$iTargetId,$this->input->post('comment'),$iParentId),true);
        }
    }
}