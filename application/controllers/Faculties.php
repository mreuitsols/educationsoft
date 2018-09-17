<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faculties extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('Branch_model');
        $this->load->model('General_model');
        $this->load->model('Setting_model');
        $this->load->model('Faculty_model');
    }

    public function index() {
        $this->faculties();
    }

    public function faculties($id = -1, $action = '') {

        $existsFaculty = $this->Faculty_model->existsFaculty($id);
        $isPost = ($this->input->method() === 'post') ? TRUE : FALSE;

        if ($existsFaculty) {
            if ($isPost) {
                if ($action === 'edit') {
                    $this->save_faculty($id);
                    $this->facultyList();
                    return;
                }
            }

            if (!$isPost) {
                if ($action === 'delete') {
                    $this->deleteFaculty($id);
                    $this->facultyList();
                    return;
                }

                if ($action === 'edit') {
                    $this->create($id);
                    return;
                } else {
                    redirect('faculties/faculties/' . $id . '/edit');
                }
            }
        }

        if (!$existsFaculty) {
            if ($isPost) {
                if ($action === 'add') {
                    $this->save_faculty($id);
                    $this->facultyList();

                    return;
                }
            }

            if (!$isPost) {
                if ($action === 'add') {
                    $this->create($id);
                    return;
                } else {
                    $this->facultyList();
                    return;
                }
            }
        }
    }

    public function create($branch_id = NULL) {



        $where = array('faculty_id' => $branch_id);
        $data['facultyEditData'] = $this->General_model->select_any_where('faculty', $where);

        $data['branch_list'] = $this->General_model->slect_any_table('branchs');

        $data['sidebar'] = 'sidebar/left-sidebar';

        $facalties = $this->General_model->slect_any_table('faculty');


        $data['facultyData'] = $facalties;

        $branch_id = array();
        for ($i = 0; $i < sizeof($facalties); $i++) {
            $branch_id[] = $facalties[$i]->branch_id;
        }
        $branch_name = array();
        for ($i = 0; $i < sizeof($branch_id); $i++) {
            $where = array('branch_id' => $branch_id[$i]);
            $_branch_name = $this->General_model->select_any_where('branchs', $where);
            $branch_name[] = $_branch_name['branch_name'];
        }

        $data['branch_name'] = $branch_name;

        $data['page'] = 'setting/faculty/faculty';
        $data['title'] = 'Student Info Page';
        $this->load->view('layout', $data);
    }

    public function save_faculty($faculty_id = NULL) {
        $faculty_id = $this->input->post('faculty_id', true);
//        if (!empty($this->input->post('branch_id', true)) && !empty($this->input->post('faculty_name', true))) {
        $data['branch_id'] = $this->input->post('branch_id', true);
        $data['faculty_name'] = $this->input->post('faculty_name', true);
        $this->Faculty_model->saveFaculty($data, $faculty_id);

        redirect('faculties');
//        } else {
//            $this->session->set_flashdata('error', 'Something error! please try again');
//            redirect('faculties');
//        }
    }

    public function facultyList($faculty_id = NULL) {



        $where = array('faculty_id' => $faculty_id);
        $data['facultyEditData'] = $this->General_model->select_any_where('faculty', $where);


        $data['branch_list'] = $this->General_model->slect_any_table('branchs');

        $facalties = $this->General_model->slect_any_table('faculty');


        $data['facultyData'] = $facalties;

        $branch_id = array();
        for ($i = 0; $i < sizeof($facalties); $i++) {
            $branch_id[] = $facalties[$i]->branch_id;
        }
        $branch_name = array();
        for ($i = 0; $i < sizeof($branch_id); $i++) {
            $where = array('branch_id' => $branch_id[$i]);
            $_branch_name = $this->General_model->select_any_where('branchs', $where);
            $branch_name[] = $_branch_name['branch_name'];
        }

        $data['branch_name'] = $branch_name;

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/faculty/faculty';
        $data['title'] = 'Faculty Page';
        $this->load->view('layout', $data);
    }

    public function status($faculty_id) {

        $where = array('faculty_id' => $faculty_id);
        $queryData = $this->General_model->select_any_where('faculty', $where);
        if ($queryData['status'] == 'active') {
            $data['status'] = 'de-active';
            $this->General_model->update('faculty', $where, $data);
        } else {
            $data['status'] = 'active';
            $this->General_model->update('faculty', $where, $data);
        }
        redirect('faculties');
    }

    public function delete($id) {

        $this->General_model->delete('faculty', array('faculty_id' => $id));
        redirect('faculties');
    }

}
