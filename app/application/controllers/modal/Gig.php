<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.12.15
 * Time: 21:11
 */

class Gig extends Modal_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function show($id) {
        if ($id === 'new') {
            echo 'neuen eintrag anlegen';
        } else {
            echo 'Eintrag ' . $id . ' laden';
        }
    }
}