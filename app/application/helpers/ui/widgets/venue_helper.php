<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 09.01.16
 * Time: 10:29
 */


class VenueDetailsWidget extends SteenWidget {
    function __construct($id, $oVenue, $writable = true, $showDetailsButton = false) {

        $oVenue->writable = $writable;
        $oVenue->showDetailsButton = $showDetailsButton;

        parent::__construct(
            $id,
            'Venue: ' . $oVenue->name,
            'venue/widgets/venue_details',
            [
                'oVenue' => $oVenue
            ]
        );

        $this->icon = 'fa-globe';

    }
}

class VenueListWidget extends SteenTableWidget {

    function __construct($id, $aVenues, $title = '') {

        parent::__construct($id,$aVenues,$title === '' ? 'Venues' : $title);

        $this->_tableHelper->tableId = $id . '-table';
        $this->_tableHelper->setData($aVenues);

        $this->_tableHelper->setCustomFieldList([
            'name','street','number','zip','city','action','action2'
        ]);

        $this->_tableHelper->addKeyMapping('name','Name');
        $this->_tableHelper->addKeyMapping('street','Straße');
        $this->_tableHelper->addKeyMapping('number','Hausnummer');
        $this->_tableHelper->addKeyMapping('zip','PLZ');
        $this->_tableHelper->addKeyMapping('city','Stadt');
        $this->_tableHelper->addKeyMapping('action','Aktion');
        $this->_tableHelper->addKeyMapping('action2','Aktion');

        $this->_tableHelper->bindLink('action',base_url() . 'venue/details/','id','','btn btn-primary btn-xs','Details');
        $this->_tableHelper->bindLink('action2',base_url() . 'gig/create/','id','','btn btn-success btn-xs','<span class="fa fa-plus"></span> Gig');

        $this->icon = 'fa-globe';
    }
}