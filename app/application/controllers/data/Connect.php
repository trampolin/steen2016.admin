<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 07.05.16
 * Time: 14:36
 */

class Connect extends Ajax_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * connect band and $sTargetType
     *
     * @param int $iBandId
     * @param string $sTargetType
     * @param int $iTargetId
     */
    public function band($iBandId,$sTargetType,$iTargetId) {
        switch ($sTargetType) {
            case 'gig':
                if (!$this->band_model->isConnectedToGig($iBandId,$iTargetId)) {
                    $this->jsonOutput($this->band_model->connectToGig($iBandId,$iTargetId));
                } else {
                    $this->jsonOutput('already connected',false);
                }
                break;
            
            case 'person':
                if (!$this->band_model->isConnectedToPerson($iBandId,$iTargetId)) {
                    $this->jsonOutput($this->band_model->connectToPerson($iBandId,$iTargetId));
                } else {
                    $this->jsonOutput('already connected',false);
                }
                break;
            
            default:
                $this->jsonOutput('cannot connect band and ' . $sTargetType,false);
        }
    }

    /**
     * @param $iPersonId
     * @param $sTargetType
     * @param $iTargetId
     */
    public function person($iPersonId,$sTargetType,$iTargetId) {
        switch ($sTargetType) {
            case 'band':
                $this->band($iTargetId,'person',$iPersonId);
                break;
            case 'venue':
                if (!$this->person_model->isConnectedToVenue($iPersonId,$iTargetId)) {
                    $this->jsonOutput($this->person_model->connectToVenue($iPersonId,$iTargetId));
                } else {
                    $this->jsonOutput('already connected',false);
                }
                break;
            default:
                $this->jsonOutput('cannot connect person and ' . $sTargetType,false);
        }
    }
}