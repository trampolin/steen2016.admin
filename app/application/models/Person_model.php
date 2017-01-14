<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.12.15
 * Time: 20:51
 */

class Person_model extends STEEN_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * @return CI_DB_query_builder
     */
    private function _prepareSelect() {
        return $this->db->select([
            'p.id',
            'p.firstname',
            'p.lastname',
            'p.email',
            'p.phone',
            'p.memo'
        ]);
    }

    /**
     * @return CI_DB_query_builder
     */
    private function _prepareStatement() {
        return $this->_prepareSelect()
            ->from('person p')
            ->where('p.deleted',0);
    }

    /**
     * @return mixed
     */
    public function get() {
        return $this->_prepareStatement()
            ->order_by('p.lastname ASC, p.firstname ASC')
            ->get()
            ->result();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function byId($id) {
        return $this->_prepareStatement()
            ->where('p.id', $id)
            ->get()
            ->row();
    }

    /**
     * @param $iVenueId
     * @return mixed
     */
    public function byVenueId($iVenueId) {
        return $this->_prepareStatement()
            ->join('venue_person vp','p.id = vp.person_id')
            ->where('vp.venue_id',$iVenueId)
            ->order_by('p.lastname ASC, p.firstname ASC')
            ->get()
            ->result();
    }

    /**
     * @param $iBandId
     * @return mixed
     */
    public function byBandId($iBandId) {
        return $this->_prepareStatement()
            ->join('band_person bp','p.id = bp.person_id')
            ->where('bp.band_id',$iBandId)
            ->order_by('p.lastname ASC, p.firstname ASC')
            ->get()
            ->result();
    }

    /**
     * @param $iGigId
     * @return mixed
     */
    public function byGigId($iGigId) {

        return $this->_prepareSelect()
            ->from('gig g')
            ->join('gig_band gb','gb.gig_id = g.id')
            ->join('band_person bp','bp.band_id = gb.band_id')
            ->join('venue_person vp', 'g.venue_id = vp.venue_id')
            ->join('person p','p.id = vp.person_id OR p.id = bp.person_id')
            ->where('g.id',$iGigId)
            ->where('p.deleted',0)
            ->group_by('p.id')
            ->order_by('p.lastname ASC, p.firstname ASC')
            ->get()
            ->result();
    }

    public function search($sTerm) {
        if (empty($sTerm)) {
            return [];
        }

        $aTerms = explode(' ',$sTerm);

        $this->db->select('id,firstname,lastname')
            ->from('person')
            ->group_start();

        foreach ($aTerms as $sTerm) {
            $this->db->or_like('firstname', $sTerm);
            $this->db->or_like('lastname', $sTerm);
            $this->db->or_like('email', $sTerm);
            $this->db->or_like('phone', $sTerm);
        }

        $this->db->group_end()->where('deleted', 0);

        $aData = $this->db->get()
            ->result_array();

        foreach ($aData as $i => $aRow) {
            $aData[$i]['name'] = $aRow['firstname'] . ' ' . $aRow['lastname'];
        }

        return $aData;
    }

    /**
     * @param $aData
     * @return int
     */
    public function insert($aData) {
        $this->db->insert('person', $aData);
        return $this->db->insert_id();
    }

    /**
     * @param int $iPersonId
     * @param $aData
     * @return int
     */
    public function update($iPersonId,$aData) {
        $this->db->where('id', $iPersonId)
            ->update('person', $aData);
        return $iPersonId;
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id) {
        return $this->db->where('id',$id)
            ->update('person',[
                'deleted' => 1
            ]);
    }

    public function byUserId($iUserId) {
        return $this->_prepareStatement()
            ->where('p.user_id', $iUserId)
            ->get()
            ->row();
    }

    public function find($term) {
        // todo implement smart find
        return $this->get();
    }

    /**
     * @param $iPersonId
     * @param $iVenueId
     * @return mixed
     */
    public function connectToVenue($iPersonId,$iVenueId) {

        $aData = [
            'venue_id' => $iVenueId,
            'person_id' => $iPersonId
        ];

        $this->log_model->log('connect',$aData);

        return $this->db->insert('venue_person', $aData);
    }

    /**
     * @param $iPersonId
     * @param $iVenueId
     * @return mixed
     */
    public function disconnectFromVenue($iPersonId,$iVenueId) {

        $aData = [
            'venue_id' => $iVenueId,
            'person_id' => $iPersonId
        ];

        $this->log_model->log('disconnect',$aData);

        return $this->db->where($aData)->delete('venue_person');
    }

    /**
     * @param $iPersonId
     * @param $iVenueId
     * @return bool
     */
    public function isConnectedToVenue($iPersonId,$iVenueId) {
        $aRows = $this->db->select('venue_id,person_id')
            ->from('venue_person')
            ->where([
                'venue_id' => $iVenueId,
                'person_id' => $iPersonId
            ])->get()
            ->result_array();

        return (!empty($aRows));
    }

    /**
     * render the gigModal into a view
     */
    public function personModal() {
        $mh = new ModalWindow('personModal');
        $mh->dataAttribute = 'data-person-id';
        $mh->loadFunctionName = 'loadPerson';
        $mh->ajaxRoute = base_url().'modal/person/show/';
        $mh->title = 'Person';
        $mh->icon = 'fa-user';
        $this->load->view('partials/modal/wrapper', $mh->getData());
    }
}