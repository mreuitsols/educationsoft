<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Programs extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('Branch_model');
        $this->load->model('General_model');
        $this->load->model('Setting_model');
        $this->load->model('Program_model');
    }

    public function index() {
        $this->programs();
    }

    public function programs($id = -1, $action = '') {

        $existsData = $this->Program_model->existsData($id);
        $isPost = ($this->input->method() === 'post') ? TRUE : FALSE;

        if ($existsData) {
            if ($isPost) {
                if ($action === 'edit') {
                    $this->save($id);
                    $this->programsList();
                    return;
                }
            }

            if (!$isPost) {
                if ($action === 'delete') {
                    $this->delete($id);
                    $this->programsList();
                    return;
                }

                if ($action === 'edit') {
                    $this->create($id);
                    return;
                } else {
                    redirect('programs/programs/' . $id . '/edit');
                }
            }
        }

        if (!$existsData) {
            if ($isPost) {
                if ($action === 'add') {
                    $this->save($id);
                    $this->programsList();

                    return;
                }
            }

            if (!$isPost) {
                if ($action === 'add') {
                    $this->create($id);
                    return;
                } else {
                    $this->programsList();
                    return;
                }
            }
        }
    }

    public function create($program_id = NULL) {


        $where = array('status' => 'active');
        $data['faculty'] = $this->General_model->select_any_one_where('faculty', $where);

        $data['departments'] = $this->General_model->slect_any_table('departments');


        $where = array('program_id' => $program_id);
        $data['programData'] = $this->General_model->select_any_where('programs', $where);

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/program/add_program';
        $data['title'] = 'Add New Program';
        $this->load->view('layout', $data);
    }

    public function save($program_id = NULL) {

        $program_id = $this->input->post('program_id', true);

        $data['faculty_id'] = $this->input->post('faculty_id', true);
        $data['department_id'] = $this->input->post('department_id', true);
        $data['program_name'] = $this->input->post('progran_name', true);
        $data['status'] = 'active';
        $this->Program_model->save($data, $program_id);

        redirect('programs');
    }

    public function programsList($faculty_id = NULL) {

        $where = array('faculty_id' => $faculty_id);
        $data['facultyEditData'] = $this->General_model->select_any_where('faculty', $where);

        $data['branch_list'] = $this->General_model->slect_any_table('branchs');

        $programs = $this->General_model->slect_any_table('programs');
        $data['programs'] = $programs;

        $department_id = array();
        $faculty_ids = array();
        for ($i = 0; $i < sizeof($programs); $i++) {
            $department_id[] = $programs[$i]->department_id;
            $faculty_ids[] = $programs[$i]->faculty_id;
        }

        $department_name = array();
        for ($i = 0; $i < sizeof($department_id); $i++) {
            $where = array('department_id' => $department_id[$i]);
            $_department_name = $this->General_model->select_any_where('departments', $where);
            $department_name[] = $_department_name['department_name'];
        }
        $data['department_name'] = $department_name;

        $faculty_name = array();
        for ($i = 0; $i < sizeof($faculty_ids); $i++) {
            $where = array('faculty_id' => $faculty_ids[$i]);
            $_faculty_name = $this->General_model->select_any_where('faculty', $where);
            $faculty_name[] = $_faculty_name['faculty_name'];
        }
        $data['department_name'] = $department_name;
        $data['faculty_name'] = $faculty_name;

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/program/index';
        $data['title'] = 'Program List';
        $this->load->view('layout', $data);
    }

    public function status($program_id) {

        $where = array('program_id' => $program_id);
        $queryData = $this->General_model->select_any_where('programs', $where);
        if ($queryData['status'] == 'active') {
            $data['status'] = 'de-active';
            $this->General_model->update('programs', $where, $data);
        } else {
            $data['status'] = 'active';
            $this->General_model->update('programs', $where, $data);
        }
        redirect('programs');
    }

    public function delete($id) {
        
    }

}
