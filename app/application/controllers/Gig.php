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
        $aBands = $this->band_model->byGigId($id);

        $aComments = $this->comment_model->getCommentSectionData('gig-details-comments-section','gig',$id);

        $venueWidget = new VenueDetailsWidget('gig-details-venue-widget',$oVenue,false,true);
        $gigWidget = new GigDetailsWidget('gig-details-gig-widget',$oGig,true,false);
        $bandWidget = new BandListWidget('venue-details-band-widget',$aBands);

        $commentWidget = new SteenWidget('gig-details-comments', 'Kommentare', 'partials/modules/comments', $aComments);
        $commentWidget->icon = 'fa-comments';

        $this->renderPage('gig/details', [
            'venueWidget' => $venueWidget,
            'gigWidget' => $gigWidget,
            'commentWidget' => $commentWidget,
            'bandWidget' => $bandWidget
        ]);

    }
}