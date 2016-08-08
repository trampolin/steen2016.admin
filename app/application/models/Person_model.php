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
    private function _prepareStatement() {
        return $this->db->select([
            'p.id',
            'p.firstname',
            'p.lastname',
            'p.email',
            'p.phone',
            'p.memo'
        ])
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
     * @param $aData
     * @return int
     */
    public function insert($aData) {
        $this->db->insert('person', $aData);
        return $this->db->insert_id();
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
        return $this->db->insert('venue_person', [
            'venue_id' => $iVenueId,
            'person_id' => $iPersonId
        ]);
    }

    /**
     * @param $iPersonId
     * @param $iVenueId
     * @return mixed
     */
    public function disconnectFromVenue($iPersonId,$iVenueId) {
        return $this->db->where([
            'venue_id' => $iVenueId,
            'person_id' => $iPersonId
        ])->delete('venue_person');
    }

    /**
     * @param $iPersonId
     * @param $iVenueId
     * @return bool
     */
    public function isConnectedToVenue($iPersonId,$iVenueId) {
        $aRows = $this->db->select('gig_id,band_id')
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