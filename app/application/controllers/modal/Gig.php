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
            $this->load->view('gig/modal/body');
        } else {
            echo 'Eintrag ' . $id . ' laden';
        }
    }

    public function submit() {

        $this->form_validation->set_rules('venue_id','Venue', 'required', [
            'required' => 'Bitte %s auswählen'
        ]);

        if ($this->form_validation->run() == FALSE) {
            echo 'NEIN';
        } else {
            echo 'JA';
        }
    }
}