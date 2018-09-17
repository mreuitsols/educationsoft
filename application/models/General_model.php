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
class General_model extends CI_Model {

    public function slect_any_table($table) {
        $queryData = $this->db->get($table);
        return $queryData->result();
    }

	public function slect_any_tableNew($table) {
        $this->db->where('update_status', '1');
		$queryData = $this->db->get($table);
        return $queryData->result();
    }
	
	public function slect_any_tableNew1($table) {
        $this->db->where('update_status', '0');
		$queryData = $this->db->get($table);
        return $queryData->result();
    }
	
    public function select_any_where($table, $where) {
        $this->db->where($where);
        $queryData = $this->db->get($table);
        return $queryData->row_array();
    }

    public function select_any_one_where($table, $where) {
        $this->db->where($where);
        $queryData = $this->db->get($table);
        return $queryData->result();
    }

    public function select_any_where_row_result($table, $where) {
        $this->db->where($where);
        $queryData = $this->db->get($table);
        return $queryData->result_array();
    }

    public function select_distinct($table, $where) {
        $this->db->select('semester_id');
        $this->db->distinct();
        $this->db->where($where);
        $queryData = $this->db->get($table);
        return $queryData->result();
    }

    public function select_any_one_whered($table, $where) {
        $this->db->where($where);
        $queryData = $this->db->get($table);
        return $queryData->result();
    }

    public function select_any_where_in($table, $where) {
        $this->db->where_in('id', $where);
        $queryData = $this->db->get($table);
        return $queryData->result();
    }

    public function update($table, $where, $data) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete($table, $where) {
        $this->db->where($where);
        if ($this->db->delete($table)) {
            return TRUE;
        } else {

            return FALSE;
        }
    }

    function fetch_data($query) {
        $this->db->select("student_id");
        $this->db->from("students");
        if ($query != '') {
            $this->db->like('student_id', $query);
            $this->db->or_like('student_id', $query); 
        }
        $this->db->order_by('student_id', 'ASC');
        return $this->db->get();
    }

}
