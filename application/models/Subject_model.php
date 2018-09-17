<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Setting_model
 *
 * @author User
 */
class Subject_model extends CI_Model {

    public function save($table, $data) {

        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function update($table,$where, $data) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function select_result_data($table, $where) {
        $this->db->where($where);
        $queryData = $this->db->get($table);
        return $queryData->result();
    }

    public function existsData($id) {
        if ($id < 1)
            return false;

        $query = $this->db->get_where('subjects', array('subject_id' => $id));

        return sizeof($query->row_array());
    }

}
