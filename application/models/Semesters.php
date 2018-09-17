<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Semesters extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('Branch_model');
        $this->load->model('General_model');
        $this->load->model('Setting_model');
    }

    public function index() {
        $this->branchs();
    }

    public function semesters($id = -1, $action = '') {

        $existsBranch = $this->Branch_model->existsBranch($id);
        $isPost = ($this->input->method() === 'post') ? TRUE : FALSE;

        if ($existsBranch) {
            if ($isPost) {
                if ($action === 'edit') {
                    $this->save_branch($id);
                    $this->branchList();
                    return;
                }
            }

            if (!$isPost) {
                if ($action === 'delete') {
                    $this->deleteBranch($id);
                    $this->branchList();
                    return;
                }

                if ($action === 'edit') {
                    $this->create($id);
                    return;
                } else {
                    redirect('branchs/branchs/' . $id . '/edit');
                }
            }
        }

        if (!$existsBranch) {
            if ($isPost) {
                if ($action === 'add') {
                    $this->save_branch($id);
                    $this->branchList();

                    return;
                }
            }

            if (!$isPost) {
                if ($action === 'add') {
                    $this->create($id);
                    return;
                } else {
                    $this->branchList();
                    return;
                }
            }
        }
    }

    public function create($branch_id = NULL) {



        $where = array('branch_id' => $branch_id);
        $data['branchEditData'] = $this->General_model->select_any_where('branchs', $where);

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['branchData'] = $this->General_model->slect_any_table('branchs');
        $data['page'] = 'setting/branch/branchs';
        $data['title'] = 'Branch Setup';
        $this->load->view('layout', $data);
    }

    public function save_branch($id = NULL) {
        $data['setting_id'] = $this->Setting_model->select_setting('Institute', 'settings')['id'];

        $id = $this->input->post('branch_id', true);
        $data['branch_name'] = $this->input->post('branch_name', true);
        $data['address'] = $this->input->post('address', true);
        $data['phone_no'] = $this->input->post('phone_no', true);
        $this->Branch_model->saveBranch($data, $id);

        redirect('branchs');
    }

    public function branchList($branch_id = NULL) {
        
        $where = array('branch_id' => $branch_id);
        $data['branchEditData'] = $this->General_model->select_any_where('branchs', $where);
        
        $data['branchData'] = $this->General_model->slect_any_table('branchs');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/branch/branchs';
        $data['title'] = 'Branch Setup';
        $this->load->view('layout', $data);
    }

    public function deleteBranch($id) {
        
    }

    public function faculty() {
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/faculty';
        $data['title'] = 'Branch Setup';
        $this->load->view('layout', $data);
    }

    public function semester() {
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/semester';
        $data['title'] = 'Branch Setup';
        $this->load->view('layout', $data);
    }

    public function sessions() {
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/sessions';
        $data['title'] = 'Branch Setup';
        $this->load->view('layout', $data);
    }

}
