<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

   
    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $isLogInOut = ($this->uri->segment(2) == 'login' || $this->uri->segment(2) == 'logout') ? TRUE : FALSE;
        $isAdminSet = isset($_SESSION['user_id']);
        if ($isAdminSet) {
            $isAdminSet = $_SESSION['user_id'];
            $email = $_SESSION['email'];
            $user_status = $_SESSION['status'];


            if ($isAdminSet) {
                if ($user_status == 'active') {
                    redirect('welcome');
                } else {
                    redirect('not_active');
                }
            }
        } else if (!$isAdminSet && !$isLogInOut) {
            $data['title'] = 'Login';
            $this->load->view('login',$data);
//            redirect('login');
        }
    }

    public function index() {


        $this->load->model('Login_model');

         $username = $this->input->post('username');
         $password = md5($this->input->post('password'));


        if (isset($_SESSION['user_id'])) {
            redirect('welcome');
        } else {
            if (!empty($username) && !empty($password)) { 

                $result = $this->Login_model->checkLogin($username, $password);

                if ($result === NULL) {
                    $this->session->set_flashdata('err', 'Wrong username or password.');
                    redirect('login'); 
                } else {

                    $this->load->library('session');

                    $_SESSION['user_id'] = $result['user_id'];
                    $_SESSION['email'] = $result['email'];

                    $_SESSION['role'] = $result['role'];
                    $_SESSION['status'] = $result['status'];

                    redirect('welcome');
                }
            } else {
//                $this->session->set_flashdata('err', 'Wrong username or password.');
//                $this->load->view('admin/login');
            }
        }
    }

//    public function login() {
//        $this->load->view('login');
//    }

    public function logout() {
        session_destroy();
        redirect('login');
    }

}
