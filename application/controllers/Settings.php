<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('Setting_model');
    }

    public function index() {

        $data = array();

        $setting_name = $this->Setting_model->select_setting('Institute', 'settings')['value'];
        
        $data['Institute'] = $setting_name;

        $institue_email = $this->Setting_model->select_setting('institue_email', 'settings')['value'];
        $data['institue_email'] = $institue_email;

        $address = $this->Setting_model->select_setting('address', 'settings')['value'];
        $data['address'] = $address;

        $history = $this->Setting_model->select_setting('history', 'settings')['value'];
        $data['history'] = $history;

        $logo = $this->Setting_model->select_setting('logo', 'settings')['value'];
        $data['logo'] = $logo;

        $copyright = $this->Setting_model->select_setting('copyright', 'settings')['value'];
        $data['copyright'] = $copyright;


        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/institute';
        $data['title'] = 'Student Info Page';
        $this->load->view('layout', $data);
    }

    public function edit_settings() {

        // Save  or Update

        $data = $this->input->post('Institute', true);
        $userID = $_SESSION['user_id'];
        $this->Setting_model->saveSettings('Institute', 'settings', $data, $userID);

        $data = $this->input->post('address', true);
        $this->Setting_model->saveSettings('address', 'settings', $data, $userID);
        $data = $this->input->post('history', true);
        $this->Setting_model->saveSettings('history', 'settings', $data, $userID);

        $data = $this->input->post('copyright', true);
        $this->Setting_model->saveSettings('copyright', 'settings', $data, $userID);

        $data = $this->input->post('institue_email', true);
        $this->Setting_model->saveSettings('institue_email', 'settings', $data, $userID);

        $rand = date('Y-m-d_h-m-s');

        if ($_FILES['file']['name']) {
            $logo = $this->Setting_model->select_setting('logo', 'settings');

            $location = "public/uploads/images/";
            unlink($location . $logo);

            $logo = $rand . $_FILES['file']['name'];
            $imgtmp = $_FILES['file']['tmp_name'];
            move_uploaded_file($imgtmp, $location . $logo);
            $logo = $this->Setting_model->saveSettings('logo', 'settings', $logo, $userID);
        }
        redirect('Settings');
    }

    public function branch() {
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/branch';
        $data['title'] = 'Student Info Page';
        $this->load->view('layout', $data);
    }

    public function faculty() {
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/faculty';
        $data['title'] = 'Student Info Page';
        $this->load->view('layout', $data);
    }

    public function semester() {
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/semester';
        $data['title'] = 'Student Info Page';
        $this->load->view('layout', $data);
    }

    public function sessions() {
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'setting/sessions';
        $data['title'] = 'Student Info Page';
        $this->load->view('layout', $data);
    }

}
