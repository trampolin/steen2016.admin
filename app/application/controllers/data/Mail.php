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
 * @property Mail_model mail_model
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
        $this->load->model('mail/Mail_model', 'mail_model');
    }

    public function index() {

        $this->_oMailBox = new \PhpImap\Mailbox('{w00dc916.kasserver.com:143}INBOX','m03c29b6','SmrqzRBd9b2ncCJN');


        // Read all messaged into an array:
        $mailsIds = $this->_oMailBox->searchMailbox('ALL');
        if(!$mailsIds) {
            die('Mailbox is empty');
        }

        $mail = $this->_oMailBox->getMail($mailsIds[count($mailsIds)-1]);

        echo '<pre>';
        echo json_encode($mail);
        echo '</pre>';

        /*foreach ($mailsIds as $mailsId) {

            $mail = $this->_oMailBox->getMail($mailsId);

            echo $mail->subject . ': ' . $mail->textPlain . '<br /><br />';

            //var_dump($mail);
        }*/

        // Get the first message and save its attachment(s) to disk:


    }

    public function accounts($sKey) {
        if ($sKey === 'penis123') {

            $aAccounts = $this->mail_model->listAccounts();

            $this->jsonOutput($aAccounts);


        }
    }



}