<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 10.01.16
 * Time: 10:05
 */

class Error404 extends Modal_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->output->set_header('HTTP/1.0 404 Not Found');
        $this->output->set_header('HTTP/1.1 404 Not Found');

        $this->load->view('errors/custom/error404');
    }
}