<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 10.12.16
 * Time: 13:51
 */

class Person extends Ajax_Controller {
    public function __construct() {
        parent::__construct();
    }

    /**
     * @param $iPersonId
     */
    public function submit($iPersonId) {

        $aPerson = [
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
        ];

        $this->person_model->update($iPersonId,$aPerson);

        $aRow = $this->person_model->byId($iPersonId);

        $this->jsonOutput($aRow,true);

    }

    /**
     *
     */
    public function search() {
        $aPersons = $this->person_model->search($this->input->get('term'));
        $this->jsonOutput($aPersons);
    }
}