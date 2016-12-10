<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 10.12.16
 * Time: 08:29
 */

class Band extends Content_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * @param $sType
     * @param $iTargetId
     */
    public function load($sType,$iTargetId = null) {
        switch ($sType) {
            case 'gig':

                $aBands = $this->band_model->byGigId($iTargetId);
                $bandWidget = new BandListWidget('gig-details-band-widget',$aBands);
                $bandWidget->getTableHelper()->includes->add(new TableInclude(
                    'partials/modules/table/disconnect_include/header',
                    'partials/modules/table/disconnect_include/row',
                    'partials/modules/table/disconnect_include/footer'
                ));
                $bandWidget->headerIncludeList->addHeaderInclude(new WidgetHeaderSearchInclude('band','gig',$iTargetId));
                $bandWidget->renderWidgetBody();
                break;
            case 'person':
                $aBands = $this->band_model->byPersonId($iTargetId);
                $bandWidget = new BandListWidget('person-details-band-widget',$aBands);
                /*$bandWidget->getTableHelper()->includes->add(new TableInclude(
                    'partials/modules/table/disconnect_include/header',
                    'partials/modules/table/disconnect_include/row',
                    'partials/modules/table/disconnect_include/footer'
                ));*/
                $bandWidget->headerIncludeList->addHeaderInclude(new WidgetHeaderSearchInclude('band','person',$iTargetId));
                $bandWidget->renderWidgetBody();
                break;
        }
    }
}