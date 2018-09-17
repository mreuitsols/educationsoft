
<script type="text/javascript">


    $(document).ready(function() {

        $("#session_id").on("change", function() {
            var program_id = $('#program_id').val();
            var semester_id = $('#semester_id').val();
            var session_id = $('#session_id').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>ajax/select_subject/", //here we are calling our user controller and get_cities method with the country_id
                data: {'program_id': program_id, 'semester_id': semester_id, 'session_id': session_id},
                dataType: "text",
                success: function(html) {
                    console.log(html);
                    $('.course_name').html(html);
                    $('#subjectDiv').removeClass('hide');
                    $('#subjectDiv').addClass('show');

                }
            });
        });
        $("#program_id").on("change", function() {
            var program_id = $('#program_id').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>ajax/select_teaher/", //here we are calling our user controller and get_cities method with the country_id
                data: {'program_id': program_id},
                dataType: "text",
                success: function(html) {
                    console.log(html);
                    $('.teachers').html(html);

                }
            });
        });



    });

</script>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mark Insert</h1>
                <div class="col-md-12">  
                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading">Mark Insert Query</div>
                        <div class="panel-body"> 




                            <div class="row">
                                <div class="col-md-12">
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
                                </div>

                                <form action="<?php echo base_url(); ?>marks/markentry" method="post" >
                                    <div class="col-md-12">
                                        <h3>Create Routine</h3> 
                                        <table width="100%" class="table table-bordered">
                                            <tr><td>Select Program</td>
                                                <td>Select Semester</td>
                                                <td>Select Session</td> 
                                                <td>Select Section</td>
                                                <td>Select Subject</td>
                                                <td>Exam Type</td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <select  id="program_id" class="form-control " name="program_id">
                                                        <option value="" selected="">Select</option>
                                                        <?php for ($i = 0; $i < sizeof($programs); $i++) { ?> 
                                                            <option value="<?php echo $programs[$i]->program_id; ?>"><?php echo $programs[$i]->program_name; ?></option>
                                                        <?php } ?>
                                                    </select> 
                                                </td>


                                                <td>
                                                    <select  id="semester_id" class="form-control " name="semester_id">
                                                        <option value="" selected="">Select</option>
                                                        <?php for ($i = 0; $i < sizeof($semesters); $i++) { ?> 
                                                            <option value="<?php echo $semesters[$i]->semester_id; ?>"><?php echo $semesters[$i]->semester_name; ?></option>
                                                        <?php } ?>
                                                    </select> 
                                                </td>

                                                <td>
                                                    <select  id="session_id" class="form-control " name="session_id">
                                                        <option value="" selected="">Select</option>
                                                        <?php for ($i = 0; $i < sizeof($sessions); $i++) { ?> 
                                                            <option value="<?php echo $sessions[$i]->session_id; ?>"><?php echo $sessions[$i]->year; ?></option>
                                                        <?php } ?>
                                                    </select> 
                                                </td> 
                                                <td>
                                                    <select  id="session_id" class="form-control " name="section_id">
                                                        <option value="" selected="">Select</option>
                                                        <?php for ($i = 0; $i < sizeof($sections); $i++) { ?> 
                                                            <option value="<?php echo $sections[$i]->section_id; ?>"><?php echo $sections[$i]->section_name; ?></option>
                                                        <?php } ?>
                                                    </select> 
                                                </td> 

                                                <td id="subjectDiv">
                                                    <select name="coursee_id" class="course_name form-control" > 
                                                    </select> 
                                                </td>
                                                <td id="">
                                                    <select class="form-control" name="exam-type">
                                                        <option value="">Select</option>
                                                        <option value="Mid Exam">Mid Exam</option>
                                                        <option value="Final Exam">Final Exam</option>
                                                    </select>
                                                </td>
                                            </tr>

                                        </table>
                                        <input type="submit" onclick="submit();" value="submit" class="btn btn-primary btn-md margins pull-right" />
                                    </div>


                                </form>
                            </div>
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
