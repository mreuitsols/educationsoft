<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('General_model');
        $this->load->model('Student_model');
        $this->load->model('Subject_model');
        $this->load->model('User_model');
        $this->load->model('Accounts_model');
    }

    public function index() {


        if ($_SESSION['role'] == "student" || $_SESSION ['role'] == "teacher") {
            redirect('/');
        }

        $data['session'] = $this->General_model->slect_any_table('sessions');
        $data['semesters'] = $this->General_model->slect_any_table('semesters');
        $data['sections'] = $this->General_model->slect_any_table('sections');
        $data['programs'] = $this->General_model->slect_any_table('programs');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'student/select_program';
        $data['title'] = 'Student List Page';
        $this->load->view('layout', $data);
    }

    public function addstudent($id = NULL) {
        if ($_SESSION['role'] == "student" || $_SESSION ['role'] == "teacher") {
            redirect('/');
        }

        $data['faculty'] = $this->General_model->slect_any_table('faculty');
        $data['session'] = $this->General_model->slect_any_table('sessions');
        $data['semesters'] = $this->General_model->slect_any_table('semesters');
        $data['sections'] = $this->General_model->slect_any_table('sections');
        $data['programs'] = $this->General_model->slect_any_table('programs');
        $where = array('s_id' => $id);
        $data['students'] = $this->General_model->select_any_where('students', $where);
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'student/addNewStudent';
        $data['title'] = 'Add Student';
        $this->load->view('layout', $data);
    }

    public function save($id = NULL) {

        if ($_SESSION['role'] == "student" || $_SESSION ['role'] == "teacher") {
            redirect('/');
        }

        $id = $this->input->post('s_id', true);
        $student_id = $this->input->post('student_id', true);
        $saveData['student_id'] = $student_id;

        $saveData['faculty_id'] = $this->input->post('faculty_id', true);
        $saveData['department_id'] = $this->input->post('department_id', true);
        $saveData['curriculum_id'] = $this->input->post('curriculum_id', true);

        $program_id = $this->input->post('program_id', true);
        $saveData['program_id'] = $program_id;

        $session_id = $this->input->post('session', true);
        $saveData['session_id'] = $session_id;
        $semester_id = $this->input->post('semester', true);
        $saveData['semester_id'] = $semester_id;
        $section_id = $this->input->post('section', true);
        $saveData['section_id'] = $section_id;

        $saveData['user_id'] = $_SESSION['user_id'];
        $saveData['student_name'] = $this->input->post('student_name', true);
        $saveData['gender'] = $this->input->post('gender', true);
        $saveData['father_name'] = $this->input->post('father_name', true);
        $saveData['mother_name'] = $this->input->post('mother_name', true);
        $saveData['father_occupation'] = $this->input->post('father_occupation', true);
        $saveData['parmanent_address'] = $this->input->post('parmanent_address', true);
        $saveData['present_address'] = $this->input->post('present_address', true);
        $saveData['post_code'] = $this->input->post('post_code', true);
        $saveData['district'] = $this->input->post('district', true);
        $saveData['country'] = $this->input->post('country', true);
        $saveData['email'] = $this->input->post('email', true);
        $saveData['mobile_no'] = $this->input->post('mobile_no', true);
        $saveData['blood_group'] = $this->input->post('blood_group', true);
        $saveData['date_of_birth'] = $this->input->post('date_of_birth', true);
        $saveData['nationality'] = $this->input->post('nationality', true);
//        $saveData['tution_fee'] = $this->input->post('tution_fee', true);
//        $saveData['due'] = $this->input->post('due', true);
//        $saveData['require_credit'] = $this->input->post('require_credit', true);
        $saveData['telephone_no'] = $this->input->post('telephone_no', true);
        $saveData['passport_no'] = $this->input->post('passport_no', true);
        $saveData['marital_status'] = $this->input->post('marital_status', true);
        $saveData['birth_place'] = $this->input->post('birth_place', true);
//        $saveData['entry_date'] = $this->input->post('entry_date', true);
        $saveData['religion'] = $this->input->post('religion', true);
        $saveData['hsc_passing_year'] = $this->input->post('hsc_passing_year', true);
        $saveData['hsc'] = $this->input->post('hsc', true);
        $saveData['hsc_result'] = $this->input->post('hsc_result', true);
        $saveData['graduation_honurs'] = $this->input->post('graduation_honurs', true);
        $saveData['graduation_honurs_passing_year'] = $this->input->post('graduation_honurs_passing_year', true);
        $saveData['honours_result'] = $this->input->post('honours_result', true);
        $saveData['graduation_masters'] = $this->input->post('graduation_masters', true);



        $string = md5(date('Y-m-d-h-m-s'));
        $rand = substr($string, 0, 8);


        if (isset($_FILES ['file']) && !empty($_FILES['file'])) {
            $dir = "public/uploads/students/";
            $filename = $rand . $_FILES['file']['name'];
            $imgtmp = $_FILES['file']['tmp_name'];
            move_uploaded_file($imgtmp, $dir . $filename);
            $saveData['photo'] = $filename;
        }

        $student_ins_id = $this->Student_model->save($saveData, $id);


        $where = array('program_id' => $program_id, 'semester_id' => $semester_id, 'session_id' => $session_id, 'student_id' => $student_id);
        $studentBalance = $this->General_model->select_any_where('student_dr_account', $where);

        $where = array('program_id' => $program_id, 'semester_id' => $semester_id, 'session_id' => $session_id);
        $student_fees_by_semeste = $this->Accounts_model->select_sum_where('student_fees_by_semeste', 'fees_amount', $where);

        if (is_array($studentBalance) && sizeof($studentBalance) > 0) {
            $where = array('program_id' => $program_id, 'semester_id' => $semester_id, 'session_id' => $session_id, 'student_id' => $student_id);
            $this->General_model->update('student_dr_account', $where, array('dr_amount' => $student_fees_by_semeste[0]->fees_amount));
        } else {


            $data = array('program_id' => $program_id, 'semester_id' => $semester_id, 'session_id' => $session_id, 'student_id' => $student_id, 'dr_amount' => $student_fees_by_semeste[0]->fees_amount);
            $insertId = $this->Accounts_model->save_data('student_dr_account', $data);
        }


//        Users Tables Data
        $saveUserDat['username'] = $this->input->post('student_id', true);
        $saveUserDat['password'] = md5($this->input->post('student_id', true));
        $saveUserDat['email'] = md5($this->input->post('email', true));
        $saveUserDat['g_id'] = $id;
        $saveUserDat['role'] = 'student';
        $saveUserDat['status'] = 'active';

        $successQuery = $this->User_model->save($saveUserDat);




        if ($successQuery) {
            $this->session->set_flashdata('success', 'Add Student Successfull');

            redirect('students/addstudent');
        }
    }

    public function edit($id) {
        if ($_SESSION['role'] == "student" || $_SESSION ['role'] == "teacher") {
            redirect('/');
        }

        $where = array('s_id' => $id);
        $data['students'] = $this->General_model->select_any_where('students', $where);

        $data['session'] = $this->General_model->slect_any_table('sessions');
        $data['semesters'] = $this->General_model->slect_any_table('semesters');
        $data['sections'] = $this->General_model->slect_any_table('sections');
        $data['programs'] = $this->General_model->slect_any_table('programs');
        $data['faculty'] = $this->General_model->slect_any_table('faculty');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'student/addNewStudent';
        $data['title'] = 'Add Student';
        $this->load->view('layout', $data);
    }

    public function view_student() {
        if ($_SESSION['role'] == "student" || $_SESSION ['role'] == "teacher") {
            redirect('/');
        }
        $where = array('program_id' => $this->input->post('program_id'), 'section_id' => $this->input->post('section_id'), 'semester_id' => $this->input->post('semester_id'), 'session_id' => $this->input->post('session_id'));

        $studentData = $this->General_model->select_any_one_where('students', $where);
        $data['students'] = $studentData;

        if (!$studentData) {
            $this->session->set_flashdata('error', 'Not Found !! Please Try again!');
            redirect('students');
        }

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'student/studentList';
        $data['title'] = 'Student List Page';

        $this->load->view('layout', $data);
    }

    public function student_list() {
        if ($_SESSION['role'] == "student" || $_SESSION ['role'] == "teacher") {
            redirect('/');
        }

        $where = array('student_id' => $this->input->post('student_id'));

        $studentData = $this->General_model->select_any_one_where('students', $where);
        if (!$studentData) {
            $this->session->set_flashdata('error', 'Not Found ! Please Try again!');
            redirect('students');
        }
        $data['students'] = $studentData;
        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'student/studentList';
        $data['title'] = 'Student List Page';

        $this->load->view('layout', $data);
    }

    public function view_details($id) {
        if ($_SESSION['role'] == "student" || $_SESSION ['role'] == "teacher") {
            redirect('/');
        }
        $where = array('s_id' => $id);
        $studentInfo = $this->General_model->select_any_where('students', $where);
        $data['students'] = $studentInfo;
        if (!$studentData) {
            $this->session->set_flashdata('error', 'Not Found ! Please Try again!');
            redirect('students');
        }


        $where = array('program_id' => $studentInfo['program_id']);
        $data['programs'] = $this->General_model->select_any_where('programs', $where);

        $where = array('semester_id' => $studentInfo['semester_id']);
        $data['semesters'] = $this->General_model->select_any_where('semesters', $where);

        $where = array('section_id' => $studentInfo['section_id']);
        $data['sections'] = $this->General_model->select_any_where('sections', $where);

        $where = array('session_id' => $studentInfo['session_id']);
        $data['sessions'] = $this->General_model->select_any_where('sessions', $where);

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'student/viewDetails';
        $data['title'] = 'Student Details';
        $this->load->view('layout', $data);
    }

    public function logout() {
        session_destroy();
        redirect('login');
    }

}
