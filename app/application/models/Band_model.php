<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 09.01.16
 * Time: 23:07
 */

class Band_model extends STEEN_Model {

    public function __construct() {
        parent::__construct();
    }


    /**
     * @return CI_DB_query_builder
     */
    private function _prepareStatement() {
        return $this->db->select([
            'b.id',
            'b.name',
            'b.logo',
            'b.insert_time',
            'b.insert_user'
        ])
            ->from('band b')
            ->where('b.deleted',0);
    }

    /**
     * @return mixed
     */
    public function get() {
        return $this->_prepareStatement()
            ->order_by('b.name ASC')
            ->get()
            ->result();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function byId($id) {
        return $this->_prepareStatement()
            ->where('b.id', $id)
            ->get()
            ->row();
    }

    /**
     * @param $aData
     * @return mixed
     */
    public function insert($aData) {
        $this->db->insert('band', $aData);
        return $this->db->insert_id();
    }

    /**
     * @param $iBandId
     * @param $aBand
     * @return mixed
     */
    public function update($iBandId, $aBand) {
        $this->db->where('id', $iBandId)
            ->update('band', $aBand);
        return $iBandId;
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id) {
        return $this->db->where('id',$id)
            ->update('band',[
                'deleted' => 1
            ]);
    }

    /**
     * @param $iVenueId
     * @return mixed
     */
    public function byVenueId($iVenueId) {
        return $this->_prepareStatement()
            ->join('gig_band gb','gb.band_id = b.id')
            ->join('gig g','gb.gig_id = g.id')
            ->where('g.venue_id',$iVenueId)
            ->group_by('b.id')
            ->order_by('b.name ASC')
            ->get()
            ->result();
    }

    /**
     * @param $iGigId
     * @return mixed
     */
    public function byGigId($iGigId) {
        return $this->_prepareStatement()
            ->join('gig_band gb','gb.band_id = b.id')
            ->where('gb.gig_id',$iGigId)
            ->order_by('b.name ASC')
            ->get()
            ->result();
    }

    /**
     * @param $iPersonId
     * @return mixed
     */
    public function byPersonId($iPersonId) {
        return $this->_prepareStatement()
            ->join('band_person bp','bp.band_id = b.id')
            ->where('bp.person_id',$iPersonId)
            ->order_by('b.name ASC')
            ->get()
            ->result();
    }

    /**
     * @param $sTerm
     * @return mixed
     */
    public function search($sTerm) {
        if (empty($sTerm)) {
            return [];
        }

        $aTerms = explode(' ',$sTerm);

        $this->db->select('id,name')
            ->from('band')
            ->group_start();

        foreach ($aTerms as $sTerm) {
            $this->db->or_like('name', $sTerm);
        }

        $this->db->group_end()->where('deleted', 0);;

        return $this->db->get()
            ->result_array();
    }

    /**
     * @param $iBandId
     * @param $iGigId
     * @return mixed
     */
    public function connectToGig($iBandId,$iGigId) {

        $aData = [
            'gig_id' => $iGigId,
            'band_id' => $iBandId
        ];

        $this->log_model->log('connect',$aData);

        return $this->db->insert('gig_band', $aData);
    }

    /**
     * @param $iBandId
     * @param $iGigId
     * @return mixed
     */
    public function disconnectFromGig($iBandId,$iGigId) {

        $aData = [
            'gig_id' => $iGigId,
            'band_id' => $iBandId
        ];

        $this->log_model->log('disconnect',$aData);

        return $this->db->where($aData)->delete('gig_band');
    }

    /**
     * @param $iBandId
     * @param $iGigId
     * @return bool
     */
    public function isConnectedToGig($iBandId,$iGigId) {
        $aRows = $this->db->select('gig_id,band_id')
            ->from('gig_band')
            ->where([
                'gig_id' => $iGigId,
                'band_id' => $iBandId
            ])->get()
            ->result_array();

        return (!empty($aRows));
    }

    /**
     * @param $iBandId
     * @param $iPersonId
     * @return mixed
     */
    public function connectToPerson($iBandId, $iPersonId) {

        $aData = [
            'person_id' => $iPersonId,
            'band_id' => $iBandId
        ];

        $this->log_model->log('connect', $aData);

        return $this->db->insert('band_person', $aData);
    }

    /**
     * @param $iBandId
     * @param $iPersonId
     * @return mixed
     */
    public function disconnectFromPerson($iBandId, $iPersonId) {

        $aData = [
            'person_id' => $iPersonId,
            'band_id' => $iBandId
        ];

        $this->log_model->log('disconnect', $aData);

        return $this->db->where($aData)->delete('band_person');
    }

    /**
     * @param $iBandId
     * @param $iPersonId
     * @return bool
     */
    public function isConnectedToPerson($iBandId, $iPersonId) {
        $aRows = $this->db->select('person_id,band_id')
            ->from('band_person')
            ->where([
                'person_id' => $iPersonId,
                'band_id' => $iBandId
            ])->get()
            ->result_array();

        return (!empty($aRows));
    }


}