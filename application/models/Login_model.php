<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login_model
 *
 * @author User
 */
class Login_model extends CI_Model {

    public function checkLogin($username, $password) {

        $this->db->where(array('username' => $username, 'password' => $password));
        $queryData = $this->db->get('users');
        return $queryData->row_array();
    }

    public function selectUser($id) {
        $this->db->where(array('id' => $id));
        $queryData = $this->db->get('users');
        return $queryData->row_array();
    }

    
    
    public function unpdateStatus($data,$id){
        $this->db->where('id',$id);
        $this->db->update('users',array('online_status'=>$data));
    }
    
}
