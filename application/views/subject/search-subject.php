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
                    console.log(html);
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
                <h1 class="page-header"> Subject List</h1>
                <div class="col-md-12">  
                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading">Subject List by Faculty and Program  </div>
                        <div class="panel-body">


                            <?php if ($this->session->flashdata('success')) { ?> 

                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>  
                            <?php } ?>
                            <?php if ($this->session->flashdata('d_error')) { ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $this->session->flashdata('d_error'); ?>
                                </div> 
                            <?php } ?>  

                            <form class="" action="<?php echo base_url(); ?>subjects/view_subject_list" method="post" >



                                <div class="row">

                                    <div class="col-md-12"> 
                                        <div class="form-row">

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="department">Select Faculty</label>
                                                    <select class="form-control" id="faculty_id" name="faculty_id">
                                                        <option selected="">Select Faculty</option>
                                                        <?php for ($i = 0; $i < sizeof($faculty); $i++) { ?> 
                                                            <option <?php ?>  value="<?php echo $faculty[$i]->faculty_id; ?>"><?php echo $faculty[$i]->faculty_name; ?></option>
                                                        <?php } ?>
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="department">Select Department</label>
                                                    <select class="form-control" id="department_id" name="department_id">
                                                        <option selected="">Select Department</option>

                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="department">Select Program</label>
                                                    <select class="form-control program_id" id="program_id" name="program_id">
                                                        <option value="">Select Program</option>

                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="subject-type">Course Curriculum</label>

                                                    <select id="curriculum_id" name="curriculum_id" class="form-control">
                                                        <option value="">Select</option>

                                                    </select>
                                                </div> 
                                            </div>
                                        </div> <!-- End form row-->


                                        <div class="col-sm-12">
                                            <input type="submit" value="Search"  class="btn btn-primary pull-right nextBtn btn-md" /> 
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
