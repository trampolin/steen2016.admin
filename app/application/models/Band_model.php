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
}