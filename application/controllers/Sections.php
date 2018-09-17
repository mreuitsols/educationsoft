<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sections extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->section->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('Section_model');
        $this->load->model('General_model');
        $this->load->model('Setting_model');
    }

    public function index() {
        $this->sections();
    }

    public function Sections($id = -1, $action = '') {

        $exists = $this->Section_model->exists($id);
        $isPost = ($this->input->method() === 'post') ? TRUE : FALSE;

        if ($exists) {
            if ($isPost) {
                if ($action === 'edit') {
                    $this->save_section($id);
                    $this->sectionList();
                    return;
                }
            }

            if (!$isPost) {
                if ($action === 'delete') {
                    $this->deleteBranch($id);
                    $this->sectionList();
                    return;
                }

                if ($action === 'edit') {
                    $this->create($id);
                    return;
                } else {
                    redirect('sections/sections/' . $id . '/edit');
                }
            }
        }

        if (!$exists) {
            if ($isPost) {
                if ($action === 'add') {
                    $this->save_section($id);
                    $this->sectionList();

                    return;
                }
            }

            if (!$isPost) {
                if ($action === 'add') {
                    $this->create($id);
                    return;
                } else {
                    $this->sectionList();
                    return;
                }
            }
        }
    }

    public function create($section_id = NULL) {



        $where = array('section_id' => $section_id);
        $data['sectionEditData'] = $this->General_model->select_any_where('sections', $where);

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['sectionData'] = $this->General_model->slect_any_table('sections');
        $data['page'] = 'setting/section/sections';
        $data['title'] = 'Section  Setup';
        $this->load->view('layout', $data);
    }

    public function save_section($id = NULL) { 

        $id = $this->input->post('section_id', true);
        $data['section_name'] = $this->input->post('section_name', true); 
        
        $this->Section_model->save($data, $id);

        redirect('sections');
    }

    public function sectionList($section_id = NULL) {
        
        $where = array('section_id' => $section_id);
        $data['sectionEditData'] = $this->General_model->select_any_where('sections', $where);
        
        $data['sectionData'] = $this->General_model->slect_any_table('sections');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/section/sections';
        $data['title'] = 'Section Setup';
        $this->load->view('layout', $data);
    }
 

}
