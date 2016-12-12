<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 10.12.16
 * Time: 14:32
 */

class Person extends Content_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function load($sType,$iTargetId = null) {
        switch ($sType) {
            case 'band':
                $aPersons = $this->person_model->byBandId($iTargetId);
                $personWidget = new PersonListWidget('band-details-person-widget', $aPersons);
                $personWidget->headerIncludeList->addHeaderInclude(new WidgetHeaderSearchInclude('person','band',$iTargetId));
                $personWidget->getTableHelper()->includes->add(new DisconnectTableInclude('band','person',$iTargetId,'id'));
                $personWidget->renderWidgetBody();

                break;
            case 'venue':

                $aPersons = $this->person_model->byVenueId($iTargetId);
                $personWidget = new PersonListWidget('venue-details-person-widget', $aPersons);
                $personWidget->headerIncludeList->addHeaderInclude(new WidgetHeaderSearchInclude('person','venue',$iTargetId));

                $personWidget->getTableHelper()->includes->add(new DisconnectTableInclude('venue','person',$iTargetId,'id'));

                $personWidget->renderWidgetBody();

                break;
            default:
                echo 'not implemented yet';
        }
    }

}