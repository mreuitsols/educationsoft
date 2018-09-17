<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Routines extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('General_model');
        $this->load->model('Student_model');
        $this->load->model('Routine_model');
    }

    public function index() {
        $this->create();
    }

    public function create() {
        $data['sessions'] = $this->General_model->slect_any_table('sessions');
        $data['semesters'] = $this->General_model->slect_any_table('semesters');
        $data['sections'] = $this->General_model->slect_any_table('sections');

        $data['programs'] = $this->General_model->slect_any_table('programs');



        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'routine/create';
        $data['title'] = 'Insert Routine';
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

    public function save($id = NULL) {

        $routineTable['program_id'] = $this->input->post('program_id', TRUE);
        $routineTable['semester_id'] = $this->input->post('semester_id', TRUE);
        $routineTable['session_id'] = $this->input->post('session_id', TRUE);
        $routineTable['shift'] = $this->input->post('shift', TRUE);

        $routine_id = $this->Routine_model->save('routins', $routineTable);
        $classes_ids = array();
        for ($i = 0; $i < 6; ++$i) { // 
            $classes['user_id'] = $_SESSION['user_id'];
            $classes_id = $this->Routine_model->save('classes', $classes);
            array_push($classes_ids, $classes_id);

            for ($j = 0; $j < sizeof($this->input->post('coursees', true)); ++$j) {
                $coursees['course_id'] = $this->input->post('coursees', true)[$j];
                $coursees['class_id'] = $classes_id;
                $this->Routine_model->save('class_courses', $coursees);
            }
            for ($j = 0; $j < sizeof($this->input->post('sections', true)); ++$j) {
                $sections['section'] = $this->input->post('sections', true)[$j];
                $sections['class_id'] = $classes_id;
                $this->Routine_model->save('class_sections', $sections);
            }
            for ($j = 0; $j < sizeof($this->input->post('teachers', true)); ++$j) {
                $teachers['teacher_id'] = $this->input->post('teachers', true)[$j];
                $teachers['class_id'] = $classes_id;
                $this->Routine_model->save('class_teachers', $teachers);
            }
        }

        $schedules['period'] = $this->input->post('period', TRUE);
        $schedules['routine_id '] = $routine_id;
        $schedules['sat'] = $classes_ids[0];
        $schedules['sun'] = $classes_ids[1];
        $schedules['mon'] = $classes_ids[2];
        $schedules['tue'] = $classes_ids[3];
        $schedules['wed'] = $classes_ids[4];
        $schedules['thu'] = $classes_ids[5];
        $schedules['user_id'] = $_SESSION['user_id'];

        $routine_id = $this->Routine_model->save('schedules', $schedules);

        echo 'Success';
    }

    public function search() {
        $data['sessions'] = $this->General_model->slect_any_table('sessions');
        $data['semesters'] = $this->General_model->slect_any_table('semesters');
        $data['sections'] = $this->General_model->slect_any_table('sections');

        $data['programs'] = $this->General_model->slect_any_table('programs');



        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'routine/search';
        $data['title'] = 'Insert Routine';
        $this->load->view('layout', $data);
    }

    public function view() {


        $program_id = $this->input->post('program_id');
        $semester_id = $this->input->post('semester_id');
        $session_id = $this->input->post('session_id');
        $shift = $this->input->post('shift');


//        SELECT COURSE

        $where = array('program_id' => $program_id, 'semester_id' => $semester_id, 'session_id' => $session_id);

        $data['courses'] = $this->General_model->select_any_one_where('courses', $where);

        $where = array('program_id' => $program_id);
        $data['programs'] = $this->General_model->select_any_one_where('programs', $where);

        $where = array('program_id' => $program_id, 'semester_id' => $semester_id, 'session_id' => $session_id, 'shift' => $shift);
        $routins = $this->General_model->select_any_one_where('routins', $where);

        $data['routins'] = $routins;
        $routin_ids = array();
        for ($i = 0; $i < sizeof($routins); $i++) {
            $routin_ids[] = $routins[$i]->id;
        }

        $where = $routin_ids;
        if (sizeof($routin_ids) > 1) {
            $data['schedules'] = $this->General_model->select_any_where_in('schedules', $where);
//            var_dump($markdistributions_result);
        } else {
            $where = array('routine_id' => $where[0]);

            $data['schedule'] = $this->General_model->select_any_one_where('schedules', $where);
        }


        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'routine/view-routine';
        $data['title'] = 'View Routine';
        $this->load->view('layout', $data);
    }

}
?>