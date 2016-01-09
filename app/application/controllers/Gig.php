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

        $this->renderPage('gig/index', [
            'aGigs' => $this->gig_model->get(),
            'aGigStatus' => $this->gig_model->getGigStatusArray()
        ]);

    }

    public function details($id) {

        $oGig = $this->gig_model->byId($id);
        $oVenue = $this->venue_model->byId($oGig->venue_id);

        $venueWidget = new VenueDetailsWidget('venue-details-venue-widget',$oVenue,false,true);

        $this->renderPage('gig/details', [
            'oGig' => $oGig,
            'venueWidget' => $venueWidget
        ]);

    }
}