<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.05.16
 * Time: 09:20
 */

class Disconnect extends Ajax_Controller {

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

    /**
     * @param $iGigId
     * @param $sTargetType
     * @param $iTargetId
     */
    public function gig($iGigId,$sTargetType,$iTargetId) {
        switch ($sTargetType) {
            case 'band':
                $this->band($iTargetId,'gig',$iGigId);
                break;
            default:
                $this->jsonOutput('cannot disconnect gig and ' . $sTargetType,false);
        }
    }

    /**
     * @param $iPersonId
     * @param $sTargetType
     * @param $iTargetId
     */
    public function person($iPersonId, $sTargetType, $iTargetId) {
        switch ($sTargetType) {
            case 'venue':
                $this->person_model->disconnectFromVenue($iPersonId,$iTargetId);
                $this->jsonOutput('disconnected');
                break;
            case 'band':
                $this->band($iTargetId,'person',$iPersonId);
                break;
            default:
                $this->jsonOutput('cannot disconnect person and ' . $sTargetType,false);
        }
    }

    /**
     * @param $iVenueId
     * @param $sTargetType
     * @param $iTargetId
     */
    public function venue($iVenueId,$sTargetType,$iTargetId) {
        switch ($sTargetType) {
            case 'person':
                $this->person($iTargetId,'venue',$iVenueId);
                break;
            default:
                $this->jsonOutput('cannot disconnect gig and ' . $sTargetType,false);
        }
    }
}