<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 06.04.16
 * Time: 18:09
 */

class Person extends Admin_Controller {

    public function details($id,$mode = null) {

        $oPerson = $this->person_model->byId($id);


        $aBands = $this->band_model->byPersonId($id);
        $aVenues = $this->venue_model->byPersonId($id);
        /*$aGigs = $this->gig_model->byBandId($id);*/

        $aComments = $this->comment_model->getCommentSectionData('band-details-comments-section','person',$id);

        /*$gigWidget = new GigListWidget('gig-details-gig-widget',$aGigs);*/
        $bandWidget = new BandListWidget('person-details-band-widget',$aBands);
        
        $venueWidget = new VenueListWidget('person-details-venue-widget',$aVenues);

        $personWidget = new PersonDetailsWidget('person-details-person-widget',$oPerson);

        $commentWidget = new SteenWidget('person-details-comments', 'Kommentare', 'partials/modules/comments', $aComments);
        $commentWidget->icon = 'fa-comments';

        $this->renderPage('person/details', [
            'personWidget' => $personWidget,
            'bandWidget' => $bandWidget,
            'commentWidget' => $commentWidget,
            'venueWidget' => $venueWidget
        ]);

    }
}