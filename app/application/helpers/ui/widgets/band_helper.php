<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 09.01.16
 * Time: 23:22
 */

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