<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.12.15
 * Time: 21:11
 */

class Venue extends Modal_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function show($id) {
        if ($id === 'new') {
            $this->load->view('venue/modal/body');
        } else {
            echo 'Eintrag ' . $id . ' laden';
        }
    }

}