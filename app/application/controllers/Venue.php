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

        $oVenue = $this->venue_model->byId($id);

        $commentWidget = new Widget(
            'venue-details-comments',
            'Kommentare',
            'partials/modules/comments',
            $this->comment_model->getCommentSectionData('venue-details-comments-section','venue',$id)
        );

        $gigTable = new TableHelper();
        $gigTable->tableId = 'venue-details-gigs-table';
        $gigTable->setData($this->gig_model->byVenueId($id));
        $gigTable->ignoreFields([
            'id','venue_id','getin','doors','status','insert_time','insert_user','name'
        ]);
        $gigTable->addKeyMapping('title','Name');
        $gigTable->addKeyMapping('date','Datum');
        $gigTable->bindLink('title',base_url() . 'gig/details/','id');

        $gigWidget = new Widget(
            'venue-details-gigs-widget',
            'Gigs',
            'partials/modules/data_table',
            $gigTable->getTableOptions()
        );

        $venueWidget = new Widget(
            'venue-details-venue-widget',
            $oVenue->name,
            'venue/widgets/venue_details', [
                'oVenue' => $oVenue
            ]

        );

        $this->renderPage('venue/details', [
            'oVenue' => $oVenue,
            'aGigs' => $this->gig_model->byVenueId($id),
            'aPersons' => $this->person_model->byVenueId($id),
            'commentWidgetData' => $commentWidget->getData(),
            'gigWidgetData' => $gigWidget->getData(),
            'venueWidget' => $venueWidget
        ]);

    }
}