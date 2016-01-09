<?php

/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 07.01.16
 * Time: 22:55
 */
class Comment_model extends STEEN_Model
{
    private $_aComments;
    private $_aOrderedComments;

    private $_elementId;
    private $_targetType;
    private $_targetId;

    function __construct() {
        parent::__construct();
        $this->_aComments = [];
        $this->_aOrderedComments= [];

        $this->_targetType = null;
        $this->_targetId = null;
        $this->_elementId = null;
    }

    /**
     * @return CI_DB_query_builder
     */
    private function _prepareStatement() {
        return $this->db->select([
            'c.id',
            'c.target_type',
            'c.target_id',
            'c.parent_id',
            'c.comment',
            'c.insert_time',
            'c.insert_user',
            'u.username',
            'u.avatar'

        ])
            ->from('comment c')

            ->join('users u','u.id = c.insert_user', 'left outer');


    }

    private function _init($elementId, $targetType, $targetId) {
        $this->_elementId = $elementId;
        $this->_targetType = $targetType;
        $this->_targetId = $targetId;
    }

    private function _getComments() {
        $parents = $this->_prepareStatement()
            ->where('c.deleted',0)
            ->where('c.target_type',$this->_targetType)
            ->where('c.target_id',$this->_targetId)
            ->where('c.parent_id', null)
            ->order_by('c.insert_time','desc')
            ->get()
            ->result();

        $children = $this->_prepareStatement()
            ->where('c.deleted',0)
            ->where('c.target_type',$this->_targetType)
            ->where('c.target_id',$this->_targetId)
            ->where('c.parent_id is not', null)
            ->order_by('c.insert_time','asc')
            ->get()
            ->result();

        $this->_aComments = array_merge($parents,$children);

        return $this->_aComments;
    }

    private function _orderComments() {
        $this->_aOrderedComments = [];

        foreach ($this->_aComments as $aComment) {
            if (!empty($aComment->parent_id) && !empty($this->_aOrderedComments[$aComment->parent_id])) {
                $this->_aOrderedComments[$aComment->parent_id]->replies[$aComment->id] = $aComment;
            } else {
                $this->_aOrderedComments[$aComment->id] = $aComment;
                $this->_aOrderedComments[$aComment->id]->replies = [];
            }
        }

        return $this->_aOrderedComments;
    }

    public function getCommentSectionData($elementId,$targetType,$targetId) {
        $this->_init($elementId,$targetType,$targetId);
        $this->_getComments();
        $this->_orderComments();

        return [
            'aComments' => $this->_aOrderedComments,
            'sTargetType' => $targetType,
            'iTargetId' => $targetId,
            'sElementId' => $elementId
        ];
    }

    public function renderCommentSection($elementId,$targetType,$targetId) {
        $this->load->view('partials/modules/comments', $this->getCommentSectionData($elementId,$targetType,$targetId));
    }



    public function write($sTargetType,$iTargetId,$sComment,$iParentId = null) {
        $this->db->insert('comment',[
            'target_type' => $sTargetType,
            'target_id' => $iTargetId,
            'parent_id' => $iParentId,
            'comment' => $sComment,
            'insert_user' => $this->user_model->getUserId()
        ]);
        return $this->db->insert_id();
    }
}