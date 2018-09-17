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
class Student_model extends CI_Model {

    public function save($data, $id) {
        if ($id > 0) {
            $this->db->where('s_id', $id);
            $this->db->update('students', $data);
        } else {
            $this->db->insert('students', $data);
            return $this->db->insert_id();
        }
    }
    
    

 

    public function existsData($id) {
        if ($id < 1)
            return false;

        $query = $this->db->get_where('students', array('s_id' => $id));

        return sizeof($query->row_array());
    }

}
