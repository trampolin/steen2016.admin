<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 07.04.16
 * Time: 23:46
 */


abstract class Content_Controller extends STEEN_Controller {

    // idee: bei click auf link lädt nicht die seite neu sondern nur content... mal sehen ob ich das hinbekomme :D

    public $_sUserName;

    /**
     * Admin controller constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->minAuthLevel = 1;

        if (!$this->isLoggedIn()) {
            redirect(base_url().'modal/user/');
        } else {
            $this->_sUserName = $this->session->username;
        }
    }



    // ------------------------------------------------------------------------

}