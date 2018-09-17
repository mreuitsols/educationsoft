
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
//        



    });

</script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Subject</h2>
                <div class="col-md-12">  
                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading">Edit Subject  </div>
                        <div class="panel-body">


                            <?php if ($this->session->flashdata('success')) { ?> 

                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>  
                            <?php } ?>
                            <?php if ($this->session->flashdata('error')) { ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div> 
                            <?php } ?>  

                            <form role="form" action="<?php echo base_url(); ?>subjects/update" method="post" class="student-entry-form">
                                <div class="row">

                                    <div class="col-md-12"> 
                                        <div class="form-row">

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" required="" value="<?php echo $subjectEditData['subject_id']; ?>" id="subject_id" name="subject_id" placeholder=""> 
                                                     
                                                    <label for="department">Select Faculty</label>
                                                    <select class="form-control" id="faculty_id" name="faculty_id">
                                                        <option selected="">Select Faculty</option>
                                                        <?php for ($i = 0; $i < sizeof($faculty); $i++) { ?> 
                                                            <option <?php
                                                            if ($subjectEditData['faculty_id'] == $faculty[$i]->faculty_id) {
                                                                echo 'selected';
                                                            }
                                                            ?>   value="<?php echo $faculty[$i]->faculty_id; ?>"><?php echo $faculty[$i]->faculty_name; ?></option>
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
                                                            if ($subjectEditData['department_id'] == $departments[$i]->department_id) {
                                                                echo 'selected';
                                                            }
                                                            ?> value="<?php echo $departments[$i]->department_id; ?>"><?php echo $departments[$i]->department_name; ?></option>
                                                            <?php } ?>
                                                    </select> 
                                                </div> 
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="department">Select Program</label>
                                                    <select class="form-control program_id" id="program_id" name="program_id">
                                                        <option selected="">Select Program</option>
                                                        <?php for ($i = 0; $i < sizeof($programs); ++$i) { ?>
                                                            <option <?php
                                                            if ($subjectEditData['program_id'] == $programs[$i]->program_id) {
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
                                                    <label for="curriculum_id">Curriculum</label>

                                                    <select id="curriculum_id" name="curriculum_id" class="form-control">
                                                        <option value="">Select</option>
                                                        <option selected="" value="<?php echo $curriculums['curriculum_id']; ?>"><?php echo $curriculums['curriculum_name']; ?></option>

                                                    </select>
                                                </div> 
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="subject-type">Subject Type</label>

                                                    <select name="subject-type" class="form-control">
                                                        <option value="">Select</option>
                                                        <option <?php
                                                        if ($subjectEditData['subject_type'] == 'Theory') {
                                                            echo 'selected=""';
                                                        }
                                                        ?> value="Theory">Theory</option> 
                                                        <option <?php
                                                        if ($subjectEditData['subject_code'] == 'Practical') {
                                                            echo 'selected=""';
                                                        }
                                                        ?>  value="Practical">Practical</option>  
                                                    </select>
                                                </div> 
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="subject-name">Subject Name</label>
                                                    <input type="text" class="form-control" required="" value="<?php echo $subjectEditData['subject_name']; ?>" id="subject-name" name="subject-name" placeholder="Subject Name"> 

                                                </div> 
                                            </div>

                                        </div><!-- End form row--> 
                                        <div class="form-row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="subject-code">Subject Code</label>
                                                    <input type="text" class="form-control" required="" value="<?php echo $subjectEditData['subject_code']; ?>" id="subject-code" name="subject-code" placeholder="Subject Code"> 

                                                </div> 
                                            </div> 
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="credit">Credit</label> 
                                                    <input type="text" class="form-control" required="" value="<?php echo $subjectEditData['credit']; ?>" id="credit" name="credit" placeholder="credit"> 
                                                </div> 
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="subject-mark">Total Mark</label>
                                                    <input type="text" class="form-control" required="" id="subject-mark" value="<?php echo $subjectEditData['subject_mark']; ?>" name="subject-mark" placeholder="Subject Mark">
                                                </div> 
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="author-name">Author Name</label>
                                                    <input type="text" class="form-control" required="" id="author-name" value="<?php echo $subjectEditData['author_name']; ?>" name="author-name" placeholder="Author Name">
                                                </div> 
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="Publisher">Publisher</label>
                                                    <input type="text" class="form-control" required="" id="Publisher" value="<?php echo $subjectEditData['publisher']; ?>" name="publisher" placeholder="Publisher">
                                                </div> 
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="publisher-year">Publish Year</label>
                                                    <input type="text" class="form-control" required="" id="publisher-year" value="<?php echo $subjectEditData['publish_year']; ?>" name="publish_year" placeholder="Publish Year">
                                                </div> 
                                            </div> 
                                        </div><!-- End form row--> 
                                        <div class="col-sm-12">
                                            <input type="submit" value="submit"  class="btn btn-primary pull-right nextBtn btn-md" /> 
                                        </div> 
                                    </div> 
                                </div>  
                            </form> 
                        </div> 
                    </div>
                </div> 
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
