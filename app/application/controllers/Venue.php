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

    /**
     *
     */
    public function create() {
        $id = $this->venue_model->insert([
            'insert_user' => $this->session->user_id
        ]);

        redirect(base_url() . 'venue/details/' . $id . '/new');
    }

    public function details($id) {

        $oVenue = $this->venue_model->byId($id);
        $aGigs = $this->gig_model->byVenueId($id);
        $aPersons = $this->person_model->byVenueId($id);
        $aComments = $this->comment_model->getCommentSectionData('venue-details-comments-section','venue',$id);
        $aBands = $this->band_model->byVenueId($id);

        $commentWidget = new SteenWidget('venue-details-comments', 'Kommentare', 'partials/modules/comments', $aComments);
        $gigWidget = new GigListWidget('venue-details-gigs-widget', $aGigs);
        $personWidget = new PersonListWidget('venue-details-person-widget',$aPersons);
        $personWidget->headerIncludeList->addHeaderInclude(new WidgetHeaderSearchInclude('person','venue',$id));

        $personWidget->getTableHelper()->includes->add(new DisconnectTableInclude('venue','person',$id,'id'));

        $bandWidget = new BandListWidget('venue-details-band-widget',$aBands);
        $venueWidget = new VenueDetailsWidget('venue-details-venue-widget',$oVenue);

        $this->renderPage('venue/details', [
            'personWidget' => $personWidget,
            'commentWidget' => $commentWidget,
            'gigWidget' => $gigWidget,
            'bandWidget' => $bandWidget,
            'venueWidget' => $venueWidget
        ]);

    }
}