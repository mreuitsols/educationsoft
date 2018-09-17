<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sessions extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('Session_model');
        $this->load->model('General_model');
        $this->load->model('Setting_model');
    }

    public function index() {
        $this->sessions();
    }

    public function Sessions($id = -1, $action = '') {

        $exists = $this->Session_model->exists($id);
        $isPost = ($this->input->method() === 'post') ? TRUE : FALSE;

        if ($exists) {
            if ($isPost) {
                if ($action === 'edit') {
                    $this->save_session($id);
                    $this->sessionList();
                    return;
                }
            }

            if (!$isPost) {
                if ($action === 'delete') {
                    $this->deleteBranch($id);
                    $this->sessionList();
                    return;
                }

                if ($action === 'edit') {
                    $this->create($id);
                    return;
                } else {
                    redirect('sessions/sessions/' . $id . '/edit');
                }
            }
        }

        if (!$exists) {
            if ($isPost) {
                if ($action === 'add') {
                    $this->save_session($id);
                    $this->sessionList();

                    return;
                }
            }

            if (!$isPost) {
                if ($action === 'add') {
                    $this->create($id);
                    return;
                } else {
                    $this->sessionList();
                    return;
                }
            }
        }
    }

    public function create($session_id = NULL) {



        $where = array('session_id' => $session_id);
        $data['sessionEditData'] = $this->General_model->select_any_where('sessions', $where);

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['sessionData'] = $this->General_model->slect_any_table('sessions');
        $data['page'] = 'setting/session/sessions';
        $data['title'] = 'Session  Setup';
        $this->load->view('layout', $data);
    }

    public function save_session($id = NULL) { 

        $id = $this->input->post('session_id', true);
        $data['year'] = $this->input->post('session_name', true); 
        
        $this->Session_model->save($data, $id);

        redirect('sessions');
    }

    public function sessionList($session_id = NULL) {
        
        $where = array('session_id' => $session_id);
        $data['sessionEditData'] = $this->General_model->select_any_where('sessions', $where);
        
        $data['sessionData'] = $this->General_model->slect_any_table('sessions');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/session/sessions';
        $data['title'] = 'Session Setup';
        $this->load->view('layout', $data);
    }
 
    
      public function delete($id) {

         $this->General_model->delete('sessions', array('session_id' => $id));
            redirect('sessions'); 
    }
    

}
