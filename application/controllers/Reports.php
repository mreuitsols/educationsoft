<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Reports extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('General_model');
        $this->load->model('Setting_model');
        $this->load->model('Student_model');
        $this->load->model('Mark_model');
        $this->load->model('Report_model');
    }

    public function semester_transcript() {
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'transcript/semester_transcript';
        $data['title'] = 'transcript';
        $this->load->view('layout', $data);
    }

    public function ac_semester_ct() {
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'transcript/consolidated_transcript';
        $data['title'] = 'Consolidated transcript';
        $this->load->view('layout', $data);
    }

    public function semester_tc_view() {


        $student_id = $this->input->post('student_id');

        $where = array('student_id' => $student_id);

        $studentInfo = $this->General_model->select_any_where('students', $where);
        $data['students'] = $studentInfo;

        
        $setting_name = $this->Setting_model->select_setting('Institute', 'settings')['value'];

        $data['Institute'] = $setting_name;

        $logo = $this->Setting_model->select_setting('logo', 'settings')['value'];
        $data['logo'] = $logo;
 
 
        $where = array('program_id' => $studentInfo['program_id']);
        $data['programs'] = $this->General_model->select_any_where('programs', $where);

        $where = array('semester_id' => $studentInfo['semester_id']);
        $data['semesters'] = $this->General_model->select_any_where('semesters', $where);



        $where = array('program_id' => $studentInfo['program_id'], 'semester_id' => $studentInfo['semester_id'], 'session_id' => $studentInfo['session_id']);


        $courseList = $this->General_model->select_any_one_where('courses', $where);
        $data['courseList'] = $courseList;

        $where = array('student_id' => $studentInfo['s_id'], 'semester_id' => $studentInfo['semester_id'],'exam_type'=> 'Final Exam'/* $this->input->post('exam-type')*/);
        $courseMarkList = $this->General_model->select_any_one_where('course_marks', $where);

          
        
        if (!$courseMarkList) {
            $this->session->set_flashdata('d_error', 'Result not found!!.');
            redirect('reports/semester_transcript');
        }

        if (sizeof($courseList) != sizeof($courseMarkList)) {
            $sub = sizeof($courseList) - sizeof($courseMarkList);
            $this->session->set_flashdata('d_error', 'Result are not published yet.');
            redirect('reports/semester_transcript');
        }
        $data['courseMarkList'] = $courseMarkList;


        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'transcript/semester_transcript_view';
        $data['title'] = 'View Mark';
        $this->load->view('layout', $data);
    }

    public function consolidated_transcript() {
//        if (!empty($this->input->post('student_id'))) {

        $setting_name = $this->Setting_model->select_setting('Institute', 'settings')['value'];

        $data['Institute'] = $setting_name;

        $logo = $this->Setting_model->select_setting('logo', 'settings')['value'];
        $data['logo'] = $logo;



        $where = array('student_id' => $this->input->post('student_id'));

        $exam_type = $this->input->post('exam-type');
        $semester_id = $this->input->post('semester_id');

        $studentInfo = $this->General_model->select_any_where('students', $where);
        $data['students'] = $studentInfo;

        $where = array('program_id' => $studentInfo['program_id']);
        $data['programs'] = $this->General_model->select_any_where('programs', $where);

//            ALL MARKS            
//            ALL MARKS    
//            
//                            
//            FILTER SEMESTER ID
        $where = array('student_id' => $studentInfo['s_id']);
        $select_distinct = $this->General_model->select_distinct('course_marks', $where);
//            FILTER SEMESTER IDF
//            All Course LIST
        $courseList = array();
        $semesters = array();
        $courseMarkList = array();
        for ($i = 0; $i < sizeof($select_distinct); $i++) {
            $where = array('program_id' => $studentInfo['program_id'], 'semester_id' => $select_distinct[$i]->semester_id, 'session_id' => $studentInfo['session_id']);
            $courseList[] = $this->General_model->select_any_one_where('courses', $where);
            $where = array('semester_id' => $select_distinct[$i]->semester_id);
            $semesters[] = $this->General_model->select_any_where('semesters', $where);


            $where = array('student_id' => $studentInfo['s_id'], 'semester_id' => $select_distinct[$i]->semester_id);
            $courseMarkList[] = $this->General_model->select_any_one_where('course_marks', $where);
        }
        $data['semesters'] = $semesters;
        $data['courseList'] = $courseList;
//           END All Course LIST

        if (!$courseMarkList) {
            $this->session->set_flashdata('d_error', 'Result not found!!.');
//                redirect('marks/marksheet');
        }

        if (sizeof($courseList) != sizeof($courseMarkList)) {
            $sub = sizeof($courseList) - sizeof($courseMarkList);
            $this->session->set_flashdata('d_error', 'Result are not published yet.');
//                redirect('marks/marksheet');
        }
        $data['courseMarkList'] = $courseMarkList;


        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'transcript/consolidated_transcript_view';
        $data['title'] = 'View Mark';
        $this->load->view('layout', $data);
//        } else {
//            $this->session->set_flashdata('d_error', 'Somthing worng. ! Please try again..');
//            redirect('marks/marksheet');
//        }
    }

    public function official_transcript() {
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'transcript/official_transcript';
        $data['title'] = 'transcript';
        $this->load->view('layout', $data);
    }

    public function final_transcript() {
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'transcript/final_transcript';
        $data['title'] = 'transcript';
        $this->load->view('layout', $data);
    }

    public function student_financial_information() {
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'transcript/student_financial_information';
        $data['title'] = 'transcript';
        $this->load->view('layout', $data);
    }

    public function student_library_information() {
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'transcript/student_library_information';
        $data['title'] = 'transcript';
        $this->load->view('layout', $data);
    }

    public function semester_transcript_view() {
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'transcript/semester_transcript_view';
        $data['title'] = 'transcript';
        $this->load->view('layout', $data);
    }

}
