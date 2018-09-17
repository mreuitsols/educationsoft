<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ajax
 *
 * @author User
 */
class Ajax extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Subject_model');
        $this->load->model('General_model');
        $this->load->model('Accounts_model');
    }

    public function select_subject() {

        $program_id = $this->input->post('program_id', TRUE);
        $semester_id = $this->input->post('semester_id', TRUE);
        $session_id = $this->input->post('session_id', TRUE);

        $where = array('program_id' => $program_id, 'semester_id' => $semester_id, 'session_id' => $session_id);

        $course_list = $this->General_model->select_any_one_where('courses', $where);


        $this->load->view('partialview/courses', array('course_list' => $course_list));
    }

    public function select_program() {

        $faculty_id = $this->input->post('faculty_id', TRUE);

        $where = array('faculty_id' => $faculty_id);

        $departments = $this->General_model->select_any_one_where('departments', $where);
        $programs = array();
        for ($i = 0; $i < sizeof($departments); ++$i) {
            $where = array('department_id' => $departments[$i]->department_id);
            $programs[] = $this->General_model->select_any_where('programs', $where);
        }
        $this->load->view('partialview/program-list', array('programsdata' => $programs));
    }

    public function select_department() {

        $faculty_id = $this->input->post('faculty_id', TRUE);

        $where = array('faculty_id' => $faculty_id);

        $departments = $this->General_model->select_any_one_where('departments', $where);

        $this->load->view('partialview/department-list', array('departments' => $departments));
    }

    public function select_program_by_faculty_department() {

        $faculty_id = $this->input->post('faculty_id', TRUE);
        $department_id = $this->input->post('department_id', TRUE);

        $where = array('faculty_id' => $faculty_id, 'department_id' => $department_id);

        $programs = $this->General_model->select_any_one_where('programs', $where);

        $this->load->view('partialview/program-list', array('programsdata' => $programs));
    }

//        SELECT CURRICULUM
    public function select_curriculum() {

        $faculty_id = $this->input->post('faculty_id', TRUE);
        $program_id = $this->input->post('program_id', TRUE);

        $where = array('faculty_id' => $faculty_id, 'program_id' => $program_id);

        $curriculums = $this->General_model->select_any_one_where('curriculums', $where);
//        var_dump($curriculums);
//        $curriculum = array();
//        for ($i = 0; $i < sizeof($curriculums);  ++$i) {
//            $where = array('department_id' => $departments[$i]->department_id);
//            $curriculum[] = $this->General_model->select_any_where('programs', $where);
//        }



        $this->load->view('partialview/curriculum-list', array('curriculums' => $curriculums));
    }

    public function select_curriculum_data() {

        $faculty_id = $this->input->post('faculty_id');
        $program_id = $this->input->post('program_id');
        $curriculum_id = $this->input->post('curriculum_id');
        $where = array('faculty_id' => $faculty_id, 'program_id' => $program_id, 'curriculum_id' => $curriculum_id);

        $where = array('curriculum_id' => $curriculum_id);
        $data = $this->General_model->slect_any_table('sections');
        $curriculums = $this->General_model->select_any_where('curriculums', $where);
//        var_dump($curriculums);
//        $curriculum = array();
//        for ($i = 0; $i < sizeof($curriculums);  ++$i) {
//            $where = array('department_id' => $departments[$i]->department_id);
//            $curriculum[] = $this->General_model->select_any_where('programs', $where);
//        }


        $subject_distributions = $this->Subject_model->select_result_data('subject_distributions', $where);



        $subjectId = array();
        for ($i = 0; $i < sizeof($subject_distributions); $i++) {
            $where = array('distribution_id' => $subject_distributions[$i]->distribution_id);
            $subjectId[] = $this->Subject_model->select_result_data('distribution_subject_list', $where);
        }


        $theory_SubjectList = array();
        $practical_SubjectList = array();
        for ($i = 0; $i < sizeof($subjectId); $i++) {
            $_theory_subjectList = array();
            $_practical_subjectList = array();
            for ($j = 0; $j < sizeof($subjectId[$i]); $j++) {
                $where = array('subject_id' => $subjectId[$i][$j]->subject_id);
                $_theory_subjectList[] = $this->General_model->select_any_where('subjects', $where);
            }
            for ($j = 0; $j < sizeof($subjectId[$i]); $j++) {
                $where = array('subject_id' => $subjectId[$i][$j]->subject_id, 'subject_type' => 'Practical');
                $_practical_subjectList[] = $this->General_model->select_any_where('subjects', $where);
            }
            $theory_SubjectList[] = $_theory_subjectList;
            $practical_SubjectList[] = $_practical_subjectList;
        }

        $theory_total_credit = 0;
        $total_lab = 0;

        if (is_array($theory_SubjectList) and sizeof($theory_SubjectList) > 0) {
            for ($i = 0; $i < sizeof($theory_SubjectList); $i++) {
                for ($j = 0; $j < sizeof($theory_SubjectList[$i]); $j++) {
                    $theory_total_credit = $theory_total_credit + $theory_SubjectList[$i][$j]['credit'];
                }
            }
        }
        if (is_array($practical_SubjectList) and sizeof($practical_SubjectList) > 0) {
            for ($i = 0; $i < sizeof($practical_SubjectList); $i++) {

                for ($j = 0; $j < sizeof($practical_SubjectList[$i]); $j++) {
                    if ($practical_SubjectList[$i][$j]['credit'] > 0) {
                        $total_lab = $total_lab + 1;
                    }
                }
            }
        }

        $this->load->view('partialview/curriculum-all-data', array('curriculums' => $curriculums, 'sections' => $data, 'total_credit' => $theory_total_credit, 'total_lab' => $total_lab));
    }

    public function select_teaher() {

        $program_id = $this->input->post('program_id', TRUE);
        $where = array('program_id' => $program_id);
        $programs = $this->General_model->select_any_where('programs', $where);



        $where = array('department_id' => $programs['department_id'], 'employee_type' => 'Teacher');

        $teacherList = $this->General_model->select_any_one_where('employees', $where);
//        var_dump($where);

        $this->load->view('partialview/teachers', array('teacherList' => $teacherList));
    }

    public function select_course_dustribution_mark() {
        $mark = $this->input->post('mark', TRUE);
        $coursee_id = $this->input->post('coursee_id', TRUE);



        $where = array('course_id' => $coursee_id);

        $result = $this->General_model->select_any_where('courses', $where);


        $where = array('id' => $result['mark_distribution_id']);

        $result = $this->General_model->select_any_where('markdistributions', $where);

        $where = array('id' => $result['mark_id']);
        $result = $this->General_model->select_any_where('marks', $where);

        $where = array('id' => $result['theory_id']);
        $result = $this->General_model->select_any_where('theories', $where);
        echo $result['cont_asses'];
    }

    public function check_student_id() {

        $where = array('student_id' => $this->input->post('student_id', TRUE));

        $result = $this->General_model->select_any_where('students', $where);

        if ($result > 0) {
            echo 1;
        } else {

            echo 0;
        }
    }

    public function select_fees_purpose() {
    
        $where = array('program_id' => $this->input->post('program_id', true), 'semester_id' => $this->input->post('semester_id', true), 'session_id' => $this->input->post('session_id', true));
        $fees_amount_by_semester = $this->General_model->select_any_one_where('fees_amount_by_semester', $where);
        var_dump($where);
        exit();
        $jsonData = array();
        foreach ($fees_amount_by_semester AS $value) {
          $account_purpose_list= $this->General_model->select_any_where('account_purpose_list', array('purpose_id' => $value->account_purpose_id));
            $jsonData[] = array($account_purpose_list['purpose_id'], 'amount' => $value->amount);
 
        }
        
        var_dump($jsonData);
//
//        echo json_encode($jsonData);
//        exit;
        
    }

    function fetch() {
        $output = '';
        $query = '';
        if ($this->input->post('student_id')) {
            $query = $this->input->post('student_id');
        }
        $data = $this->General_model->fetch_data($query);

        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= $row->student_id . "<br/>";
            }
        } else {
            $output .= 'No Data Found';
        }
        echo $output;
    }

    function ajaxGet() {
        $this->load->model('General_model');
        $lastId = isset($_GET['last']) ? $_GET['last'] : 0;

        $students = $this->General_model->slect_any_tableNew('students');
        $jsonData = array();
        foreach ($students AS $value) {
            $id = $value->s_id;
            if ($lastId < $id) {
                $user_name = $this->General_model->select_any_where('users', array('user_id' => $value->user_id));
                $jsonData[] = array('s_id' => $value->s_id, 'username' => $user_name['username'], 'student_id' => $value->student_id, 'student_name' => $value->student_name, 'mobile_no' => $value->mobile_no, 'email' => $value->email);
            }
        }
        //var_dump($jsonData);
        echo json_encode($jsonData);
        exit;
    }

    function ajaxGetDeactive() {
        $this->load->model('General_model');
        $students = $this->General_model->slect_any_tableNew1('students');
        //var_dump($students);
        $jsonData = array();
        foreach ($students AS $value) {
            $user_name = $this->General_model->select_any_where('users', array('user_id' => $value->user_id));
            $jsonData[] = array('s_id' => $value->s_id, 'username' => $user_name['username'], 'student_id' => $value->student_id, 'student_name' => $value->student_name, 'mobile_no' => $value->mobile_no, 'email' => $value->email, 'status' => $value->status);

            $this->General_model->update('students', array('s_id' => $value->s_id), array('update_status' => '1'));
        }

        echo json_encode($jsonData);
        exit;
    }

}
