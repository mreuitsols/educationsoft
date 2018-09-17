<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Semesters extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('Semester_model');
        $this->load->model('General_model');
        $this->load->model('Setting_model');
    }

    public function index() {
        $this->semesters();
    }

    public function semesters($id = -1, $action = '') {

        $exists = $this->Semester_model->exists($id);
        $isPost = ($this->input->method() === 'post') ? TRUE : FALSE;

        if ($exists) {
            if ($isPost) {
                if ($action === 'edit') {
                    $this->save_semester($id);
                    $this->semesterList();
                    return;
                }
            }

            if (!$isPost) {
                if ($action === 'delete') {
                    echo 'sdf';
                    $this->delete($id);
                    redirect('semesters');
                    return;
                }

                if ($action === 'edit') {
                    $this->create($id);
                    return;
                } else {
                    redirect('semesters/semesters/' . $id . '/edit');
                }
            }
        }

        if (!$exists) {
            if ($isPost) {
                if ($action === 'add') {
                    $this->save_semester($id);
                    $this->semesterList();

                    return;
                }
            }

            if (!$isPost) {
                if ($action === 'add') {
                    $this->create($id);
                    return;
                } else {
                    $this->semesterList();
                    return;
                }
            }
        }
    }

    public function create($semester_id = NULL) {



        $where = array('semester_id' => $semester_id);
        $data['semesterEditData'] = $this->General_model->select_any_where('semesters', $where);

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['semesterData'] = $this->General_model->slect_any_table('semesters');
        $data['page'] = 'setting/semester/semesters';
        $data['title'] = 'Semester Setup';
        $this->load->view('layout', $data);
    }

    public function save_semester($id = NULL) {

        $id = $this->input->post('semester_id', true);
        $data['semester_name'] = $this->input->post('semester_name', true);

        $this->Semester_model->save($data, $id);

        redirect('semesters');
    }

    public function semesterList($semester_id = NULL) {

        $where = array('semester_id' => $semester_id);
        $data['semesterEditData'] = $this->General_model->select_any_where('semesters', $where);

        $data['semesterData'] = $this->General_model->slect_any_table('semesters');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/semester/semesters';
        $data['title'] = 'Semester Setup';
        $this->load->view('layout', $data);
    }

    public function delete($id) {

        if ($this->General_model->delete('semesters', array('semester_id' => $id)) == TRUE) {
            redirect('semesters');
        } else {
             $this->session->set_flashdata('error', 'Somethis is wrong!! It referance to another Table');
            redirect('semesters');
        }
    }

}
