<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of General_model
 *
 * @author User
 */
class Report_model extends CI_Model {

    
    public function select_any_where_in($table, $where) {
 
        $this->db->where_in($where);
        $queryData = $this->db->get($table);
        return $queryData->result();
    }

    public function delete($table, $where) {
        $this->db->where($where);
        $this->db->delete($table);
    }

}
