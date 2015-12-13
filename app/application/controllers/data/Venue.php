<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 13.12.15
 * Time: 13:00
 */

class Venue extends Ajax_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function submit($id = 'new') {

        $this->form_validation->set_rules('name','Venue Name', 'required', [
            'required' => 'Bitte %s angeben'
        ]);

        if ($this->form_validation->run() == FALSE) {

            $this->jsonOutput('Validation failed',false);

        } else {

            $venue = [
                'name' => $this->input->post('name'),
                'street' => $this->input->post('street'),
                'number' => $this->input->post('number'),
                'city' => $this->input->post('city'),
                'zip' => $this->input->post('zip'),
                'memo' => $this->input->post('memo'),
                'insert_user' => $this->user_model->getUserId()
            ];

            if ($id == 'new') {
                $id = $this->venue_model->insert($venue);
            } else {
                $id = $this->venue_model->update($id, $venue);
            }

            $row = $this->venue_model->byId($id);

            $this->jsonOutput($row,true);
        }
    }

    public function delete($id) {
        $result = $this->venue_model->delete($id);

        $this->jsonOutput(null,$result);
    }

    public function get() {
        $this->jsonOutput($this->venue_model->get(),true);
    }
}