<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 09.01.16
 * Time: 13:58
 */

class PersonDetailsWidget extends SteenWidget {
    function __construct($id, $oPerson, $writable = true, $showDetailsButton = false) {

        $oPerson->writable = $writable;
        $oPerson->showDetailsButton = $showDetailsButton;

        parent::__construct(
            $id,
            'Person: ' . $oPerson->firstname . ' ' . $oPerson->lastname,
            'person/widgets/person_details',
            [
                'oPerson' => $oPerson
            ]
        );

        $this->icon = 'fa-user';

    }
}

class PersonListWidget extends SteenTableWidget {

    function __construct($id, $aPersons, $title = '') {

        parent::__construct($id,$aPersons,$title === '' ? 'Kontakte' : $title);

        $this->_tableHelper->tableId = $id . '-table';
        $this->_tableHelper->setData($aPersons);

        $this->_tableHelper->setCustomFieldList([
            'firstname','lastname','phone','email','action'
        ]);

        $this->_tableHelper->addKeyMapping('firstname','Vorname');
        $this->_tableHelper->addKeyMapping('lastname','Nachname');
        $this->_tableHelper->addKeyMapping('phone','Nummer');
        $this->_tableHelper->addKeyMapping('email','E-Mail');
        $this->_tableHelper->addKeyMapping('action','Aktion');
        $this->_tableHelper->bindLink('action',base_url() . 'person/details/','id','','btn btn-primary btn-xs','Details');
        $this->_tableHelper->bindLink('email', 'mailto:','email');

        $this->icon = 'fa-user';
    }
}