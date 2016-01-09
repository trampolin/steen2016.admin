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

        $gigWidget = new GigListWidget('venue-details-gigs-widget', $aGigs);
        $personWidget = new PersonListWidget('venue-details-person-widget',$aPersons);

        $this->renderPage('home/index', [
            'personWidget' => $personWidget,
            'gigWidget' => $gigWidget,
        ]);
    }
}