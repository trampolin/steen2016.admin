<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 13.10.15
 * Time: 21:14
 */
class Home extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $aGigs = $this->gig_model->get();
        $aPersons = $this->person_model->get();
        $aVenues = $this->venue_model->get();
        $aBands = $this->band_model->get();

        $gigWidget = new GigListWidget('home-gigs-widget', $aGigs);
        $personWidget = new PersonListWidget('home-person-widget',$aPersons);
        $venueWidget = new VenueListWidget('home-venue-widget',$aVenues);
        $bandWidget = new BandListWidget('home-band-widget',$aBands);

        $this->renderPage('home/index', [
            'personWidget' => $personWidget,
            'gigWidget' => $gigWidget,
            'venueWidget' => $venueWidget,
            'bandWidget' => $bandWidget,
        ]);
    }
}