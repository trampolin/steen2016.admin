<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.12.15
 * Time: 21:11
 */

class Gig extends Ajax_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function create($venueId) {
        $this->jsonOutput($this->gig_model->create($venueId),true);
    }

    public function submit($gigId) {

        $this->form_validation->set_rules('date','Datum', 'required', [
            'required' => 'Bitte %s angeben'
        ]);

        if ($this->form_validation->run() == FALSE) {

            $this->jsonOutput(validation_errors(),false);

        } else {

            $gig = [
                'title' => $this->input->post('title'),
                'date' => $this->input->post('date'),
                'getin' => $this->input->post('getin'),
                'doors' => $this->input->post('doors'),
                'insert_user' => $this->user_model->getUserId()
            ];

            if ($gigId == 'new') {
                $gigId = $this->gig_model->insert($gig);
            } else {
                $gigId = $this->gig_model->update($gigId, $gig);
            }

            $row = $this->gig_model->byId($gigId);

            $this->jsonOutput($row,true);
        }

    }
}