<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class library extends CI_Controller {

    function __construct() {
        parent::__construct();
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

    public function book_category() {
        $data['title'] = 'Category';
        $data['categorylist'] = $this->General_model->slect_any_table('book_categories');
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'library/category';
        $this->load->view('layout', $data);
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
      
}
