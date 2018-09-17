
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
                        <div class="panel-heading">Add Subject  </div>
                        <div class="panel-body">

                            <?php if ($this->session->flashdata('error1')) { ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $this->session->flashdata('error1'); ?>
                                </div> 
                            <?php } ?>

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

                            <form role="form" action="<?php echo base_url(); ?>subjects/save" method="post" class="student-entry-form">
                                <div class="row">

                                    <div class="col-md-12"> 
                                        <div class="form-row">

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="department">Select Faculty</label>
                                                    <select class="form-control" id="faculty_id" name="faculty_id">
                                                        <option selected="">Select Program</option>
                                                        <?php for ($i = 0; $i < sizeof($faculty); $i++) { ?> 
                                                            <option <?php ?>  value="<?php echo $faculty[$i]->faculty_id; ?>"><?php echo $faculty[$i]->faculty_name; ?></option>
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
                                                    <label for="department">Select Program</label>
                                                    <select class="form-control program_id" id="program_id" name="program_id">
                                                        <option selected="">Select Program</option>

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

                                                    </select>
                                                </div> 
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="subject-type">Subject Type</label>

                                                    <select name="subject-type" class="form-control">
                                                        <option value="">Select</option>
                                                        <option <?php ?> value="Theory">Theory</option> 
                                                        <option <?php ?> value="Practical">Practical</option>  
                                                    </select>
                                                </div> 
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="subject-name">Subject Name</label>
                                                    <input type="text" class="form-control" required="" value="" id="subject-name" name="subject-name" placeholder="Subject Name"> 

                                                </div> 
                                            </div>

                                        </div><!-- End form row--> 
                                        <div class="form-row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="subject-code">Subject Code</label>
                                                    <input type="text" class="form-control" required="" value="" id="subject-code" name="subject-code" placeholder="Subject Code"> 

                                                </div> 
                                            </div> 
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="credit">Credit</label> 
                                                    <input type="text" class="form-control" required="" value="" id="credit" name="credit" placeholder="credit"> 
                                                </div> 
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="subject-mark">Total Mark</label>
                                                    <input type="text" class="form-control" required="" id="subject-mark" value="" name="subject-mark" placeholder="Subject Mark">
                                                </div> 
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="author-name">Author Name</label>
                                                    <input type="text" class="form-control" required="" id="author-name" value="" name="author-name" placeholder="Author Name">
                                                </div> 
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="Publisher">Publisher</label>
                                                    <input type="text" class="form-control" required="" id="Publisher" value="" name="publisher" placeholder="Publisher">
                                                </div> 
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="publisher-year">Publish Year</label>
                                                    <input type="text" class="form-control" required="" id="publisher-year" value="" name="publish_year" placeholder="Publish Year">
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
