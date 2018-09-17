<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
//            return redirect('login');
        }
 
    }

    
    public function index(){
        echo 'Portfolio ok';
    }
    
    
    public function about(){
        $data['title'] = 'This is about page';
        $this->load->view('aboutpage',$data);   
    }
    public function contact(){
        echo 'This is Contact Page';
    }

    public function logout() {
        session_destroy();
        redirect('login');
    }

}
