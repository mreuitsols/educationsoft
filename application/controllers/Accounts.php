<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Accounts extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('General_model');
        $this->load->model('Setting_model');
        $this->load->model('Student_model');
        $this->load->model('Mark_model');
        $this->load->model('Report_model');
        $this->load->model('Accounts_model');
    }

    public function add_purpose() {
        $data['semesters'] = $this->General_model->slect_any_table('semesters');
        $data['sections'] = $this->General_model->slect_any_table('sessions');
        $data['programs'] = $this->General_model->slect_any_table('programs');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'accounts/add_purpose';
        $data['title'] = 'Fee Setup';
        $this->load->view('layout', $data);
    }

    public function save_purpose() {

        $data['purpose_name'] = $this->input->post('purpose_name', true);
        $data['purpose_description'] = $this->input->post('purpose_description', true);


        $insertData = $this->Accounts_model->save_data('account_purpose_list', $data);
        if ($insertData) {
            $this->session->set_flashdata('success', 'Data save successfull');
            redirect('accounts/purpose');
        } else {
            $this->session->set_flashdata('error', 'Something is wrong! please try again');
            redirect('accounts/purpose');
        }
    }

    public function add_fees_amount() {
        $data['semesters'] = $this->General_model->slect_any_table('semesters');
        $data['sections'] = $this->General_model->slect_any_table('sessions');
        $data['programs'] = $this->General_model->slect_any_table('programs');
        $data['fee_purpose'] = $this->General_model->slect_any_table('account_purpose_list');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'accounts/add_fees_amount';
        $data['title'] = 'Add Fees Amount';
        $this->load->view('layout', $data);
    }

    public function save_fees_amount() {

        $data['program_id'] = $this->input->post('program_id', true);
        $data['semester_id'] = $this->input->post('semester_id', true);
        $data['session_id'] = $this->input->post('session_id', true);
        $total_amount = 0;
        for ($i = 0; $i < sizeof($this->input->post('purpose_id', true)); $i++) {

            $data['account_purpose_id'] = $this->input->post('purpose_id', true)[$i];
            $data['amount'] = $this->input->post('amount', true)[$i];
            $total_amount = $total_amount + $this->input->post('amount', true)[$i];
           $insertData = $this->Accounts_model->save_data('fees_amount_by_semester', $data);
        }

        
        if ($insertData) {
            $this->session->set_flashdata('success', 'Data save successfull');
            redirect('accounts/add_fees_amount');
        } else {
            $this->session->set_flashdata('error', 'Something is wrong! please try again');
            redirect('accounts/add_fees_amount');
        }
    }
    
    
    public function add_studnet_fees_by_semester(){
        
    }

}
