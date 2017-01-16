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
class Mail extends Admin_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function index() {
        $aAccounts = $this->mail_model->listAccounts();

        $this->renderPage('mail/index', [
            'aAccounts' => $aAccounts
        ]);
    }
}