<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 10.12.16
 * Time: 12:34
 */

class Log_model extends STEEN_Model {

    /**
     * Log_model constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @param $aData
     */
    private function _logInternal($aData) {

        $iUserId = $this->session->user_id;

        $aPost = $this->input->post();

        if (!empty($aPost['password'])) {
            $aPost['password'] = 'XXXX';
        }

        $aData['user_id'] = $iUserId;
        $aData['ip_address'] = $this->input->ip_address();
        $aData['get'] = json_encode($this->input->get());
        $aData['post'] = json_encode($aPost);
        $aData['url'] = uri_string();

        $this->db->insert('logs', $aData);
    }

    /**
     * @param $sCategory
     * @param $aData
     */
    public function log($sCategory,$aData = []) {
        $aData['category'] = $sCategory;
        $this->_logInternal($aData);
    }

    /**
     * @param $sMessage
     * @param null|string $sCategory
     */
    public function logMessage($sMessage, $sCategory = null) {
        $this->log($sCategory,[
            'message' => $sMessage
        ]);
    }

}