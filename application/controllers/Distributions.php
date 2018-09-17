<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Distributions extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('General_model');
        $this->load->model('Student_model');
        $this->load->model('Distributions_model');
    }

    public function index() {
        $this->view();
    }

    public function create() {
        $data['session'] = $this->General_model->slect_any_table('sessions');
        $data['semesters'] = $this->General_model->slect_any_table('semesters');
        $data['sections'] = $this->General_model->slect_any_table('sections');
        $data['programs'] = $this->General_model->slect_any_table('programs');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'distribution/add_distribution';
        $data['title'] = 'mark distribution';
        $this->load->view('layout', $data);
    }

//    function addMarksDist($thecont, $thefinal, $pmarkcont, $pmarkfinal) {
//        $mid = $this->addMarks($thecont, $thefinal, $pmarkcont, $pmarkfinal);
//
//        $this->dbconnect();
//        $insert = "INSERT INTO `markdistributions` VALUES (NULL,$mid)";
//        mysql_query($insert) or mysql_error();
//        return mysql_insert_id();
//    }

    public function save() {


        $program_id = $this->input->post('program_id');
        $semester_id = $this->input->post('semester_id'); 
        $session_id = $this->input->post('session_id');
        $course_name = $this->input->post('course_name');




        $theory_mark['user_id'] = $_SESSION['user_id'];
        $theory_mark['cont_asses'] = $this->input->post('theocont');
        $theory_mark['final_exam'] = $this->input->post('theofinal');

        $practical_mark['user_id'] = $_SESSION['user_id'];
        $practical_mark['cont_asses'] = $this->input->post('pmarkcont');
        $practical_mark['final_exam'] = $this->input->post('pmarkfinal');




        $where = array('program_id' => $program_id, 'semester_id' => $semester_id, 'session_id' => $session_id, 'course_name' => $course_name);

        $exitCourse = $this->General_model->select_any_where('courses', $where);

        if ($exitCourse) {
            $this->session->set_flashdata('error', 'Course is Already existis!!');
            redirect('distributions/create');
            return 0;
        }

        $teory_id = $this->Distributions_model->add_dist_mark('theories', $theory_mark);

        $practical_id = $this->Distributions_model->add_dist_mark('practicals', $practical_mark);

        $marksData['theory_id'] = $teory_id;
        $marksData['practical_id'] = $practical_id;
        $marksData['user_id'] = $_SESSION['user_id'];

        $marks_id = $this->Distributions_model->add_dist_mark('marks', $marksData);

        $markdistributions['mark_id'] = $marks_id;
        $markdistributions['user_id'] = $_SESSION['user_id'];

        $markdistributions_id = $this->Distributions_model->add_dist_mark('markdistributions', $markdistributions);


        $courseData['program_id'] = $this->input->post('program_id');
        $courseData['semester_id'] = $this->input->post('semester_id'); 
        $courseData['session_id'] = $this->input->post('session_id');

        $courseData['course_name'] = $this->input->post('course_name');

        $courseData['course_code'] = $this->input->post('course_code');
        $courseData['course_credit'] = $this->input->post('course_credit');
        $courseData['mark_distribution_id'] = $markdistributions_id;
        $courseData['user_id'] = $_SESSION['user_id'];

        $insertCourse = $this->Distributions_model->add_dist_mark('courses', $courseData);

        if ($insertCourse) {
            $this->session->set_flashdata('success', 'Account Create Succcess');
            redirect('distributions/create');
        } else {
            $this->session->set_flashdata('error', 'Somthing worng. Error!!');
            redirect('distributions/create');
        }
    }

//    VIEW DISTRIBUTIONS

    public function view() {
        $data['session'] = $this->General_model->slect_any_table('sessions');
        $data['semesters'] = $this->General_model->slect_any_table('semesters'); 
        $data['programs'] = $this->General_model->slect_any_table('programs');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'distribution/search-distribution';
        $data['title'] = 'mark distribution';
        $this->load->view('layout', $data);
    }

    public function select_distribution() {

        $program_id = $this->input->post('program_id');
        $semester_id = $this->input->post('semester_id'); 
        $session_id = $this->input->post('session_id');
        $course_name = $this->input->post('course_name');


//        SELECT COURSE

        $where = array('program_id' => $program_id, 'semester_id' => $semester_id, 'session_id' => $session_id);

        $result = $this->General_model->select_any_one_where('courses', $where);
        $data['course_data'] = $result;
        if (!$result) {
            $this->session->set_flashdata('d_error', 'Sorry Data Not Found!!');
            redirect('distributions');
            return 0;
        }
        

//        FILTER MARK DISTRIBUTIONS ID
        $mark_distribution_id = array();
        for ($i = 0; $i < sizeof($result); $i++) {
            $mark_distribution_id[] = $result[$i]->mark_distribution_id;
        }
 
        $where = $mark_distribution_id; 
        if (sizeof($mark_distribution_id) > 1) {
            $markdistributions_result = $this->General_model->select_any_where_in('markdistributions', $where);
//            var_dump($markdistributions_result);
        } else {
            $where = array('id' => $where[0]);

            $markdistributions_result = $this->General_model->select_any_one_where('markdistributions', $where);
        }

//        for($i = 0; $i < sizeof($mark_distribution_id); ++$i){
//            
//        }
//FILTER MARK ID
        $mark_id = array();
        for ($i = 0; $i < sizeof($markdistributions_result); $i++) {
            $mark_id[] = $markdistributions_result[$i]->mark_id;
        }

//        SELECT MARK TABLE
        $where =  $mark_id;
        if (sizeof($mark_id) > 1) {
            $marks_result = $this->General_model->select_any_where_in('marks', $where);
        } else {
            $where = array('id' => $where[0]);
            $marks_result = $this->General_model->select_any_one_where('marks', $where);
        }




//        GET THEORY AND PRACTICAL ID
        $theory_ids = array();
        $practical_ids = array();

        for ($i = 0; $i < sizeof($marks_result); $i++) {
            $theory_ids[] = $marks_result[$i]->theory_id;
            $practical_ids[] = $marks_result[$i]->practical_id;
        }



//        SELECDT THEORY AND PRACTICAL TABLE
        $where = $theory_ids;
        if (sizeof($theory_ids) > 0) { 
            $theories_result = $this->General_model->select_any_where_in('theories', $where);
        } else {
            $where = array('id' => $where[0]);
            $theories_result = $this->General_model->select_any_one_where('theories', $where);
        }
        $data['theories_result'] = $theories_result;



        $where =$practical_ids;

        if (sizeof($practical_ids) > 0) {
           
            $practicals_result = $this->General_model->select_any_where_in('practicals', $where);
        } else {
            $where = array('id' => $where[0]);
            $practicals_result = $this->General_model->select_any_one_where('practicals', $where);
        }
        $data['practicals_result'] = $practicals_result;
 





        $where = array('program_id' => $program_id);
        $data['programs'] = $this->General_model->select_any_where('programs', $where);

        $where = array('session_id' => $session_id);
        $data['sessions'] = $this->General_model->select_any_where('sessions', $where);

        $where = array('semester_id' => $semester_id);
        $data['semesters'] = $this->General_model->select_any_where('semesters', $where);

 


        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'distribution/view-distribution';
        $data['title'] = 'mark distribution';
        $this->load->view('layout', $data);
    }

}
