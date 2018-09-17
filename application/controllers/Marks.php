<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Marks extends CI_Controller {

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
        $data['page'] = 'mark/select-program';
        $data['title'] = 'Insert Marks';
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

   
    public function insertMark() {


        $coursee_id = $this->input->post('course_id', TRUE);
        $exam_type = $this->input->post('exam_type');
        $semester_id = $this->input->post('semester_id');

        $sid = $this->input->post('sid', TRUE);
        $theory = $this->input->post('theory', TRUE);
        $practical = $this->input->post('practical', TRUE);



        for ($i = 0, $total = sizeof($sid); $i < $total; ++$i) {
            $where = array('student_id' => $sid[$i], 'semester_id' => $semester_id, 'exam_type' => $exam_type, 'course_id' => $coursee_id);

            $this->General_model->delete('course_marks', $where);
        }

        for ($i = 0, $total = sizeof($sid); $i < $total; ++$i) {

            $course_marks['student_id'] = $sid[$i];
            $course_marks['course_id'] = $coursee_id;
            $course_marks['exam_type'] = $exam_type;
            $course_marks['semester_id'] = $semester_id;
            $course_marks['user_id'] = $_SESSION['user_id'];


            $course_marks['theory'] = $theory[$i];
            $course_marks['practical'] = $practical[$i];


            $this->Mark_model->save('course_marks', $course_marks);
        }



        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'mark/student-list';
        $data['title'] = 'Student List Page';

        $insertQuery = $this->load->view('layout', $data);

        if ($insertQuery) {
            $this->session->set_flashdata('success', 'Mark Insert Successfull');
            redirect('marks');
        } else {
            $this->session->set_flashdata('error', 'Somthing worng. ');
            redirect('marks');
        }
    }

    public function marksheet() {

        $data['semesters'] = $this->General_model->slect_any_table('semesters');
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'mark/search-result';
        $data['title'] = 'View Routine';
        $this->load->view('layout', $data);
    }

    public function viewtranscript() {


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

            $where = array('semester_id' => $semester_id);
            $data['semesters'] = $this->General_model->select_any_where('semesters', $where);



            $where = array('program_id' => $studentInfo['program_id'], 'semester_id' => $this->input->post('semester_id'), 'session_id' => $studentInfo['session_id']);


            $courseList = $this->General_model->select_any_one_where('courses', $where);
            $data['courseList'] = $courseList;

            $where = array('student_id' => $studentInfo['s_id'], 'semester_id' => $this->input->post('semester_id'), 'exam_type' => $exam_type);
            $courseMarkList = $this->General_model->select_any_one_where('course_marks', $where);

            if (!$courseMarkList) {
                $this->session->set_flashdata('d_error', 'Result not found!!.');
                redirect('marks/marksheet');
            }

            if (sizeof($courseList) != sizeof($courseMarkList)) {
                $sub = sizeof($courseList) - sizeof($courseMarkList);
                $this->session->set_flashdata('d_error', 'Result are not published yet.');
                redirect('marks/marksheet');
            }
            $data['courseMarkList'] = $courseMarkList;


            $data['sidebar'] = 'sidebar/left-sidebar';
            $data['page'] = 'mark/view-marks';
            $data['title'] = 'View Mark';
            $this->load->view('layout', $data);
//        } else {
//            $this->session->set_flashdata('d_error', 'Somthing worng. ! Please try again..');
//            redirect('marks/marksheet');
//        }
    }

    public function searchresult() {
        $data['session'] = $this->General_model->slect_any_table('sessions');
        $data['semesters'] = $this->General_model->slect_any_table('semesters');
        $data['programs'] = $this->General_model->slect_any_table('programs');

        if ($_SESSION['role'] == "student" || $_SESSION ['role'] == "teacher") {
            redirect('/');
        }

        $where = array('program_id' => $this->input->post('program_id'), 'section_id' => $this->input->post('section_id'), 'semester_id' => $this->input->post('semester_id'), 'session_id' => $this->input->post('session_id'));


        $studentData = $this->General_model->select_any_one_where('students', $where);
        if (!$studentData) {
            $this->session->set_flashdata('error', 'Not Found ! Please Try again!');
//            redirect('students');
        }
        $data['students'] = $studentData;
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'mark/allStudentMarks';
        $data['title'] = 'Student List Page';

        $this->load->view('layout', $data);
    }

    public function allresult() {
        if ($_SESSION['role'] == "student" || $_SESSION ['role'] == "teacher") {
            redirect('/');
        }

        $exam_type = $this->input->post('exam-type');

        $where = array('program_id' => $this->input->post('program_id'), 'semester_id' => $this->input->post('semester_id'), 'session_id' => $this->input->post('session_id'));


        $studentData = $this->General_model->select_any_one_where('students', $where);
        if (!$studentData) {
            $this->session->set_flashdata('error', 'Not Found ! Please Try again!');
//            redirect('students');
        }


        $courseMarkList = [];
        for ($i = 0, $total = sizeof($studentData); $i < $total; ++$i) {

            $where = array('student_id' => $studentData[$i]->s_id, 'semester_id' => $this->input->post('semester_id'), 'exam_type' => $exam_type);
            $courseMarkList[] = $this->General_model->select_any_one_where('course_marks', $where);
        }

//        var_dump($courseMarkList);
        $result = array();
        $sum = 0;
        for ($i = 0, $total = sizeof($courseMarkList); $i < $total; ++$i) {

            for ($j = 0; $j < sizeof($courseMarkList[$i]); $j++) {
                $sum = $sum + ($courseMarkList[$i][$j]->theory + $courseMarkList[$i][$j]->practical);
            }
            $sum = bcadd(0, $sum / sizeof($courseMarkList[$i]), 2);
            if ($sum >= 80)
               $gpa = 4;
            else if ($sum >= 75)
                $gpa = 3.75;
            else if ($sum >= 70)
                $gpa = 3.50;
            else if ($sum >= 65)
                $gpa = 3.25;
            else if ($sum >= 60)
                $gpa = 3.00;
            else if ($sum >= 55)
                $gpa = 2.75;
            else if ($sum >= 50)
                $gpa = 2.50;
            else if ($sum >= 45)
                $gpa = 2.25;
            else if ($sum >= 40)
                $gpa = 2.00;
            else
                $gpa = 0;

            $result[] =  $gpa;
        }

        $data['result'] = $result;
        $data['students'] = $studentData;
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'mark/allresult';
        $data['title'] = 'Student List Page';

        $this->load->view('layout', $data);
    }

    
    
     public function markentry() {

//        if (!empty($this->input->post('program_id')) && !empty($this->input->post('section_id')) && !empty($this->input->post('semester_id')) && !empty($this->input->post('session_id')) && !empty($this->input->post('exam-type')) && !empty($this->input->post('coursee_id'))) {



            $where = array('program_id' => $this->input->post('program_id'), 'section_id' => $this->input->post('section_id'), 'semester_id' => $this->input->post('semester_id'), 'session_id' => $this->input->post('session_id'));

//SELECT ALL STUDENT BY WHERE
            $students = $this->General_model->select_any_one_where('students', $where);
            $data['students'] = $students;
            if ($students == NULL) {
                $this->session->set_flashdata('d_error', ' Student Not Found! ');
                redirect('marks');
            }

//SELECT COURSES
            $where = array('course_id' => $this->input->post('coursee_id'));
            $data['courses'] = $this->General_model->select_any_where('courses', $where);

//            SELECT PROGRAM
            $where = array('program_id' => $this->input->post('program_id'));
            $data['programs'] = $this->General_model->select_any_where('programs', $where);
//            SELECT semester 
            $where = array('semester_id' => $this->input->post('semester_id'));
            $data['semesters'] = $this->General_model->select_any_where('semesters', $where);

//            SELECT Session  
            $where = array('session_id' => $this->input->post('session_id'));
            $data['sessions'] = $this->General_model->select_any_where('sessions', $where);

//            SELECT Session  
            $where = array('section_id' => $this->input->post('section_id'));
            $data['sections'] = $this->General_model->select_any_where('sections', $where);


            $data['coursee_id'] = $this->input->post('coursee_id');
            $data['exam_type'] = $this->input->post('exam-type');
            $data['semester_id'] = $this->input->post('semester_id');





            $where = array('course_id' => $this->input->post('coursee_id'));

            $result = $this->General_model->select_any_where('courses', $where);


            $where = array('id' => $result['mark_distribution_id']);

            $result = $this->General_model->select_any_where('markdistributions', $where);

            $where = array('id' => $result['mark_id']);
            $result = $this->General_model->select_any_where('marks', $where);

            $where = array('id' => $result['theory_id']);
            $theories = $this->General_model->select_any_where('theories', $where);
            $data['theory_max_number'] = $theories['cont_asses'];

            $where = array('id' => $result['practical_id']);
            $practicals = $this->General_model->select_any_where('practicals', $where);
            $data['practicals_max_number'] = $practicals['cont_asses'];



            //        SELECTD EXITs MARK 
            $marks = array();
            for ($i = 0; $i < sizeof($students); ++$i) {
                $where = array('student_id' => $students[$i]->s_id, 'semester_id' => $this->input->post('semester_id'), 'exam_type' => $this->input->post('exam-type'), 'course_id' => $this->input->post('coursee_id'));

                $marks[] = $this->General_model->select_any_where('course_marks', $where);
            }

            $data['marks'] = $marks;

            $data['sidebar'] = 'sidebar/left-sidebar';
            $data['page'] = 'mark/student-list';
            $data['title'] = 'Student List Page';

            $this->load->view('layout', $data);
//        } else {
//            $this->session->set_flashdata('d_error', 'Something is wrong!! Please try again');
//            redirect('marks');
//        }
    }

    
    
}

?>