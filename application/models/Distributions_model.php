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
class Distributions_model extends CI_Model {

    public function add_dist_mark($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function save($data, $id) {
        if ($id > 0) {
            $this->db->where('program_id', $id);
            $this->db->update('programs', $data);
        } else {
            $this->db->insert('programs', $data);
            return $this->db->insert_id();
        }
    }

    public function existsData($table, $where) {

        $this->db->where($whare);
        $query = $this->db->get($table);

        return $query->result_array();
    }

//    public function getCollection($table, $where) {
//
//        $this->db->where($where);
//        $query = $this->db->get($table);
//
//        $result = array();
//        $hasNext = $query->result_array();
//
//        for ($i = 0; $i < sizeof($hasNext); $i++) {
//            if ($hasNext) {
//                array_push($result, $hasNext);
//            } else {
//                break;
//            }
//        }
//
//        return $result;
//    }

}
