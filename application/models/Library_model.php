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
class Library_model extends CI_Model {

    public function save_data($tableName, $data) {
        $this->db->insert($tableName, $data);
        return $this->db->insert_id();
    }

     public function autor_search($id) {
        if ($id > 0){
         $query = $this->db->get_where('books_author', array('author_id' => $id));
            if($query->num_rows() == 1){
                return $query->result_array();
            }else{
                return array();
            }
        }else{
            return array();
        }
       
    }
    
    
     public function category_search($id) {
        if ($id > 0){
         $query = $this->db->get_where('book_categories', array('book_catid' => $id));
            if($query->num_rows() == 1){
                return $query->result_array();
            }else{
                return array();
            }
        }else{
            return array();
        }
       
    }
}
