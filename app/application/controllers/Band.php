<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 06.04.16
 * Time: 18:09
 */

class Band extends Admin_Controller {

    public function details($id,$mode = null) {

        $oBand = $this->band_model->byId($id);
        $aPersons = $this->person_model->byBandId($id);
        $aGigs = $this->gig_model->byBandId($id);

        $aComments = $this->comment_model->getCommentSectionData('band-details-comments-section','band',$id);

        $gigWidget = new GigListWidget('gig-details-gig-widget',$aGigs);
        $bandWidget = new BandDetailsWidget('band-details-band-widget',$oBand);

        $personWidget = new PersonListWidget('band-details-person-widget', $aPersons);

        $commentWidget = new SteenWidget('band-details-comments', 'Kommentare', 'partials/modules/comments', $aComments);
        $commentWidget->icon = 'fa-comments';

        $this->renderPage('band/details', [
            'personWidget' => $personWidget,
            'gigWidget' => $gigWidget,
            'commentWidget' => $commentWidget,
            'bandWidget' => $bandWidget
        ]);

    }
}