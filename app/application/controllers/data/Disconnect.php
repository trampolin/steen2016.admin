<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.05.16
 * Time: 09:20
 */

class Connect extends Ajax_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * @param $iBandId
     * @param $sTargetType
     * @param $iTargetId
     */
    public function band($iBandId,$sTargetType,$iTargetId) {

        switch ($sTargetType) {
            case 'gig':
                $this->band_model->disconnectFromGig($iBandId,$iTargetId);
                $this->jsonOutput('disconnected');
                break;

            case 'person':
                $this->band_model->disconnectFromPerson($iBandId,$iTargetId);
                $this->jsonOutput('disconnected');
                break;

            default:
                $this->jsonOutput('cannot disconnect band and ' . $sTargetType,false);
        }

    }
}