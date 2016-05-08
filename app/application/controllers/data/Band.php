<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 07.05.16
 * Time: 13:30
 */


class Band extends Ajax_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function search() {
        $aBands = $this->band_model->search($this->input->get('term'));
        $this->jsonOutput($aBands);
    }
}