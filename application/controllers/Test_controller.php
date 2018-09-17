<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Test_controller
 *
 * @author Euitsols
 */ 
if (!defined('BASEPATH'))exit('No direct script access allowed');

    include_once(APPPATH . 'controllers/My_controller.php');
    
class Test_controller extends My_controller {
    public function index() {
        parent::index();
    }
}
