<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 10.01.16
 * Time: 01:20
 */

class Error404 extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->output->set_header('HTTP/1.0 404 Not Found');
        $this->output->set_header('HTTP/1.1 404 Not Found');
        $this->renderPage('errors/custom/error404');
    }
}