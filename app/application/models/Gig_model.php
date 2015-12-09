<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.12.15
 * Time: 20:51
 */

class Gig_model extends STEEN_Model {

    public function __construct() {
        parent::__construct();
    }


    /**
     * @return CI_DB_query_builder
     */
    private function _prepareStatement() {
        return $this->db->select([
            'g.id',
            'g.title',
            'g.venue_id',
            'g.date',
            'g.getin',
            'g.doors',
            'g.status',
            'g.memo',
            'g.insert_time',
            'g.insert_user',
            'v.name'
        ])
            ->from('gig g')
            ->join('venue v','v.id = g.venue_id')
            ->where('g.deleted',0);
    }

    public function get() {
        return $this->_prepareStatement()
            ->order_by('g.date DESC')
            ->get()
            ->result();
    }

    /**
     * @return array
     */
    public function getGigStatusArray() {
        return [
            'inactive' => 'Inaktiv',
            'active' => 'Aktiv',
            'abandoned' => 'Abgesagt'
        ];
    }
}