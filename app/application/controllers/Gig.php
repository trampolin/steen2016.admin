<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.12.15
 * Time: 21:11
 */

class Gig extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $aGigs = $this->gig_model->get();

        $this->renderPage('gig/index', [
            'aGigs' => $aGigs,
            'aGigStatus' => $this->gig_model->getGigStatusArray()
        ]);
    }
}