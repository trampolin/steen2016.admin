<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.12.15
 * Time: 20:51
 */

class Venue_model extends STEEN_Model {

    public function __construct() {
        parent::__construct();
    }


    /**
     * @return CI_DB_query_builder
     */
    private function _prepareStatement() {
        return $this->db->select([
            'v.id',
            'v.name',
            'v.street',
            'v.number',
            'v.city',
            'v.zip',
            'v.latitude',
            'v.longitude'
        ])
            ->from('venue v')
            ->where('v.deleted',0);
    }

    /**
     * @return mixed
     */
    public function get() {
        return $this->_prepareStatement()
            ->order_by('v.name ASC')
            ->get()
            ->result();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function byId($id) {
        return $this->_prepareStatement()
            ->where('v.id', $id)
            ->get()
            ->row();
    }

    public function insert($aData) {
        $this->db->insert('venue', $aData);
        return $this->db->insert_id();
    }

    public function delete($id) {
        return $this->db->where('id',$id)
            ->update('venue',[
                'deleted' => 1
            ]);
    }

    public function update($id, $venue) {
        $this->db->where('id', $id)
            ->update('venue', $venue);

        return $id;
    }

    /**
     * render the gigModal into a view
     */
    public function venueModal() {
        $mh = new ModalWindow('venueModal');
        $mh->dataAttribute = 'data-venue-id';
        $mh->loadFunctionName = 'loadVenue';
        $mh->ajaxRoute = base_url().'modal/venue/show/';
        $mh->title = 'Venue';
        $mh->icon = 'fa-globe';
        $this->load->view('partials/modal/wrapper', $mh->getData());
    }
}