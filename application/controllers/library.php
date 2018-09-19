<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Library extends CI_Controller {

    function __construct() {
        parent::__construct();
        header_remove();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('General_model');
        $this->load->model('Library_model');
    }

    public function add_category() {
        $data['book_cat_name'] = $this->input->post('book_cat_name', true);
        $data['remarks'] = $this->input->post('remarks', true);
        $insertData = $this->Library_model->save_data('book_categories', $data);
        if ($insertData) {
            $this->session->set_flashdata('success', 'Data save successfull');
            redirect('library/book_category');
        } else {
            $this->session->set_flashdata('error', 'Something is wrong! please try again');
            redirect('library/book_category');
        }
    }

    public function delete_category($id) {
        $deleteData = $this->General_model->delete('book_categories', array('book_catid' => $id));
        if ($deleteData) {
            $this->session->set_flashdata('success', 'Data Deleted successfully');
            redirect('library/book_category');
        } else {
            $this->session->set_flashdata('error', 'Something is wrong! please try again');
            redirect('library/book_category');
        }
    }

    public function add_subcategory() {
        $data['book_main_catid'] = $this->input->post('book_main_catid', true);
        $data['category_name'] = $this->input->post('category_name', true);
        $data['remarks'] = $this->input->post('remarks', true);
        $insertData = $this->Library_model->save_data('book_subcategories', $data);
        if ($insertData) {
            $this->session->set_flashdata('success', 'Data save successfull');
            redirect('library/book_subcategory');
        } else {
            $this->session->set_flashdata('error', 'Something is wrong! please try again');
            redirect('library/book_subcategory');
        }
    }

    public function book_subcategory() {
        $data['categorylist'] = $this->General_model->slect_any_table('book_categories');
        $data['title'] = 'Sub Category';
        $data['subcategorylist'] = $this->General_model->slect_any_table('book_subcategories');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'library/sub-category';
        $this->load->view('layout', $data);
    }

    public function delete_subcategory($id) {
        $deleteData = $this->General_model->delete('book_subcategories', array('subcat_id' => $id));
        if ($deleteData) {
            $this->session->set_flashdata('success', 'Data Deleted successfully');
            redirect('library/book_subcategory');
        } else {
            $this->session->set_flashdata('error', 'Something is wrong! please try again');
            redirect('library/book_subcategory');
        }
    }

    public function publishers() {
        $data['title'] = 'Publishers';
        $data['publisherlist'] = $this->General_model->slect_any_table('book_publishers');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'library/publisher';
        $this->load->view('layout', $data);
    }

    public function add_publishers() {
        $data['publisher_name'] = $this->input->post('publisher_name', true);
        $data['publisher_phone'] = $this->input->post('publisher_phone', true);
        $data['publisher_email'] = $this->input->post('publisher_email', true);
        $data['publisher_website'] = $this->input->post('publisher_website', true);
        $data['remarks'] = $this->input->post('remarks', true);

        $insertData = $this->Library_model->save_data('book_publishers', $data);
        if ($insertData) {
            $this->session->set_flashdata('success', 'Data save successfull');
            redirect('library/publishers');
        } else {
            $this->session->set_flashdata('error', 'Something is wrong! please try again');
            redirect('library/publishers');
        }
    }

    public function delete_publishers($id) {
        $deleteData = $this->General_model->delete('book_publishers', array('publisher_id' => $id));
        if ($deleteData) {
            $this->session->set_flashdata('success', 'Data Deleted successfully');
            redirect('library/publishers');
        } else {
            $this->session->set_flashdata('error', 'Something is wrong! please try again');
            redirect('library/publishers');
        }
    }

    public function authors($edit = 0) {
        $data['title'] = 'Authors';
        $data['name_autor']     = '';
        $data['name_detaiils']  = '';
        $updateStatus = 0;
        if($edit > 0){
            $existsBranch = $this->Library_model->autor_search($edit);
            if(is_array($existsBranch) AND sizeof($existsBranch) > 0){
                $data['name_autor']     = $existsBranch[0]['author_name'];
                $data['name_detaiils']  = $existsBranch[0]['author_details'];
                $updateStatus = 1;
            }
        }
        if(isset($_POST['author_submit'])){
            $insert = array(); 
            if($updateStatus == 0){
                 $insert['author_name'] = $this->input->post('author_name', true);
            }
            $insert['author_details'] = $this->input->post('author_details', true);
            if($updateStatus == 0){
                $insertData = $this->db->insert('books_author', $insert);
                if ($insertData) {
                    $this->session->set_flashdata('success', 'Data save successfull');  
                } else {
                    $this->session->set_flashdata('error', 'Something is wrong! please try again');               
                }
            }else{
                $insertData = $this->db->update('books_author', $insert, array('author_id' => $edit));
                if ($insertData) {
                    $this->session->set_flashdata('success', 'Data Update successfull');  
                } else {
                    $this->session->set_flashdata('error', 'Something is wrong! please try again');               
                }
            }
        }
       
        $data['authorlist'] = $this->General_model->slect_any_table('books_author');
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'library/author';
        $this->load->view('layout', $data);
    }
    
   public function delete_author($id) {
        $deleteData = $this->db->delete('books_author', array('author_id' => $id));
        if ($deleteData) {
            $this->session->set_flashdata('success', 'Data Deleted successfully');
            redirect('library/authors');
        } else {
            $this->session->set_flashdata('error', 'Something is wrong! please try again');
            redirect('library/authors');
        }
    }

    
    
    public function book() {
        $data['title'] = "Book's";
        $data['publisherlist'] = $this->General_model->slect_any_table('books');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'library/books';
        $this->load->view('layout', $data);
    }
    
    
    
  public function categories($edit = 0) {
        $data['title'] = 'Categories';
        $data['name_category']     = '';
        $data['cat_remarks']       = '';
        $updateStatus = 0;
        if($edit > 0){
            $catEdit = $this->Library_model->category_search($edit);
            if(is_array($catEdit) AND sizeof($catEdit) > 0){
                $data['name_category'] = $catEdit[0]['book_cat_name'];
                $data['cat_remarks']  = $catEdit[0]['remarks'];
                $updateStatus = 1;
            }
        }
        if(isset($_POST['cat_submit'])){
            $insert = array(); 
            if($updateStatus == 0){
                 $insert['book_cat_name'] = $this->input->post('book_cat_name', true);
            }
            $insert['remarks'] = $this->input->post('remarks', true);
            if($updateStatus == 0){
                $insertData = $this->db->insert('book_categories', $insert);
                if ($insertData) {
                    $this->session->set_flashdata('success', 'Data save successfull');  
                } else {
                    $this->session->set_flashdata('error', 'Something is wrong! please try again');               
                }
            }else{
                $insertData = $this->db->update('book_categories', $insert, array('book_catid' => $edit));
                if ($insertData) {
                    $this->session->set_flashdata('success', 'Data Update successfull');  
                    redirect('library/categories');
                } else {
                    $this->session->set_flashdata('error', 'Something is wrong! please try again');      
                     redirect('library/categories');
                }
            }
        }
       
        $data['categorylist'] = $this->General_model->slect_any_table('book_categories');
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'library/category';
        $this->load->view('layout', $data);
    }
    
}
