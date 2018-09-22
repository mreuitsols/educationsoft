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


        $program_id = $this->input->post('program_id', true);
        $data['program_id'] = $program_id;
        $semester_id = $this->input->post('semester_id', true);
        $data['semester_id'] = $semester_id;
        $session_id = $this->input->post('session_id', true);
        $data['session_id'] = $session_id;
        $total_amount = 0;
        $pIds = $this->input->post('purpose_id', true);
        $amount = $this->input->post('amount', true);
        $where = array('program_id' => $program_id, 'semester_id' => $semester_id, 'session_id' => $session_id);
        $this->General_model->update('fees_amount_by_semester', $where, array('status' => '1'));
        $insertData = '';
        for ($i = 0; $i < sizeof($pIds); $i++) {

            $where = array('program_id' => $program_id, 'semester_id' => $semester_id, 'session_id' => $session_id, 'account_purpose_id' => $pIds[$i]);
            $fees_amount_by_semester = $this->General_model->select_any_where('fees_amount_by_semester', $where);

            if (is_array($fees_amount_by_semester) && sizeof($fees_amount_by_semester) > 0) {

                $where = array('fees_amount_id' => $fees_amount_by_semester['fees_amount_id']);
                $insertData = $this->General_model->update('fees_amount_by_semester', $where, array('amount' => $amount[$i], 'status' => '1'));
            } else {
                $data['account_purpose_id'] = $pIds[$i];
                $data['amount'] = $amount[$i];
                $data['status'] = 1;
                $insertData = $this->Accounts_model->save_data('fees_amount_by_semester', $data);
            }
        }


        if ($insertData) {
            $this->session->set_flashdata('success', 'Data save successfull');
            redirect('accounts/add_fees_amount');
        } else {
            $this->session->set_flashdata('error', 'Something is wrong! please try again');
            redirect('accounts/add_fees_amount');
        }
    }

    public function add_student_fees_by_semester() {
        $data['semesters'] = $this->General_model->slect_any_table('semesters');
        $data['sections'] = $this->General_model->slect_any_table('sessions');
        $data['programs'] = $this->General_model->slect_any_table('programs');
        $data['fee_purpose'] = $this->General_model->slect_any_table('account_purpose_list');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'accounts/add_student_fees_by_semester';
        $data['title'] = 'Add Student Fees by Semester';
        $this->load->view('layout', $data);
    }

    public function save_st_fees_by_semester() {

        $program_id = $this->input->post('program_id', true);
        $semester_id = $this->input->post('semester_id', true);
        $session_id = $this->input->post('session_id', true);

        $data['program_id'] = $program_id;
        $data['semester_id'] = $semester_id;
        $data['session_id'] = $session_id;
        $update_where = array('program_id' => $program_id, 'semester_id' => $semester_id, 'session_id' => $session_id);
        $this->General_model->update('student_fees_by_semeste', $update_where, array('status' => '0'));

        $pIds = $this->input->post('purpose_id');
        $pAmount = $this->input->post('amount');

        $insertId = [];
        for ($i = 0; $i < sizeof($pIds); $i++) {

            $where = array('program_id' => $this->input->post('program_id', true), 'semester_id' => $this->input->post('semester_id', true), 'session_id' => $this->input->post('session_id', true), 'purpose_id' => $pIds[$i]);
            $student_fees_by_semeste = $this->General_model->select_any_where('student_fees_by_semeste', $where);
            if (is_array($student_fees_by_semeste) && sizeof($student_fees_by_semeste) > 0) {
                echo $pAmount[$i].'<br/>';
                $updateData['status'] = '1';
                $updateData['fees_amount'] = $pAmount[$i];
                
                $this->General_model->update('student_fees_by_semeste', $where,$updateData);
               
            } else {
                $data['purpose_id'] = $pIds[$i];
                $data['fees_amount'] = $pAmount[$i];
                $insertId[] = $this->Accounts_model->save_data('student_fees_by_semeste', $data);
            }
        }
 
        if ($insertId > 0) {
            $this->session->set_flashdata('success', 'Data add successfull');
            redirect('accounts/add_student_fees_by_semester');
        } else {
            $this->session->set_flashdata('error', 'Something Error! Please try again');
            redirect('accounts/add_student_fees_by_semester');
        }
    }

    public function addpayment() {
        $data['semesters'] = $this->General_model->slect_any_table('semesters');
        $data['sections'] = $this->General_model->slect_any_table('sessions');
        $data['programs'] = $this->General_model->slect_any_table('programs');
        $data['fee_purpose'] = $this->General_model->slect_any_table('account_purpose_list');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'accounts/pay-form';
        $data['title'] = 'Add Student Fees by Semester';
        $this->load->view('layout', $data);
    }

    public function search_st_data() {

        $student_id = $this->input->post('student_id');
        $where = array('student_id' => $student_id);
        $studentData = $this->General_model->select_any_where('students', $where);

        if ($studentData == NULL) {
            $this->session->set_flashdata('error', 'Student ID Not Found');
            redirect('accounts/addpayment');
        }

        $data['student_info'] = $studentData;


        $sumColumn = 'dr_amount';
        $dueAmount = $this->Accounts_model->select_sum_where('student_account', 'dr_amount', $where);
        $data['dueAmount'] = $dueAmount;

        $where = array('program_id' => $studentData['program_id'], 'semester_id' => $studentData['semester_id'], 'session_id' => $studentData['session_id'], 'status' => 1);

        $data['FeepurposeData'] = $this->General_model->select_any_one_where('student_fees_by_semeste', $where);

        $where = array('program_id' => $studentData['program_id'], 'semester_id' => $studentData['semester_id'], 'session_id' => $studentData['session_id'], 'student_id' => $student_id);
        $data['pay_amount'] = $this->Accounts_model->select_sum_where('student_account', 'cr_amount', $where);

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'accounts/pay_student_amount';
        $data['title'] = 'Add Student Fees by Semester';
        $this->load->view('layout', $data);
    }

    public function save_cr_payment() {

        $data['program_id'] = $this->input->post('program_id', true);
        $data['semester_id'] = $this->input->post('semester_id', true);
        $data['session_id'] = $this->input->post('session_id', true);
        $data['student_id'] = $this->input->post('student_id', true);
        $data['dr_amount'] = $this->input->post('totalDue', true);




        $where = array('program_id' => $this->input->post('program_id', true), 'semester_id' => $this->input->post('semester_id', true), 'session_id' => $this->input->post('session_id', true), 'student_id' => $this->input->post('student_id', true));
        $studentBalance = $this->General_model->select_any_where('student_dr_account', $where);

        if (is_array($studentBalance) && sizeof($studentBalance) > 0) {
            $where = array('program_id' => $this->input->post('program_id', true), 'semester_id' => $this->input->post('semester_id', true), 'session_id' => $this->input->post('session_id', true), 'dr_id' => $studentBalance['dr_id']);
            $this->General_model->update('student_dr_account', $where, array('dr_amount' => $this->input->post('totalDue', true)));
        } else {
            $insertId = $this->Accounts_model->save_data('student_dr_account', $data);
        }


        $data['dr_amount'] = 0;

        $data['cr_amount'] = $this->input->post('pay_amount', true);

        $insertId = $this->Accounts_model->save_data('student_account', $data);

        if ($insertId) {
            $this->session->set_flashdata('success', 'Payment add successfull');
            redirect('accounts/addpayment');
        } else {
            $this->session->set_flashdata('error', 'Something Error! Please try again');
            redirect('accounts/addpayment');
        }
    }

    public function printpayment() {
        $data['semesters'] = $this->General_model->slect_any_table('semesters');
        $data['sections'] = $this->General_model->slect_any_table('sessions');
        $data['programs'] = $this->General_model->slect_any_table('programs');
        $data['fee_purpose'] = $this->General_model->slect_any_table('account_purpose_list');


        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'accounts/printpayment';
        $data['title'] = 'Add Student Fees by Semester';
        $this->load->view('layout', $data);
    }

    public function printinv() {

        $setting_name = $this->Setting_model->select_setting('Institute', 'settings')['value'];

        $data['Institute'] = $setting_name;

        $logo = $this->Setting_model->select_setting('logo', 'settings')['value'];
        $data['logo'] = $logo;


        $student_id = $this->input->post('student_id', true);
        $where = array('student_id' => $student_id);

        $studentData = $this->General_model->select_any_where('students', $where);
        $data['student_info'] = $studentData;
        $where = array('program_id' => $studentData['program_id'], 'semester_id' => $studentData['semester_id'], 'session_id' => $studentData['session_id'], 'status' => 1);

        $data['FeepurposeData'] = $this->General_model->select_any_one_where('student_fees_by_semeste', $where);

        $where = array('program_id' => $studentData['program_id'], 'semester_id' => $studentData['semester_id'], 'session_id' => $studentData['session_id'], 'student_id' => $student_id);
        $data['pay_amount'] = $this->Accounts_model->select_sum_where('student_account', 'cr_amount', $where);


        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'accounts/payPrint';
        $data['title'] = 'Add Student Fees by Semester';
        $this->load->view('layout', $data);
    }

    public function allpaymentfrm() {
        $data['semesters'] = $this->General_model->slect_any_table('semesters');
        $data['sections'] = $this->General_model->slect_any_table('sessions');
        $data['programs'] = $this->General_model->slect_any_table('programs');
        $data['fee_purpose'] = $this->General_model->slect_any_table('account_purpose_list');


        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'accounts/allpaymentcheck';
        $data['title'] = 'Add Student Fees by Semester';
        $this->load->view('layout', $data);
    }

    public function viewallprint() {

        $setting_name = $this->Setting_model->select_setting('Institute', 'settings')['value'];

        $data['Institute'] = $setting_name;

        $logo = $this->Setting_model->select_setting('logo', 'settings')['value'];
        $data['logo'] = $logo;


        $program_id = $this->input->post('program_id', true);
        $semester_id = $this->input->post('semester_id', true);
        $session_id = $this->input->post('session_id', true);
        $where = array('program_id' => $program_id, 'semester_id' => $semester_id, 'session_id' => $session_id);



        $dr_amount_studentList = $this->General_model->select_any_one_where('student_dr_account', $where);
        if (is_array($dr_amount_studentList) && sizeof($dr_amount_studentList) == NULL) {
            $this->session->set_flashdata('error', 'Something Error! Please try again');
            redirect('accounts/allpaymentfrm');
        }
        $data['dr_amount_studentList'] = $dr_amount_studentList;

        $studentData = $this->General_model->select_any_one_where('students', $where);
        $data['allstudent_info'] = $studentData; 
        
        $where = array('program_id' => $program_id, 'semester_id' => $semester_id, 'session_id' => $session_id,'status'=>'1');
         $student_dr_amount = $this->Accounts_model->select_sum_where('student_fees_by_semeste', 'fees_amount', $where);
        
        $data['student_dr_amount'] = $student_dr_amount[0]->fees_amount;
        
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'accounts/payStudentlist';
        $data['title'] = 'Add Student Fees by Semester';
        $this->load->view('layout', $data);
    }

}
