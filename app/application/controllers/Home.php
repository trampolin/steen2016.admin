<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 13.10.15
 * Time: 21:14
 */
class Home extends STEEN_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if( $this->verify_min_level(1) )
        {
            $this->renderPage('home/index');
        } else {
            $this->renderPage('auth/login',[],false,false,false);
        }
    }
}