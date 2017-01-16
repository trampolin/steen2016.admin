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
 *
 */
class Mail extends Ajax_Controller {

    /**
     * @var \PhpImap\Mailbox
     */
    public $_oMailBox;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $iAccountId
     * @param null $iFolderId
     */
    public function fetchAllMails($iAccountId,$iFolderId = null) {

        $aAccount = $this->mail_model->accountById($iAccountId,false);

        echo '<pre>';

        if (!empty($aAccount)) {

            var_dump($aAccount);

            if ($iFolderId === null) {
                $iFolderId = $this->mail_model->getFolderIdByName($iAccountId,'INBOX');
            }

            $sFolderName = $this->mail_model->getFolderNameById($iAccountId,$iFolderId);

            if (!empty($sFolderName)) {

                var_dump($iFolderId);

                $this->_oMailBox = new \PhpImap\Mailbox('{'.$aAccount['path'].'}' . $sFolderName,$aAccount['user'],$aAccount['password']);

                $aMailIds = $this->_oMailBox->searchMailbox('ALL');

                var_dump($aMailIds);

                foreach ($aMailIds as $iMailId) {
                    $oMail = $this->_oMailBox->getMail($iMailId,false);
                    $this->mail_model->insertMailIfNotPresent($iAccountId,$oMail,$iFolderId);
                }

            }


        }

        echo '</pre>';

    }

    /**
     * @param $iAccountId
     */
    public function fetchAllFolders($iAccountId) {

        $aAccount = $this->mail_model->accountById($iAccountId,false);

        if (!empty($aAccount)) {
            $this->_oMailBox = new \PhpImap\Mailbox('{'.$aAccount['path'].'}',$aAccount['user'],$aAccount['password']);

            $aFolders = $this->_oMailBox->getListingFolders();

            foreach ($aFolders as $sFolder) {
                $this->mail_model->insertFolderIfNotPresent($iAccountId,$sFolder,null);
            }

            $this->jsonOutput($aFolders);
        }
    }



    private function _fetchAllFoldersRecursive($aAccount) {

    }

    public function index() {

        /*$this->_oMailBox = new \PhpImap\Mailbox('{w00dc916.kasserver.com:143}INBOX','m03c29b6','SmrqzRBd9b2ncCJN');

        $iAccountId = 1;

        // Read all messaged into an array:
        $mailsIds = $this->_oMailBox->searchMailbox('ALL');
        if(!$mailsIds) {
            die('Mailbox is empty');
        }

        $mail = $this->_oMailBox->getMail($mailsIds[count($mailsIds)-1]);

        echo '<pre>';
        echo json_encode($mail);
        echo '</pre>';

        //$this->mail_model->insertMailIfNotPresent($iAccountId,$mail);

        foreach ($mailsIds as $mailsId) {

            $mail = $this->_oMailBox->getMail($mailsId);

            //echo $mail->subject . ': ' . $mail->textPlain . '<br /><br />';

            $this->mail_model->insertMailIfNotPresent($iAccountId,$mail);

            //var_dump($mail);
        }

        // Get the first message and save its attachment(s) to disk:
        */

    }

    public function accounts($sKey) {
        if ($sKey === 'penis123') {

            $aAccounts = $this->mail_model->listAccounts();

            $this->jsonOutput($aAccounts);


        }
    }



}