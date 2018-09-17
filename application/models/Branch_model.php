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
class Branch_model extends CI_Model {

    public function saveBranch($data, $id) {
        if ($id > 0) {
            $this->db->where('branch_id', $id);
            $this->db->update('branchs', $data);
        } else {
            $this->db->insert('branchs', $data);
            return $this->db->insert_id();
        }
    }

 

    public function existsBranch($id) {
        if ($id < 1)
            return false;

        $query = $this->db->get_where('branchs', array('branch_id' => $id));

        return sizeof($query->row_array());
    }

}
