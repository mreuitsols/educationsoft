<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accounts_model
 *
 * @author Euitsols
 */
class Accounts_model extends CI_Model {

    public function save_data($tableName, $data) {
        $this->db->insert($tableName, $data);
        return $this->db->insert_id();
    }

}
