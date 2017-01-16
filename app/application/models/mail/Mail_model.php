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

    /**
     * @param int $iMailAccountId
     * @param bool $bSecure
     * @return array|null
     */
    public function accountById($iMailAccountId,$bSecure = true) {
        $aReturn = $this->_prepareAccountStatement()
            ->where('ma.id', $iMailAccountId)
            ->get()
            ->row_array();

        if ($bSecure) {
            if (!empty($aReturn)) {
                unset ($aReturn['password']);
            }
        }

        return $aReturn;
    }

    /**
     * @param $iMailAccountId int
     * @param $oMail \PhpImap\IncomingMail
     */
    private function _doInsertMail($iMailAccountId,$oMail,$iFolderId) {

        $this->db->insert('mail',[
            'mail_account_id' => $iMailAccountId,
            'id' => $oMail->id,
            'date' => $oMail->date,
            'headersRaw' => $oMail->headersRaw,
            'subject' => $oMail->subject,
            'fromName' => $oMail->fromName,
            'fromAddress' => $oMail->fromAddress,
            'to' => json_encode($oMail->to),
            'cc' => json_encode($oMail->cc),
            'bcc' => json_encode($oMail->bcc),
            'replyTo' => json_encode($oMail->replyTo),
            'messageId' => $oMail->messageId,
            'textPlain' => $oMail->textPlain,
            'textHtml' => $oMail->textHtml,
            'folder_id' => $iFolderId
        ]);

    }

    /**
     * @param $iMailAccountId int
     * @param $oMail \PhpImap\IncomingMail
     * @param null $iFolderId
     */
    public function insertMailIfNotPresent($iMailAccountId,$oMail,$iFolderId = null) {

        if ($iFolderId === null) {
            $iFolderId = $this->getFolderIdByName($iMailAccountId,'INBOX');
        }

        $aRow = $this->db->select([
            'id','mail_account_id'
        ])->from('mail')
            ->where('mail_account_id', $iMailAccountId)
            ->where('id', $oMail->id)
            ->where('folder_id', $iFolderId)
            ->get()
            ->row_array();
        if (empty($aRow)) {
            // einfügen
            $this->_doInsertMail($iMailAccountId,$oMail,$iFolderId);
        }

    }

    /**
     * @return CI_DB_query_builder
     */
    private function _prepareMailStatement() {
        return $this->db->select([
            'm.*',
            'p.id as person_id',
            'p.firstname',
            'p.lastname'
        ])->from('mail m')
            ->join('person p','p.email = m.fromAddress','left outer');

    }

    /**
     * @param $iAccountId
     * @param null $iFolderId
     * @return mixed todo: change!!!!
     *
     * todo: change!!!!
     */
    public function listLocalMails($iAccountId,$iFolderId = null) {

        if ($iFolderId === null) {
            $iFolderId = $this->getFolderIdByName($iAccountId,'INBOX');
        }

        return $this->_prepareMailStatement()
            ->where('m.mail_account_id', $iAccountId)
            ->where('folder_id', $iFolderId)
            ->order_by('m.date', 'DESC')
            ->get()
            ->result_array();
    }

    /**
     * @param $iAccountId
     * @param $iMailId
     * @return array|null
     */
    public function getMail($iAccountId,$iMailId) {
        return $this->_prepareMailStatement()
            ->where('m.mail_account_id', $iAccountId)
            ->where('m.id', $iMailId)
            ->get()
            ->row_array();
    }

    /**
     * @param $iAccountId
     * @param $sFolderName
     * @param null $iParentId
     */
    public function insertFolderIfNotPresent($iAccountId,$sFolderName,$iParentId = null) {

        $aFolder = $this->db->select('*')
            ->from('mail_folders')
            ->where('mail_account_id', $iAccountId)
            ->where('parent_id', $iParentId)
            ->where('folder_name', $sFolderName)
            ->get()
            ->row_array();

        if (empty($aFolder)) {
            $this->db->insert('mail_folders', [
                'mail_account_id' => $iAccountId,
                'folder_name' => $sFolderName,
                'parent_id' => $iParentId
            ]);

            return $this->db->insert_id();
        } else {
            return $aFolder['id'];
        }
    }

    /**
     * @param $iAccountId
     * @return array
     */
    public function listLocalFolders($iAccountId) {
        return $this->db->select('*')
            ->from('mail_folders')
            ->where('mail_account_id', $iAccountId)
            ->get()
            ->result_array();
    }

    /**
     * @param int $iAccountId
     * @param string $sFolderName
     * @return null|int
     */
    public function getFolderIdByName($iAccountId,$sFolderName) {
        $aResult = $this->db->select('id')
            ->from('mail_folders')
            ->where('mail_account_id', $iAccountId)
            ->where('folder_name', $sFolderName)
            ->get()
            ->row_array();

        if (empty($aResult)) {
            return null;
        } else {
            return $aResult['id'];
        }
    }

    /**
     * @param $iAccountId
     * @param $iFolderId
     * @return null
     */
    public function getFolderNameById($iAccountId,$iFolderId) {
        $aResult = $this->db->select('*')
            ->from('mail_folders')
            ->where('mail_account_id', $iAccountId)
            ->where('id', $iFolderId)
            ->get()
            ->row_array();

        if (empty($aResult)) {
            return null;
        } else {
            return $aResult['folder_name'];
        }
    }
}