<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 06.04.16
 * Time: 18:09
 */

class Person extends Admin_Controller {

    public function create() {
        $id = $this->person_model->insert([
            'insert_user' => $this->session->user_id
        ]);

        redirect(base_url() . 'person/details/' . $id . '/new');
    }

    /**
     * @param $id
     * @param null $mode
     */
    public function details($id,$mode = null) {

        $oPerson = $this->person_model->byId($id);


        $aBands = $this->band_model->byPersonId($id);
        $aVenues = $this->venue_model->byPersonId($id);
        /*$aGigs = $this->gig_model->byBandId($id);*/

        $aComments = $this->comment_model->getCommentSectionData('band-details-comments-section','person',$id);

        /*$gigWidget = new GigListWidget('gig-details-gig-widget',$aGigs);*/
        $bandWidget = new BandListWidget('person-details-band-widget',$aBands);
        $bandWidget->headerIncludeList->addHeaderInclude(new WidgetHeaderSearchInclude('band','person',$id));
        $bandWidget->getTableHelper()->includes->add(new DisconnectTableInclude('person','band',$id,'id'));
        
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