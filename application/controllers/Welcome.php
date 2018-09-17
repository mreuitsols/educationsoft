<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('General_model');
        $this->load->model('Student_model');
        $this->load->model('User_model');
    }

    public function index() {


        $where = array('user_id' => $_SESSION['user_id']);
        $data['user_data'] = $this->General_model->select_any_where('users', $where);

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'welcome_message';
        $data['title'] = 'Welcome Page';
        $this->load->view('layout', $data);
    }

}
