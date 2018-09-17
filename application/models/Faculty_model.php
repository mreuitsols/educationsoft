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
class Faculty_model extends CI_Model {

    public function saveFaculty($data, $id) {
        if ($id > 0) {
            $this->db->where('faculty_id', $id);
            $this->db->update('faculty', $data);
        } else {
            $this->db->insert('faculty', $data);
            return $this->db->insert_id();
        }
    }

    public function existsFaculty($id) {
        if ($id < 1)
            return false;

        $query = $this->db->get_where('faculty', array('faculty_id' => $id));

        return sizeof($query->row_array());
    }

  

}
