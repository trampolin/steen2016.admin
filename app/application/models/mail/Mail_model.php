<?php
/**
 * @author      Richard Mahr <scherhak@pferdewetten.de>
 * @copyright   2017, Pferdewetten-Service GmbH
 * @version     3.1.9
 */

class Mail_model extends STEEN_Model {

    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return CI_DB_query_builder
     */
    private function _prepareAccountStatement() {

        return $this->db->select([
            'ma.id',
            'ma.path',
            'ma.user',
            'ma.password',
            'ma.address'
        ])->from('mail_account ma')
            ->where('ma.deleted', 0);

    }

    /**
     * @param bool $bSecure
     * @return array
     */
    public function listAccounts($bSecure = true) {
        $aReturn = $this->_prepareAccountStatement()
            ->get()
            ->result_array();

        if ($bSecure) {
            foreach ($aReturn as $i => $aRow) {
                unset ($aReturn[$i]['password']);
            }
        }

        return $aReturn;
    }

    private function _prepareMailStatement() {



    }


}