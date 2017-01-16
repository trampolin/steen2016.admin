<?php
/**
 * @author      Richard Mahr <scherhak@pferdewetten.de>
 * @copyright   2017, Pferdewetten-Service GmbH
 * @version     3.1.9
 */

/**
 *
 * Class Mail
 *
 */
class Mail extends Content_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * @param $iAccountId
     * @param null $iFolderId
     */
    public function listLocalMails($iAccountId,$iFolderId = null) {

        $aFolders = $this->mail_model->listLocalFolders($iAccountId);

        if ($iFolderId === null) {
            $iFolderId = $this->mail_model->getFolderIdByName($iAccountId,'INBOX');
        }

        $aMails = $this->mail_model->listLocalMails($iAccountId,$iFolderId);

        $this->load->view('mail/bricks/inbox', [
            'aMails' => $aMails,
            'aFolders' => $aFolders,
            'iAccountId' => $iAccountId,
            'iFolderId' => $iFolderId
         ]);

    }

}