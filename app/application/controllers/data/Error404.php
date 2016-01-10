<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 10.01.16
 * Time: 09:51
 */

class Error404 extends Ajax_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->output->set_header('HTTP/1.0 404 Not Found');
        $this->output->set_header('HTTP/1.1 404 Not Found');

        $this->jsonOutput('Not Found', false);
        // set header 404
        // render complete page
    }
}