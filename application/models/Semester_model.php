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
class Semester_model extends CI_Model {

    public function save($data, $id) {
        if ($id > 0) {
            $this->db->where('semester_id', $id);
            $this->db->update('semesters', $data);
        } else {
            $this->db->insert('semesters', $data);
            return $this->db->insert_id();
        }
    }

 

    public function exists($id) {
        if ($id < 1)
            return false;

        $query = $this->db->get_where('semesters', array('semester_id' => $id));

        return sizeof($query->row_array());
    }
    
    
    

}
