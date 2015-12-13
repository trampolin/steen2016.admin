<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.12.15
 * Time: 21:11
 */

class Venue extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->renderPage('venue/index', [
            'aVenues' => $this->venue_model->get()
        ]);

    }

    public function details($id) {

        $this->renderPage('venue/details', [
            'oVenue' => $this->venue_model->byId($id),
            'aGigs' => $this->gig_model->byVenueId($id),
            'aPersons' => $this->person_model->byVenueId($id)
        ]);

    }
}