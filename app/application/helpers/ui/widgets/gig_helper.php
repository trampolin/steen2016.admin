<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 09.01.16
 * Time: 13:24
 */


class GigDetailsWidget extends SteenWidget {
    function __construct($id, $oGig, $writable = true, $showDetailsButton = false) {

        $oGig->writable = $writable;
        $oGig->showDetailsButton = $showDetailsButton;

        parent::__construct(
            $id,
            'Gig: ' . $oGig->name,
            'gig/widgets/gig_details',
            [
                'oGig' => $oGig
            ]
        );

        $this->icon = 'fa-bullhorn';

    }
}

class GigListWidget extends SteenTableWidget {

    function __construct($id, $aGigs, $title = '') {

        parent::__construct($id,$aGigs,$title === '' ? 'Gigs' : $title);

        $this->_tableHelper->tableId = $id . '-table';
        $this->_tableHelper->setData($aGigs);

        $this->_tableHelper->setCustomFieldList([
            'title','date','name','action'
        ]);

        $this->_tableHelper->addKeyMapping('title','Name');
        $this->_tableHelper->addKeyMapping('date','Datum');
        $this->_tableHelper->addKeyMapping('name','Venue');
        $this->_tableHelper->addKeyMapping('action','Aktion');
        $this->_tableHelper->bindConversion('date','pretty-date');
        $this->_tableHelper->bindLink('action',base_url() . 'gig/details/','id','','btn btn-primary btn-xs','Details');

        $this->icon = 'fa-bullhorn';
    }
}