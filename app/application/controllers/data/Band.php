<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 07.05.16
 * Time: 13:30
 */


class Band extends Ajax_Controller {

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @param $iBandId
     */
    public function submit($iBandId) {

        $aBand = [
            'name' => $this->input->post('name'),
        ];

        $this->band_model->update($iBandId,$aBand);

        $aRow = $this->person_model->byId($iBandId);

        $this->jsonOutput($aRow,true);

    }

    /**
     *
     */
    public function search() {
        $aBands = $this->band_model->search($this->input->get('term'));
        $this->jsonOutput($aBands);
    }

    /**
     * @param $iId
     */
    public function delete($iId) {
        $this->band_model->delete($iId);
        $this->jsonOutput(null);
    }
}