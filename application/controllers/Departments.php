<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('Branch_model');
        $this->load->model('General_model');
        $this->load->model('Setting_model');
        $this->load->model('Department_model');
    }

    public function index() {
        $this->departments();
    }

    public function departments($id = -1, $action = '') {

        $existsFaculty = $this->Department_model->existsData($id);
        $isPost = ($this->input->method() === 'post') ? TRUE : FALSE;

        if ($existsFaculty) {
            if ($isPost) {
                if ($action === 'edit') {
                    $this->save_department($id);
                    $this->department_list();
                    return;
                }
            }

            if (!$isPost) {
                if ($action === 'delete') {
                    $this->delete($id);
                    $this->department_list();
                    return;
                }

                if ($action === 'edit') {
                    $this->create($id);
                    return;
                } else {
                    redirect('departments/departments/' . $id . '/edit');
                }
            }
        }

        if (!$existsFaculty) {
            if ($isPost) {
                if ($action === 'add') {
                    $this->save_department($id);
                    $this->department_list();

                    return;
                }
            }

            if (!$isPost) {
                if ($action === 'add') {
                    $this->create($id);
                    return;
                } else {
                    $this->department_list();
                    return;
                }
            }
        }
    }

    public function create($department_id = NULL) {

        $data['sidebar'] = 'sidebar/left-sidebar';
        $where = array('status' => 'active');
        $data['facultyData'] = $this->General_model->select_any_one_where('faculty', $where);

        $where = array('department_id' => $department_id);
        $data['edit_department'] = $this->General_model->select_any_where('departments', $where);


        $department = $this->General_model->slect_any_table('departments');
        $data['departments'] = $department;

        $faculty_id = array();
        for ($i = 0; $i < sizeof($department); $i++) {
            $faculty_id[] = $department[$i]->faculty_id;
        }

        $faculty_name = array();
        for ($i = 0; $i < sizeof($faculty_id); $i++) {
            $where = array('faculty_id' => $faculty_id[$i]);
            $_faculty = $this->General_model->select_any_where('faculty', $where);
            $faculty_name[] = $_faculty['faculty_name'];
        }

        $data['faculty_name'] = $faculty_name;


        $data['page'] = 'setting/department/index';
        $data['title'] = 'Add department';
        $this->load->view('layout', $data);
    }

    public function save_department($department_id = NULL) {

        $department_id = $this->input->post('department_id', true);
        if ($department_id == '') {
            $data['user_id'] = $_SESSION['user_id'];
        }
        $data['faculty_id'] = $this->input->post('faculty_id', true);
        $data['department_name'] = $this->input->post('department_name', true);
        $data['sort_name'] = $this->input->post('sort_name', true);
        $data['status'] = 'active';
        $this->Department_model->save($data, $department_id);

        redirect('departments');
    }

    public function department_list($department_id = NULL) {

        $where = array('status' => 'active');
        
        $data['facultyData'] = $this->General_model->select_any_one_where('faculty', $where);

        $where = array('department_id' => $department_id);
        $data['edit_department'] = $this->General_model->select_any_where('departments', $where);

        $department = $this->General_model->slect_any_table('departments');
        $data['departments'] = $department;

        $faculty_id = array();
        for ($i = 0; $i < sizeof($department); $i++) {
            $faculty_id[] = $department[$i]->faculty_id;
        }

        $faculty_name = array();
        for ($i = 0; $i < sizeof($faculty_id); $i++) {
            $where = array('faculty_id' => $faculty_id[$i]);
            $_faculty = $this->General_model->select_any_where('faculty', $where);
            $faculty_name[] = $_faculty['faculty_name'];
        }

        $data['faculty_name'] = $faculty_name;
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/department/index';

        $data['title'] = 'Department Page';
        $this->load->view('layout', $data);
    }

    public function status($department_id) {

        $where = array('department_id' => $department_id);
        $queryData = $this->General_model->select_any_where('departments', $where);
        if ($queryData['status'] == 'active') {
            $data['status'] = 'de-active';
            $this->General_model->update('departments', $where, $data);
        } else {
            $data['status'] = 'active';
            $this->General_model->update('departments', $where, $data);
        }
        redirect('departments');
    }

    public function delete($id) {
        
    }

}
