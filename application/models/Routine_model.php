<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Routine_model
 *
 * @author User
 */
class Routine_model extends CI_Model {

    public function save($table,$data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

}
