<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('General_model');
        $this->load->model('Teacher_model');
    }

    public function index() {
        $where = array('employee_type' => 'Teacher');
        $data['employees'] = $this->General_model->select_any_one_where('employees', $where);

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'teachers/teacher-list';
        $data['title'] = 'Teacher List';

        $this->load->view('layout', $data);
    }

    public function employees() {
        $where = array('employee_type' => 'Employee');
        $data['employees'] = $this->General_model->select_any_one_where('employees', $where);

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'teachers/employee-list';
        $data['title'] = 'Teacher List';

        $this->load->view('layout', $data);
    }

    public function create($id = NULL) {
        $data['departments'] = $this->General_model->slect_any_table('departments');

        $where = array('e_id' => $id);
        $data['employee'] = $this->General_model->select_any_where('employees', $where);

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'teachers/addteachers';
        $data['title'] = 'Add Teacher';
        $this->load->view('layout', $data);
    }

    public function save($id = NULL) {

//        $existsFaculty = $this->Teacher_model->existsData($id);

        $id = $this->input->post('e_id', true);
      

        $saveData['department_id'] = $this->input->post('department_id', true);
        $saveData['employee_name'] = $this->input->post('employee_name', true);
        $saveData['employee_id'] = $this->input->post('employee_id', true);
        $saveData['post'] = $this->input->post('post', true);
        $saveData['gender'] = $this->input->post('gender', true);
        $saveData['join_date'] = $this->input->post('join_date', true);


        $saveData['nationality'] = $this->input->post('nationality');
        $saveData['religion'] = $this->input->post('religion');

        $saveData['father_name'] = $this->input->post('father_name', true);
        $saveData['mother_name'] = $this->input->post('mother_name', true);
        $saveData['district'] = $this->input->post('district', true);
        $saveData['country'] = $this->input->post('country', true);
        $saveData['mobile_no'] = $this->input->post('mobile_no', true);
        $saveData['email'] = $this->input->post('email', true);
        $saveData['date_of_birth'] = $this->input->post('date_of_birth', true);
        $saveData['qualification'] = $this->input->post('qualification', true);
        $saveData['experience'] = $this->input->post('experience', true);
        $saveData['blood_group'] = $this->input->post('blood_group', true);
        $saveData['employee_type'] = $this->input->post('employee_type', true);
        $saveData['post_code'] = $this->input->post('post_code', true);
        $saveData['present_address'] = $this->input->post('present_address', true);
        $saveData['parmanent_address'] = $this->input->post('parmanent_address', true);



        $string = md5(date('Y-m-d-h-m-s'));
        $rand = substr($string, 0, 8);

        if (isset($_FILES['file']) && !empty($_FILES['file'])) {
            $dir = "public/uploads/employees/";
            $filename = $rand . $_FILES['file']['name'];
            $imgtmp = $_FILES['file']['tmp_name'];
            move_uploaded_file($imgtmp, $dir . $filename);
            $saveData['photo'] = $filename;
        }

        $this->Teacher_model->save($saveData, $id);
        if ($this->input->post('employee_type', true) == 'Employee') {
            redirect('teachers/employees');
        } else {

            redirect('teachers');
        }
    }

    public function edit($id) {
        $data['departments'] = $this->General_model->slect_any_table('departments');

        $where = array('e_id' => $id);
        $data['employee'] = $this->General_model->select_any_where('employees', $where);

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'teachers/addteachers';
        $data['title'] = 'Edit Teacher';
        $this->load->view('layout', $data);
    }

    public function view($id) {
        $where = array('e_id' => $id);
        $employeeInfo = $this->General_model->select_any_where('employees', $where);
        $data['employees'] = $employeeInfo;

        $where = array('department_id' => $employeeInfo['department_id']);
        $data['departments'] = $this->General_model->select_any_where('departments', $where);


        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'teachers/viewDetails';
        $data['title'] = 'Teacher Details';
        $this->load->view('layout', $data);
    }

}
