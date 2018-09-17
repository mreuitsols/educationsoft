

<script type="text/javascript">


    $(document).ready(function () {

        $("#faculty_id").on("change", function () {
            var faculty_id = $('#faculty_id').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>ajax/select_department/", //here we are calling our user controller and get_cities method with the country_id
                data: {'faculty_id': faculty_id},
                dataType: "text",
                success: function (html) {
//                    console.log(html);
                    $('#department_id').html(html);

                }
            });
        });
        $("#department_id").on("change", function () {
            var faculty_id = $('#faculty_id').val();
            var department_id = $('#department_id').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>ajax/select_program_by_faculty_department/", //here we are calling our user controller and get_cities method with the country_id
                data: {'faculty_id': faculty_id, 'department_id': department_id},
                dataType: "text",
                success: function (html) {
//                    console.log(html);
                    $('#program_id').html(html);

                }
            });
        });



        $("#program_id").on("change", function () {
            var program_id = $('#program_id').val();
            var faculty_id = $('#faculty_id').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>ajax/select_curriculum/", //here we are calling our user controller and get_cities method with the country_id
                data: {'program_id': program_id, 'faculty_id': faculty_id},
                dataType: "text",
                success: function (html) {
//                    console.log(html);
                    $('#curriculum_id').html(html);

                }
            });
        });


        $("#curriculum_id").on("change", function () {
            var curriculum_id = $('#curriculum_id').val();
            var department_id = $('#department_id').val();
            var program_id = $('#program_id').val();
            var faculty_id = $('#faculty_id').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>ajax/select_curriculum_data/", //here we are calling our user controller and get_cities method with the country_id
                data: {'curriculum_id': curriculum_id, 'department_id': department_id, 'program_id': program_id, 'faculty_id': faculty_id},
                dataType: "text",
                success: function (html) {
                    $('#ajaxData').html(html);

                }
            });
        });



//        

        $('#student_id').keyup(function () {
// alert('sds');
            var username = $(this).val(); // Get username textbox using $(this)

            var Result = $('#result'); // Get ID of the result DIV where we display the results

            if (username.length > 2) { // if greater than 2 (minimum 3)
                Result.html('Loading...'); // you can use loading animation here
//                var dataPass = 'action=availability&username=' + username;
                $.ajax({// Send the username val to available.php
                    type: 'POST',
                    data: {'student_id': username},
                    url: '<?php echo base_url(); ?>ajax/check_student_id',
                    success: function (responseText) { // Get the result
//alert(responseText);
                        if (responseText == 0) {
                            Result.html('<span  style="color: #28c35b;" class="success"><i class="fa fa-check "></i></span>');
                            $('#student_id').attr('style', 'border-color:#28c35b;box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #28c35b;');
                        }
                        else if (responseText > 0) {
                            Result.html('<span style="color: #a94442" title="Token"><i class="fa fa-times "></i></span>');
                            $('#student_id').attr('style', 'border-color:#c33227;box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #c33227;');
                        }
                        else {
                            alert('Problem with sql query');
                        }
                    }
                });
            } else {
                Result.html('<span style="color: #28c35b" title="Token"><i class="fa fa-times "></i></span>');
                $('#student_id').attr('style', 'border-color:#c33227;box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #c33227;');
            }
            if (username.length == 0) {
                Result.html('');
            }
        });




    });




</script>


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">


                <br/>
                <h2 class="text-center">Student Admission Form</h2>
                <br/>

                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div> 
                <?php } ?>   

                <div class="stepwizard col-md-offset-3">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step first-step" >
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>Step 1</p>
                        </div>
                        <div class="stepwizard-step second-step">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>Step 2</p>
                        </div>
                        <div class="stepwizard-step third-step">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                            <p>Step 3</p>
                        </div>
                    </div>
                </div>


                <form role="form" id="dateRangeForm" action="<?php echo base_url(); ?>students/save" method="post" class="student-entry-form">
                    <div class="row setup-content" id="step-1"> 
                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="col-sm-12">
                                    <h3 class="text-center"> <u>Basic Information</u></h3>
                                    <br/>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Student Matric No/Id <span class="text-danger">*</span></label>
                                        <input class="form-control" type="hidden"  name="s_id"  value="<?php echo $students['s_id']; ?>"/>
                                        <div class="row">
                                            <div class="col-sm-11" style="float: left; position: absolute;">
                                                <input class="form-control " id="student_id" type="text" required="" value="<?php echo $students['student_id']; ?>" name="student_id" />
                                            </div>
                                            <div class="col-sm-1" style="float: right;"> <span class="pull-right" id="result"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Student Name <span class="text-danger">*</span></label>
                                        <input class="form-control" required="" value="<?php echo $students['student_name']; ?>" type="text" name="student_name" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Father's Name </label>
                                        <input class="form-control" required="" type="text" value="<?php echo $students['father_name']; ?>" name="father_name" /> 
                                    </div>
                                </div>
                            </div> <!-- End form row-->

                            <div class="form-row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label"> Mother's Name</label>
                                        <input class="form-control" required="" type="text" value="<?php echo $students['mother_name']; ?>" name="mother_name" /> 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Father's occupation</label>
                                        <input class="form-control" type="text" value="<?php echo $students['father_occupation']; ?>" name="father_occupation" /> 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">  Gender </label>
                                        <select class="form-control" name="gender">
                                            <option value="">----Select-----</option>
                                            <option <?php
                                            if ($students['gender'] == 'Male') {
                                                echo 'selected=""';
                                            }
                                            ?> value="Male">Male</option>
                                            <option <?php
                                            if ($students['gender'] == 'Female') {
                                                echo 'selected=""';
                                            }
                                            ?> value="Female">Female</option>
                                        </select>  
                                    </div>
                                </div>
                            </div><!-- End form row-->


                            <div class="form-row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label"> Date of Birth</label>
                                        <!--<input class="form-control" required="" type="date" name="date_of_birth"  value="<?php echo $students['date_of_birth']; ?>" />-->

                                        <div class=" date">
                                            <div class="input-group input-append date dateRangePicker">
                                                <input required="" type="text" class="form-control" name="date_of_birth" value="<?php echo $students['date_of_birth']; ?>" />
                                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div> 

                                    </div>
                                </div>
                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label class="control-label">Blood Group </label>
                                        <select name="blood_group" class="form-control">
                                            <option value="" selected="">Select Blood</option>
                                            <option <?php
                                            if ($students['blood_group'] == 'A+') {
                                                echo 'selected=""';
                                            }
                                            ?> value="A+">A+</option>
                                            <option <?php
                                            if ($students['blood_group'] == 'O+') {
                                                echo 'selected=""';
                                            }
                                            ?> value="O+">O+</option>
                                            <option <?php
                                            if ($students['blood_group'] == 'B+') {
                                                echo 'selected=""';
                                            }
                                            ?> value="B+">B+</option>
                                            <option <?php
                                            if ($students['blood_group'] == 'AB+') {
                                                echo 'selected=""';
                                            }
                                            ?> value="AB+">AB+</option>
                                            <option <?php
                                            if ($students['blood_group'] == 'A-') {
                                                echo 'selected=""';
                                            }
                                            ?> value="A-">A-</option>
                                            <option <?php
                                            if ($students['blood_group'] == 'O-') {
                                                echo 'selected=""';
                                            }
                                            ?> value="O-">O-</option>
                                            <option <?php
                                            if ($students['blood_group'] == 'B-') {
                                                echo 'selected=""';
                                            }
                                            ?> value="B-">B-</option>
                                            <option <?php
                                            if ($students['blood_group'] == 'AB-') {
                                                echo 'selected=""';
                                            }
                                            ?> value="AB-">AB-</option>

                                        </select> 

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label"> Marital Status </label>
                                        <select name="marital_status" class="form-control">
                                            <option value="" selected="">Select Religion</option>
                                            <option <?php
                                            if ($students['marital_status'] == 'Married') {
                                                echo 'selected=""';
                                            }
                                            ?> value="Married">Married</option>
                                            <option <?php
                                            if ($students['marital_status'] == 'Unmarried') {
                                                echo 'selected=""';
                                            }
                                            ?> value="Unmarried">Unmarried</option>
                                            <option <?php
                                            if ($students['marital_status'] == 'Single') {
                                                echo 'selected=""';
                                            }
                                            ?> value="Single">Single</option> 
                                        </select> 
                                    </div>
                                </div>
                            </div><!-- End form row-->
                            <div class="form-row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Birth Place </label>
                                        <input class="form-control" type="text" name="birth_place"  value="<?php echo $students['birth_place']; ?>" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label"> Religion</label>
                                        <select name='religion' class="form-control">
                                            <option value="" selected="">Select Religion</option>
                                            <option <?php
                                            if ($students['religion'] == 'Islam') {
                                                echo 'selected=""';
                                            }
                                            ?> value="Islam">Islam</option>
                                            <option <?php
                                            if ($students['religion'] == 'Hindu') {
                                                echo 'selected=""';
                                            }
                                            ?> value="Hindu">Hindu</option>
                                            <option <?php
                                            if ($students['religion'] == 'Christian') {
                                                echo 'selected=""';
                                            }
                                            ?> value="Christian">Christian</option>
                                            <option <?php
                                            if ($students['religion'] == 'Buddhism') {
                                                echo 'selected=""';
                                            }
                                            ?> value="Buddhism">Buddhism</option> 
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label"> Mobile No</label>
                                        <input class="form-control" required="" type="text" name="mobile_no"  value="<?php echo $students['mobile_no']; ?>" />
                                    </div>
                                </div>

                            </div><!-- End form row-->
                            <div class="form-row">

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Telephone No </label>
                                        <input class="form-control" type="number" name="telephone_no"  value="<?php echo $students['telephone_no']; ?>" />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label"> E-mail Address</label>
                                        <input class="form-control" type="email" value="<?php echo $students['email']; ?>" name="email" />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Passport No</label>
                                        <input class="form-control" type="text" name="passport_no"  value="<?php echo $students['passport_no']; ?>" />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Postal Code</label>
                                        <input class="form-control" required="" value="<?php echo $students['post_code']; ?>" type="text" name="post_code" />
                                    </div>
                                </div>


                            </div><!-- End form row-->
                            <div class="form-row">



                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">District </label>
                                        <input class="form-control" required="" type="text" name="district" value="<?php echo $students['district']; ?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Country </label>
                                        <input class="form-control country_selector" id="" required="" name="country" type="text" value="<?php echo $students['country']; ?>">
                                        <!--<input class="form-control" required="" type="text" name="country"  value="<?php echo $students['country']; ?>" />-->
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Nationality </label>
                                        <input class="form-control country_selector" required="" type="text" name="nationality"  value="<?php echo $students['nationality']; ?>" />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Student's Picture </label>
                                        <input class="" type="file" name="file" />
                                    </div>
                                </div>
                            </div><!-- End form row-->
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Present Address</label>
                                        <textarea class="form-control" required="" name="present_address" rows="2"><?php echo $students['present_address']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Permanent Address </label>
                                        <textarea class="form-control" required="" name="parmanent_address" rows="2"><?php echo $students['parmanent_address']; ?></textarea>
                                    </div>
                                </div>

                            </div><!-- End form row-->

                            <div class="col-sm-12">
                                <button class="btn btn-primary nextBtn btn-md pull-right" type="button" >Next</button>
                            </div>
                        </div>

                    </div>
                    <div class="row setup-content" id="step-2">

                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="col-sm-12">
                                    <h3 class="text-center"> <u>Education Qualification</u></h3>
                                    <br/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label"> H.S.C / Related Education </label>
                                        <input class="form-control" type="text" name="hsc" value="<?php echo $students['hsc']; ?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Passing Year </label> 
                                        <div class=" date">
                                            <div class="input-group input-append date dateRangePicker" id="">
                                                <input required="" type="text" class="form-control" name="hsc_passing_year" value="<?php echo $students['hsc_passing_year']; ?>" />
                                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label"> Result </label>
                                        <input class="form-control" type="text" name="hsc_result"  value="<?php echo $students['hsc_result']; ?>" />
                                    </div>
                                </div>
                            </div><!-- End form row-->
                            <div class="form-row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label"> Graduation ( Honours / Degree / B.S.C  ) </label> 
                                        <input class="form-control" type="text" name="graduation_honurs"  value="<?php echo $students['graduation_honurs']; ?>" />

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Passing Year</label>
                                        <div class=" date">
                                            <div class="input-group input-append date dateRangePicker" id="">
                                                <input required="" type="text" class="form-control" name="graduation_honurs_passing_year" value="<?php echo $students['graduation_honurs_passing_year']; ?>" />
                                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Result</label>
                                        <input class="form-control" type="text" name="honours_result" value="<?php echo $students['honours_result']; ?>" />
                                    </div>
                                </div>
                            </div><!-- End form row-->
                            <div class="form-row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label"> Graduation ( Masters ) Optional </label> 
                                        <input class="form-control" type="text" name="graduation_masters"  value="<?php echo $students['graduation_masters']; ?>" />

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Passing Year</label>
                                        <div class=" date">
                                            <div class="input-group input-append date dateRangePicker" id="">
                                                <input required="" type="text" class="form-control" name="graduation_masters_year" value="<?php echo $students['graduation_masters_year']; ?>" />
                                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Result</label>
                                        <input class="form-control" type="text" name="graduation_masters_result" value="<?php echo $students['graduation_masters_result']; ?>" />
                                    </div>
                                </div>
                            </div><!-- End form row-->
                            <div class="col-sm-12">

                                <button class="btn btn-primary nextBtn btn-md pull-right" type="button" >Next</button>
                            </div>
                        </div><!-- End form row-->


                    </div>
                    <div class="row setup-content" id="step-3">

                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="col-sm-12">
                                    <h3 class="text-center"> <u>Interest Program </u></h3>
                                    <br/>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="department">Select Faculty</label> 
                                        <select class="form-control" id="faculty_id" name="faculty_id">
                                            <option selected="">Select Program</option>
                                            <?php for ($i = 0; $i < sizeof($faculty); $i++) { ?> 
                                                <option <?php
                                                if ($students['faculty_id'] == $faculty[$i]->faculty_id) {
                                                    echo 'selected=""';
                                                }
                                                ?>  value="<?php echo $faculty[$i]->faculty_id; ?>"><?php echo $faculty[$i]->faculty_name; ?></option>
                                                <?php } ?>
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="department">Select Department</label>
                                        <?php
                                        $where = array('faculty_id' => $students['faculty_id']);
                                        $departments = $this->General_model->select_any_one_where('departments', $where);
                                        ?>
                                        <select class="form-control" id="department_id" name="department_id">
                                            <option selected="">Select Department</option>
                                            <?php for ($i = 0; $i < sizeof($departments); $i++) { ?>
                                                <option <?php
                                                if ($students['department_id'] == $departments[$i]->department_id) {
                                                    echo 'selected=""';
                                                }
                                                ?>><?php echo $departments[$i]->department_name; ?></option><?php }
                                            ?>
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="department">Select Program</label>
                                        <?php
                                        $where = array('faculty_id' => $students['faculty_id'], 'department_id' => $students['department_id']);
                                        $programs = $this->General_model->select_any_one_where('programs', $where);
                                        ?>
                                        <select class="form-control program_id" id="program_id" name="program_id">
                                            <option value="">Select Program</option>
                                            <?php for ($i = 0; $i < sizeof($programs); $i++) { ?>
                                                <option value="<?php echo $programs[$i]->program_id; ?>" <?php
                                                if ($students['program_id'] == $programs[$i]->program_id) {
                                                    echo 'selected=""';
                                                }
                                                ?>><?php echo $programs[$i]->program_name; ?></option><?php }
                                            ?>
                                        </select> 
                                    </div>
                                </div>

                            </div> <!-- End form row-->
                            <div class="form-row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="subject-type">Curriculum</label>
                                        <?php
                                        $where = array('faculty_id' => $students['faculty_id'], 'department_id' => $students['department_id'], 'program_id' => $students['program_id']);
                                        $curriculums = $this->General_model->select_any_one_where('curriculums', $where);
                                        
                                        
                                        $where = array('curriculum_id' => $students['curriculum_id']);
                                        $curriculums_info = $this->General_model->select_any_where('curriculums', $where);
                                        ?>

                                        <select id="curriculum_id" name="curriculum_id" class="form-control">
                                            <option value="">Select</option>
                                            <?php for ($i = 0; $i < sizeof($curriculums); $i++) { ?>
                                                <option value="<?php echo $curriculums[$i]->curriculum_id; ?>" <?php
                                                if ($students['curriculum_id'] == $curriculums[$i]->curriculum_id) {
                                                    echo 'selected=""';
                                                }
                                                ?>><?php echo $curriculums[$i]->curriculum_name; ?></option><?php }
                                            ?>
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Session </label>
                                        <select class="form-control" name="session">
                                            <?php for ($i = 0; $i < sizeof($session); $i++) { ?> 
                                                <option value="<?php echo $session[$i]->session_id; ?>" <?php
                                                if ($students['session_id'] == $session[$i]->session_id) {
                                                    echo 'selected=""';
                                                }
                                                ?>><?php echo $session[$i]->year; ?></option>
                                                    <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Semester </label>
                                        <select class="form-control" required="" name="semester">
                                            <?php for ($i = 0; $i < sizeof($semesters); $i++) { ?> 
                                                <option value="<?php echo $semesters[$i]->semester_id; ?>" <?php
                                                if ($students['semester_id'] == $semesters[$i]->semester_id) {
                                                    echo 'selected=""';
                                                }
                                                ?> ><?php echo $semesters[$i]->semester_name; ?></option>
                                                    <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- End form row-->

                            <div id="ajaxData">
                                <div class="form-row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Section </label>
                                            <select class="form-control" name="section">
                                                <?php for ($i = 0; $i < sizeof($sections); $i++) { ?> 
                                                    <option value="<?php echo $sections[$i]->section_id; ?>" <?php
                                                    if ($students['section_id'] == $sections[$i]->section_id) {
                                                        echo 'selected=""';
                                                    }
                                                    ?>><?php echo $sections[$i]->section_name; ?></option>
                                                        <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Total Year ( Year )</label>

                                            <input readonly="" placeholder="" type="text" name="program_duration" value="<?php echo $curriculums_info['program_duration']; ?>" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Total Credit </label>

                                            <input type="text" placeholder="" readonly="" name="credit" value="<?php echo $curriculums_info['creadit']; ?>" class="form-control">

                                        </div>
                                    </div>

                                </div><!-- End form row-->
                                <div class="form-row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Semester Duration ( Month ) </label>

                                            <input type="text" placeholder="" name="semester_duration" readonly="" value="<?php echo $curriculums_info['semester_duration']; ?>" class="form-control">

                                        </div>
                                    </div> 
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Per Credit Fee </label>

                                            <input readonly="" placeholder="000.00" type="text" name="per-credit-fee" value="<?php echo $curriculums_info['per_creadit_fee']; ?>" class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Lab Fee </label>

                                            <input type="text" readonly="" placeholder="000.00"  name="lab-fee" value="<?php echo $curriculums_info['lab_fee']; ?>" class="form-control">

                                        </div>
                                    </div>
                                </div><!-- End form row-->
                                <div class="form-row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Library Fee (Per Semester)</label>

                                            <input type="text" readonly="" placeholder="000.00" name="library-fee" value="<?php echo $curriculums_info['library_fee']; ?>" class="form-control">

                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Registration Fee (Per Semester)</label> 
                                            <input type="text" name="registration-fee" readonly="" placeholder="000.00" value="<?php echo $curriculums_info['registration_fee']; ?>" class="form-control"> 
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">


                                        </div>
                                    </div>
                                </div><!-- End form row-->

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-row">

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        
 
                                                       <label class="control-label">Total Tuition Fee : </label>

                            <?php 
                            
                              $where = array('curriculum_id' => $students['curriculum_id']);
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
        echo $theory_total_credit;
        if (is_array($practical_SubjectList) and sizeof($practical_SubjectList) > 0) {
            for ($i = 0; $i < sizeof($practical_SubjectList); $i++) {

                for ($j = 0; $j < sizeof($practical_SubjectList[$i]); $j++) {
                    if ($practical_SubjectList[$i][$j]['credit'] > 0) {
                        $total_lab = $total_lab + 1;
                    }
                }
            }
        }
        
        
        echo $curriculums_info['creadit'] . ' * ' . $curriculums_info['per_creadit_fee'] . ' = ' . $total_tuition_fee = $curriculums_info['creadit'] * $curriculums_info['per_creadit_fee']; ?> BDT
                            <br/>
                            <label>Total Registration Fee: </label>
                            <?php
                            if ($curriculums_info['semester_duration'] > 0) {
                                $total_semester = ($curriculums_info['program_duration'] * 12 / $curriculums_info['semester_duration']);
                                echo $total_semester . ' * ' . $curriculums_info['registration_fee'] . ' = ' . number_format($total_semester * $curriculums_info['registration_fee'],2,'.','');
                                $registration_fee = $total_semester * $curriculums_info['registration_fee'];
                            }
                            ?> BDT
 <br>
                            <label>Lab Fee: </label>  
                           <?php   
                           echo $total_lab . ' * ' . $curriculums_info['lab_fee'] . ' = ' . number_format(($total_lab * $curriculums_info['lab_fee']),2,'.','');
                            $total_lab = $total_lab * $curriculums_info['lab_fee']; ?> BDT
                            <br>
                            <label>Library Fee: </label>  
                            <?php
                            $total_amount = 0;
                            if ($curriculums_info['semester_duration'] > 0) {

                                echo $total_semester . ' * ' . $curriculums_info['library_fee'] . ' = ' . number_format($total_semester * $curriculums_info['library_fee'],2,'.','');
                                $total_library_fee = $total_semester * $curriculums_info['library_fee'];
                                $total_amount = $total_amount + $total_tuition_fee + $registration_fee + $total_lab + $total_library_fee;
                            }
                            ?> BDT
                            <br>
                            -----------------------------------------------------------------------------------------------
                            <br>
                            <label>Total Fee  = </label>  
                            <?php
                            echo $total_amount;
                            ?>
                                                        BDT
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-success btn-md pull-right" type="submit">Submit</button>
                            </div>
                        </div>

                    </div>
                </form> 

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>


