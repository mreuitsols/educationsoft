

<script type="text/javascript">


    $(document).ready(function () {
        $('#student_id').keyup(function () {

            var student_id = $(this).val(); // Get username textbox using $(this)
//alert(student_id);
            var Result = $('#result'); // Get ID of the result DIV where we display the results

            if (student_id.length > 2) { // if greater than 2 (minimum 3) 
//                var dataPass = 'action=availability&username=' + username;
                $.ajax({// Send the username val to available.php
                    type: 'POST',
                    data: {student_id: student_id},
                    url: '<?php echo base_url(); ?>ajax/fetch',
                    success: function (responseText) { // Get the result
                      
                            Result.html(responseText);
                            $('#student_id').attr('style', 'border-color:#33c326;box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #33c326;'); 
                    }
                });
            } else {
                Result.html('<span style="color: #c33227" title="Token"><i class="fa fa-times "></i></span>');
                $('#student_id').attr('style', 'border-color:#c33227;box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #c33227;');
            }
            if (student_id.length == 0) {
                Result.html('');
            }
        });




    });




</script>



<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"> Search Students</h2>
            </div>
            <div class="col-md-12">

                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div> 
                <?php } ?>  
            </div>

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Search Students
                    </div>
                    <div class="panel-body"> 
                        <form action="<?php echo base_url(); ?>students/view_student" method="post">
                            <div class="form-group">
                                <label for="branch_name">Program</label>
                                <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" name="program_id">
                                    <?php for ($i = 0; $i < sizeof($programs); $i++) { ?> 
                                        <option value="<?php echo $programs[$i]->program_id; ?>"><?php echo $programs[$i]->program_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone_no">Semester</label>
                                <select class="form-control" name="semester_id">
                                    <?php for ($i = 0; $i < sizeof($semesters); $i++) { ?> 
                                        <option value="<?php echo $semesters[$i]->semester_id; ?>"><?php echo $semesters[$i]->semester_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address">Session</label>
                                <select class="form-control" name="session_id">
                                    <?php for ($i = 0; $i < sizeof($session); $i++) { ?> 
                                        <option value="<?php echo $session[$i]->session_id; ?>"><?php echo $session[$i]->year; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="phone_no">Section</label>
                                <select class="form-control" name="section_id">
                                    <?php for ($i = 0; $i < sizeof($sections); $i++) { ?> 
                                        <option value="<?php echo $sections[$i]->section_id; ?>"><?php echo $sections[$i]->section_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </form>  
                    </div>
                </div>
            </div>
            <div class="col-lg-6"> 
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Search Student
                    </div>
                    <div class="panel-body"> 
                        <form action="<?php echo base_url(); ?>students/student_list" method="post">
                            <div class="form-group">
                                <label for="branch_name">Student ID</label>
                                <input type="text" value="" required="" id="student_id" class="form-control" name="student_id" placeholder="Student ID"/>
                                <span class="pull-right" id="result"></span>
                            </div> 
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
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
