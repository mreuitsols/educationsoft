<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Semester Transcript</h1>
                <div class="col-md-8">  
                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading"> Semester Transcript </div>
                        <div class="panel-body"> 
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <?php if ($this->session->flashdata('d_error')) { ?>
                                        <div class="alert alert-warning alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <?php echo $this->session->flashdata('d_error'); ?>
                                        </div> 
                                    <?php } ?>  
                                </div>

                                <form action="<?php echo base_url(); ?>marks/viewtranscript" method="post" >
                                    <div class="col-md-12">
                                        <h3>Create Routine</h3> 
                                        <table width="100%" class="table table-bordered">
                                            <tr><td>Student ID</td> 
                                                <td>Semester</td>
                                                  <td>Exam Type</td>
                                            </tr>
                                            <tr>

                                               
                                                <td><input type="text" name="student_id" class="form-control" /></td>
                                                <td>
                                                <select class="form-control" required="" name="semester_id">
                                                    <?php for ($i = 0; $i < sizeof($semesters); $i++) { ?> 
                                                        <option value="<?php echo $semesters[$i]->semester_id; ?>"><?php echo $semesters[$i]->semester_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                                <td id="">
                                                    <select class="form-control" name="exam-type"> 
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
