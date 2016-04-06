<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 09.01.16
 * Time: 23:22
 */

class BandDetailsWidget extends SteenWidget {
    function __construct($id, $oBand, $writable = true, $showDetailsButton = false) {

        $oBand->writable = $writable;
        $oBand->showDetailsButton = $showDetailsButton;

        parent::__construct(
            $id,
            'Band: ' . $oBand->name,
            'band/widgets/band_details',
            [
                'oBand' => $oBand
            ]
        );

        $this->icon = 'fa-music';

    }
}

class BandListWidget extends SteenTableWidget {

    function __construct($id, $aBands, $title = '') {

        parent::__construct($id,$aBands,$title === '' ? 'Bands' : $title);

        $this->_tableHelper->tableId = $id . '-table';
        $this->_tableHelper->setData($aBands);

        $this->_tableHelper->setCustomFieldList([
            'name','action'
        ]);

        $this->_tableHelper->addKeyMapping('name','Name');
        $this->_tableHelper->addKeyMapping('action','Aktion');

        $this->_tableHelper->bindLink('action',base_url() . 'band/details/','id','','btn btn-primary btn-xs','Details');

        $this->icon = 'fa-music';

    }
}