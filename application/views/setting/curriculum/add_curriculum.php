
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

    });

</script>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Course Curriculum </h3>
                <div class="panel panel-info">
                    <!-- Default panel contents --> 
                    <div class="panel-heading">Add New Curriculum </div>
                    <div class="panel-body">

                        <form role="form" action="" method="post" class="student-entry-form">
                            <div class="row">
 
                                <div class="col-md-12"> 
                                    <div class="form-row">

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="department">Select Faculty</label>
                                                <?php echo $curriculumData['faculty_id']; ?>
                                                <select class="form-control" id="faculty_id" name="faculty_id">
                                                    <option selected="">Select Program</option>
                                                    <?php for ($i = 0; $i < sizeof($faculty); $i++) { ?> 
                                                        <option <?php
                                                        if ($curriculumData['faculty_id'] == $faculty[$i]->faculty_id) {
                                                            echo 'selected';
                                                        }
                                                        ?>  value="<?php echo $faculty[$i]->faculty_id; ?>"><?php echo $faculty[$i]->faculty_name; ?></option>
                                                        <?php } ?>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-sm-4"> 
                                            <div class="form-group">
                                                <label for="department_id">Select Department</label>
                                                <select class="form-control department_id" id="department_id" name="department_id">
                                                    <option selected="">Select Department</option> 
                                                    <?php for ($i = 0; $i < sizeof($departments); ++$i) { ?>
                                                        <option <?php
                                                        if ($curriculumData['department_id'] == $departments[$i]->department_id) {
                                                            echo 'selected';
                                                        }
                                                        ?> value="<?php echo $departments[$i]->department_id; ?>"><?php echo $departments[$i]->department_name; ?></option>
                                                    <?php } ?>
                                                </select> 
                                            </div> 
                                        </div>
                                        <div class="col-sm-4"> 
                                            <div class="form-group">
                                                <label for="program_id">Select Program</label>
                                                <select class="form-control program_id" id="program_id" name="program_id">
                                                    <option selected="">Select program</option>
                                                    <?php for ($i = 0; $i < sizeof($programs); ++$i) { ?>
                                                        <option <?php
                                                        if ($curriculumData['program_id'] == $programs[$i]->program_id) {
                                                            echo 'selected';
                                                        }
                                                        ?> value="<?php echo $programs[$i]->program_id; ?>"><?php echo $programs[$i]->program_name; ?></option>
                                                    <?php } ?>

                                                </select> 
                                            </div> 
                                        </div>

                                    </div> <!-- End form row-->

                                    <div class="form-row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="semester-duration">Program Type</label>

                                                <select name="semester_duration" class="form-control">
                                                    <option value="">Select</option>
                                                    <option <?php
                                                    if ($curriculumData['program_type'] == 'Day') {
                                                        echo 'selected=""';
                                                    }
                                                    ?>  value="Day">Day</option> 
                                                    <option <?php
                                                    if ($curriculumData['program_type'] == 'Evening') {
                                                        echo 'selected=""';
                                                    }
                                                    ?>value="Evening">Evening</option>  
                                                </select>

                                            </div> 

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="course_curriculum_name">Course Curriculum Name</label>
                                                <input type="text" class="form-control" required="" value="<?php echo $curriculumData['curriculum_name']; ?>" id="course_curriculum_name" name="curriculum_name" placeholder="Exp: Curriculum 2017-2018"> 
                                                <input type="hidden" class="form-control" required="" value="<?php echo $curriculumData['curriculum_id']; ?>" id="program_id" name="probidhan_id" placeholder="Name of Program"> 
                                            </div> 
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="program_duration">Program Duration</label>
                                                <select class="form-control" name="program_duration">
                                                    <option <?php
                                                    if ($curriculumData['program_duration'] == '1 Year') {
                                                        echo 'selected=""';
                                                    }
                                                    ?> value="1 Year">1 Year</option>
                                                    <option  <?php
                                                    if ($curriculumData['program_duration'] == '2 Year') {
                                                        echo 'selected=""';
                                                    }
                                                    ?>  value="2 Year">2 Year</option>
                                                    <option  <?php
                                                    if ($curriculumData['program_duration'] == '3 Year') {
                                                        echo 'selected=""';
                                                    }
                                                    ?>  value="3 Year">3 Year</option>
                                                    <option  <?php
                                                    if ($curriculumData['program_duration'] == '4 Year') {
                                                        echo 'selected=""';
                                                    }
                                                    ?>  value="4 Year">4 Year</option>
                                                </select> 
                                            </div> 

                                        </div> 
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="semester-duration">Semester Duration</label>

                                                <select name="semester_duration" class="form-control">
                                                    <option <?php
                                                    if ($curriculumData['semester_duration'] == '2 Month') {
                                                        echo 'selected=""';
                                                    }
                                                    ?>  value="2 Month">2 Month</option> 
                                                    <option <?php
                                                    if ($curriculumData['semester_duration'] == '3 Month') {
                                                        echo 'selected=""';
                                                    }
                                                    ?>value="3 Month">3 Month</option> 
                                                    <option <?php
                                                    if ($curriculumData['semester_duration'] == '4 Month') {
                                                        echo 'selected=""';
                                                    }
                                                    ?>value="4 Month">4 Month</option> 
                                                    <option <?php
                                                    if ($curriculumData['semester_duration'] == '5 Month') {
                                                        echo 'selected=""';
                                                    }
                                                    ?>value="5 Month">5 Month</option> 
                                                    <option <?php
                                                    if ($curriculumData['semester_duration'] == '6 Month') {
                                                        echo 'selected=""';
                                                    }
                                                    ?>value="6 Month">6 Month</option> 
                                                </select>

                                            </div> 


                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="semester-duration">Total Credit</label>
                                                <input type="number" class="form-control" required="" id="creadit" value="<?php echo $curriculumData['creadit']; ?>" name="creadit" placeholder="Total Creadit">
                                            </div> 

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="per_creadit_fee"> Per Credit Fee (Per Semester)</label>
                                                <input type="number" class="form-control" required="" id="per_creadit_fee" value="<?php echo $curriculumData['per_creadit_fee']; ?>" name="per_creadit_fee" placeholder="">
                                            </div> 

                                        </div>

                                    </div><!-- End form row-->

                                    <div class="form-row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="lab_fee"> Lab Fee (Per Semester)</label>
                                                <input type="number" class="form-control" required="" id="lab_fee" value="<?php echo $curriculumData['lab_fee']; ?>" name="lab_fee" placeholder="">
                                            </div> 

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="library_fee"> Library Fee (Per Semester)</label>
                                                <input type="number" class="form-control" required="" id="library_fee" value="<?php echo $curriculumData['library_fee']; ?>" name="library_fee" placeholder="">
                                            </div> 

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="tuition_fee">Registration Fee (Per Semester)</label>
                                                <input type="number" class="form-control" required="" id="registration_fee" value="<?php echo $curriculumData['registration_fee']; ?>" name="registration_fee" placeholder="">
                                            </div>  
                                        </div>
                                    </div>


                                    <div class="col-sm-12">

                                        <input type="submit" value="submit"  class="btn btn-primary nextBtn btn-md" /> 
                                    </div>


                                </div>

                            </div> 


                        </form>

                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<script>

    $(function () {
        $("#discount, #amount").on("keydown keyup", sum);
        function sum() {
            $("#total_amount").val(Number($("#amount").val()) - Number($("#discount").val()));
        }
    });


//    $(document).ready(function () {
//        var amount = 0;
//        $('#amount').on('keyup', function () {
//            amount += $(this).val();
//        });
//
//        $('#total_amount').value(amount);
//
//    });

</script>