<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 13.10.15
 * Time: 21:14
 */
class Home extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->renderPage('home/index');
    }
}