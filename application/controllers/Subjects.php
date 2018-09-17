<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
        $this->load->model('General_model');
        $this->load->model('Student_model');
        $this->load->model('Subject_model');
        $this->load->model('Distributions_model');
    }

    public function index() {
        $this->view();
    }

    public function create() {

        $data['faculty'] = $this->General_model->slect_any_table('faculty');
        $data['session'] = $this->General_model->slect_any_table('sessions');
        $data['semesters'] = $this->General_model->slect_any_table('semesters');
        $data['sections'] = $this->General_model->slect_any_table('sections');
        $data['programs'] = $this->General_model->slect_any_table('programs');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'subject/add_subject';
        $data['title'] = 'Add Subject';
        $this->load->view('layout', $data);
    }

    public function edit($subject_id) {
        $where = array('subject_id' => $subject_id);
        $data['faculty'] = $this->General_model->slect_any_table('faculty');


        $subjectEditData = $this->General_model->select_any_where('subjects', $where);
        $data['subjectEditData'] = $subjectEditData;

        $where = array('faculty_id' => $subjectEditData['faculty_id']);

        $data['departments'] = $this->General_model->select_any_one_where('departments', $where);

        $where = array('faculty_id' => $subjectEditData['faculty_id'], 'department_id' => $subjectEditData['department_id']);
        $data['programs'] = $this->General_model->select_any_one_where('programs', $where);

        $where = array('faculty_id' => $subjectEditData['faculty_id'], 'department_id' => $subjectEditData['department_id'], 'program_id' => $subjectEditData['program_id']);
        $data['curriculums'] = $this->General_model->select_any_where('curriculums', $where);


        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'subject/edit_subject';
        $data['title'] = 'Add Subject';
        $this->load->view('layout', $data);
    }

    public function save($id = NULL) {


        $program_id = $this->input->post('program_id', true);

        $subjectData['faculty_id'] = $this->input->post('faculty_id');
        $subjectData['department_id'] = $this->input->post('department_id');
        $subjectData['program_id'] = $this->input->post('program_id');
        $subjectData['curriculum_id'] = $this->input->post('curriculum_id');
        $subjectData['subject_type'] = $this->input->post('subject-type');
        $subjectData['subject_name'] = $this->input->post('subject-name');
        $subjectData['subject_code'] = $this->input->post('subject-code');
        $subjectData['credit'] = $this->input->post('credit');
        $subjectData['subject_mark'] = $this->input->post('subject-mark');
        $subjectData['author_name'] = $this->input->post('author-name');
        $subjectData['publisher'] = $this->input->post('publisher');
        $subjectData['publish_year'] = $this->input->post('publish_year');
        $subjectData['subject_code'] = $this->input->post('subject-code');

        $insertCourse = $this->Subject_model->save('subjects', $subjectData);





        if ($insertCourse) {
            $this->session->set_flashdata('success', 'New Subject added Succcessfully');
            redirect('subjects/create');
        } else {
            $this->session->set_flashdata('error', 'Somthing worng. Error!!');
            redirect('subjects/create');
        }
    }

    public function update() {


        $subject_id = $this->input->post('subject_id');
        $subjectData['faculty_id'] = $this->input->post('faculty_id');
        $subjectData['department_id'] = $this->input->post('department_id');
        $subjectData['program_id'] = $this->input->post('program_id');
        $subjectData['curriculum_id'] = $this->input->post('curriculum_id');
        $subjectData['subject_type'] = $this->input->post('subject-type');
        $subjectData['subject_name'] = $this->input->post('subject-name');
        $subjectData['subject_code'] = $this->input->post('subject-code');
        $subjectData['credit'] = $this->input->post('credit');
        $subjectData['subject_mark'] = $this->input->post('subject-mark');
        $subjectData['author_name'] = $this->input->post('author-name');
        $subjectData['publisher'] = $this->input->post('publisher');
        $subjectData['publish_year'] = $this->input->post('publish_year');
        $subjectData['subject_code'] = $this->input->post('subject-code');

        $where = array('subject_id' => $subject_id);
        $insertCourse = $this->Subject_model->update('subjects', $where, $subjectData);


        $faculty_id = $this->input->post('faculty_id');
        $program_id = $this->input->post('program_id');
        $curriculum_id = $this->input->post('curriculum_id');
        $department_id = $this->input->post('department_id');
        $where = array('faculty_id' => $faculty_id, 'department_id' => $department_id, 'program_id' => $program_id, 'curriculum_id' => $curriculum_id);

        $data['subjectList'] = $this->Subject_model->select_result_data('subjects', $where);


        $data['curriculums'] = $this->General_model->select_any_where('curriculums', $where);


        $data['faculty'] = $this->General_model->select_any_where('faculty', array('faculty_id' => $faculty_id));
        $data['programs'] = $this->General_model->select_any_where('programs', array('program_id' => $faculty_id));


        $this->view_subject_list();
    }

//    VIEW DISTRIBUTIONS

    public function view() {
        $data['faculty'] = $this->General_model->slect_any_table('faculty');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'subject/search-subject';
        $data['title'] = 'Show all subject';
        $this->load->view('layout', $data);
    }

    public function view_subject_list() {
        $faculty_id = $this->input->post('faculty_id');
        $program_id = $this->input->post('program_id');
        $curriculum_id = $this->input->post('curriculum_id');
        $department_id = $this->input->post('department_id');
        $where = array('faculty_id' => $faculty_id, 'department_id' => $department_id, 'program_id' => $program_id, 'curriculum_id' => $curriculum_id);

        $data['subjectList'] = $this->Subject_model->select_result_data('subjects', $where);


        $data['curriculums'] = $this->General_model->select_any_where('curriculums', $where);


        $data['faculty'] = $this->General_model->select_any_where('faculty', array('faculty_id' => $faculty_id));
        $data['programs'] = $this->General_model->select_any_where('programs', array('program_id' => $faculty_id));


        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'subject/subjectList';
        $data['title'] = 'Show all subject';
        $this->load->view('layout', $data);
    }

    public function subject_distribution() {
        $data['faculty'] = $this->General_model->slect_any_table('faculty');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'subject/subject-distribution';
        $data['title'] = 'Subject Distribution';
        $this->load->view('layout', $data);
    }

    public function add_subject_distribution() {
        $faculty_id = $this->input->post('faculty_id');
        $program_id = $this->input->post('program_id');
        $curriculum_id = $this->input->post('curriculum_id');
        $where = array('faculty_id' => $faculty_id, 'program_id' => $program_id, 'curriculum_id' => $curriculum_id);


        $curriculums = $this->General_model->select_any_where('curriculums', $where);
        if (sizeof($curriculums) == 0) {
            redirect('subjects/subject_distribution');
        }

        $semesters = $this->General_model->slect_any_table('semesters');


        $years = $curriculums['program_duration'] * 12;

        $getSemester = ($years / $curriculums['semester_duration']);

        if (sizeof($semesters) < $getSemester) {
            $this->session->set_flashdata('error1', 'Please Enter New another semeseter');
            redirect('semesters');
        }

        $data['semesters'] = $semesters;

        $data['curriculums'] = $curriculums;

        $subjectList = $this->Subject_model->select_result_data('subjects', $where);
        if (sizeof($subjectList) == 0) {
            $this->session->set_flashdata('error1', 'Please at first insert subject');
            redirect('subjects/create');
        }
        $data['subjectList'] = $subjectList;




        /* -----------------------------------
         *     BELOW QUERY FOR TOTAL credit filter 
         * --------------------------------------- */
        $subject_distributions = $this->Subject_model->select_result_data('subject_distributions', $where);
        $subjectId = array();
        for ($i = 0; $i < sizeof($subject_distributions); $i++) {
            $where = array('distribution_id' => $subject_distributions[$i]->distribution_id);
            $subjectId[] = $this->Subject_model->select_result_data('distribution_subject_list', $where);
        }


        $distributedSubjectList = array();
        for ($i = 0; $i < sizeof($subjectId); $i++) {
            $_subjectList = array();
            for ($j = 0; $j < sizeof($subjectId[$i]); $j++) {
                $where = array('subject_id' => $subjectId[$i][$j]->subject_id);
                $_subjectList[] = $this->General_model->select_any_where('subjects', $where);
            }
            $distributedSubjectList[] = $_subjectList;
        }

        $total = 0;
        for ($i = 0; $i < sizeof($distributedSubjectList); $i++) {
            for ($j = 0; $j < sizeof($distributedSubjectList[$i]); $j++) {
                $total = $total + $distributedSubjectList[$i][$j]['credit'];
            }
        }
        $data['totalCredit'] = $total;
        /* ---------------------------------------------
         * END OF QUERY FOR TOTAL credit filter
         * ------------------------------------------ */


        $data['faculty'] = $this->General_model->select_any_where('faculty', array('faculty_id' => $faculty_id));
        $data['programs'] = $this->General_model->select_any_where('programs', array('program_id' => $program_id));
//        $data['curriculum_data'] = $this->General_model->select_any_where('curriculums', $where);


        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'subject/view-all-subject';
        $data['title'] = 'Subject Distribution';
        $this->load->view('layout', $data);
    }

    public function save_distribution() {

        $distribution = array();
        $faculty_id = $this->input->post('faculty_id', true);
        $program_id = $this->input->post('program_id', true);
        $curriculum_id = $this->input->post('curriculum_id', true);
        $distribution['faculty_id'] = $faculty_id;
        $distribution['program_id'] = $program_id;
        $distribution['curriculum_id'] = $curriculum_id;

        for ($i = 0; $i < sizeof($this->input->post('semester')); $i++) {
            $distribution['semester_id'] = $this->input->post('semester')[$i];
//Save Distributions
            $where = array('faculty_id' => $faculty_id, 'program_id' => $program_id, 'curriculum_id' => $curriculum_id, 'semester_id' => $this->input->post('semester')[$i]);
            $distributionsData = $this->General_model->select_any_where('subject_distributions', $where);


            $where = array('distribution_id' => $distributionsData['distribution_id']);
            $this->General_model->delete('distribution_subject_list', $where);
            $this->General_model->delete('subject_distributions', $where);


            $distribution_id = $this->Subject_model->save('subject_distributions', $distribution);

//            This loop tor subject list save
            for ($j = 0, $tatalSubject = sizeof($this->input->post('subject' . $i)); $j < $tatalSubject; ++$j) {
                $subjectData['subject_id'] = $this->input->post('subject' . $i)[$j];
                $subjectData['distribution_id'] = $distribution_id;
                $subjectData['semester_id'] = $this->input->post('semester')[$i];
                $this->Subject_model->save('distribution_subject_list', $subjectData);
            }
        }
        redirect('subjects/subject_distribution');
    }

    public function distribution_view() {
        $data['faculty'] = $this->General_model->slect_any_table('faculty');

        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'subject/subject-distribution-view';
        $data['title'] = 'Subject Distribution';
        $this->load->view('layout', $data);
    }

    public function sylabus() {
        $faculty_id = $this->input->post('faculty_id');
        $program_id = $this->input->post('program_id');
        $curriculum_id = $this->input->post('curriculum_id');
        $where = array('faculty_id' => $faculty_id, 'program_id' => $program_id, 'curriculum_id' => $curriculum_id);


        $curriculums = $this->General_model->select_any_where('curriculums', $where);
        if (sizeof($curriculums) == 0) {
            redirect('subjects/subject_distribution');
        }

        $semesters = $this->General_model->slect_any_table('semesters');


        $years = $curriculums['program_duration'] * 12;

        $getSemester = ($years / $curriculums['semester_duration']);

        if (sizeof($semesters) < $getSemester) {
            $this->session->set_flashdata('error1', 'Please Enter New another semeseter');
            redirect('semesters');
        }

        $data['semesters'] = $semesters;

        $data['curriculums'] = $curriculums;


        $subject_distributions = $this->Subject_model->select_result_data('subject_distributions', $where);
        $subjectId = array();
        for ($i = 0; $i < sizeof($subject_distributions); $i++) {
            $where = array('distribution_id' => $subject_distributions[$i]->distribution_id);
            $subjectId[] = $this->Subject_model->select_result_data('distribution_subject_list', $where);
        }
//        echo '<pre>';
//        echo sizeof($subjectId[0]);

        $distributedSubjectList = array();
        for ($i = 0; $i < sizeof($subjectId); $i++) {
            $_subjectList = array();
            if (is_array($subjectId[$i]) AND sizeof($subjectId[$i]) > 0) {
                for ($j = 0; $j < sizeof($subjectId[$i]); $j++) {
                    $where = array('subject_id' => $subjectId[$i][$j]->subject_id);
                    $_subjectList[] = $this->General_model->select_any_where('subjects', $where);
                }
            }
            $distributedSubjectList[] = $_subjectList;
        }

//        if (sizeof($subjectList) == 0) {
//            $this->session->set_flashdata('error1', 'Please at first insert subject');
//            redirect('subjects/create');
//        }
        $data['subjectList'] = $distributedSubjectList;

        $data['faculty'] = $this->General_model->select_any_where('faculty', array('faculty_id' => $faculty_id));
        $data['programs'] = $this->General_model->select_any_where('programs', array('program_id' => $program_id));
//        $data['curriculum_data'] = $this->General_model->select_any_where('curriculums', $where);


        $data['sidebar'] = 'sidebar/left-sidebar';
        $data['page'] = 'subject/view-sylabus';
        $data['title'] = 'Subject Distribution';
        $this->load->view('layout', $data);
    }

    public function view_sylabus() {
        echo 'Under Development';
    }

}
