<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Course_curriculum extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('Branch_model');
        $this->load->model('General_model');
        $this->load->model('Setting_model');
        $this->load->model('Curriculum_model');
    }

    public function index() {
        $this->curriculum();
    }

    public function curriculum($id = -1, $action = '') {

        $existsData = $this->Curriculum_model->existsData($id);
        $isPost = ($this->input->method() === 'post') ? TRUE : FALSE;

        if ($existsData) {
            if ($isPost) {
                if ($action === 'edit') {
                    $this->save($id);
                    $this->curriculumList();
                    return;
                }
            }

            if (!$isPost) {
                if ($action === 'delete') {
                    $this->delete($id);
                    $this->curriculumList();
                    return;
                }

                if ($action === 'edit') {
                    $this->create($id);
                    return;
                } else {
                    redirect('course_curriculum/curriculum/' . $id . '/edit');
                }
            }
        }

        if (!$existsData) {
            if ($isPost) {
                if ($action === 'add') {
                    $this->save($id);
                    $this->curriculumList();

                    return;
                }
            }

            if (!$isPost) {
                if ($action === 'add') {
                    $this->create($id);
                    return;
                } else {
                    $this->curriculumList();
                    return;
                }
            }
        }
    }

    public function create($curriculum_id = NULL) {

        $where = array('status' => 'active');
        $data['faculty'] = $this->General_model->select_any_one_where('faculty', $where);
        $data['programs'] = $this->General_model->slect_any_table('programs');


        $where = array('curriculum_id' => $curriculum_id);
        $curriculumData = $this->General_model->select_any_where('curriculums', $where);
        $data['curriculumData'] = $curriculumData;

       
        $where = array('faculty_id' => $curriculumData['faculty_id']);
        $data['departments'] = $this->General_model->select_any_one_where('departments', $where);

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/curriculum/add_curriculum';
        $data['title'] = 'Add New Course CUrriculum';
        $this->load->view('layout', $data);
    }

    public function save($program_id = NULL) {

        $probidhan_id = $this->input->post('curriculum_id', true);

        $data['program_id'] = $this->input->post('program_id', true);
        $data['faculty_id'] = $this->input->post('faculty_id', true);
        $data['department_id'] = $this->input->post('department_id', true);
        $data['curriculum_name'] = $this->input->post('curriculum_name', true);
        $data['program_duration'] = $this->input->post('program_duration', true);
        $data['semester_duration'] = $this->input->post('semester_duration', true);
        $data['creadit'] = $this->input->post('creadit', true);

        $data['per_creadit_fee'] = $this->input->post('per_creadit_fee', true);
        $data['lab_fee'] = $this->input->post('lab_fee', true);
        $data['library_fee'] = $this->input->post('library_fee', true);
        $data['registration_fee'] = $this->input->post('registration_fee', true);
        $this->Curriculum_model->save($data, $program_id);

        redirect('Course_curriculum');
    }

    public function curriculumList() {


        $probidhan = $this->General_model->slect_any_table('curriculums');
        $data['probidhan'] = $probidhan;

        $department_id = array();
        $faculty_id = array();
        for ($i = 0; $i < sizeof($probidhan); $i++) {
            $department_id[] = $probidhan[$i]->program_id;
            $faculty_id[] = $probidhan[$i]->faculty_id;
        }

        $department_name = array();
        for ($i = 0; $i < sizeof($department_id); $i++) {
            $where = array('program_id' => $department_id[$i]);
            $_department_name = $this->General_model->select_any_where('programs', $where);
            $department_name[] = $_department_name['program_name'];
        }
        $data['department_name'] = $department_name;

        $faculty_name = array();
        for ($i = 0; $i < sizeof($faculty_id); $i++) {
            $where = array('faculty_id' => $faculty_id[$i]);
            $_faculty_name = $this->General_model->select_any_where('faculty', $where);
            $faculty_name[] = $_faculty_name['faculty_name'];
        }
        $data['department_name'] = $department_name;
        $data['faculty_name'] = $faculty_name;

 
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/curriculum/index';
        $data['title'] = 'Program List';
        $this->load->view('layout', $data);
    }

    public function delete($id) {
        
    }

    public function courselist() {
        
    }

}
