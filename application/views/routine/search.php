<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Routine View</h1>
                <div class="col-md-12">  
                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading">Select Options  </div>
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

                            <form class="form-horizontal" action="<?php echo base_url(); ?>routines/view" method="post" >

                                <table class="table table-bordered">
                                    <tr>
                                        <th>Program Name</th>
                                        <th>Semester</th> 
                                        <th>Session</th> 
                                        <th>Shift</th> 
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="program_id">
                                                <?php for ($i = 0; $i < sizeof($programs); $i++) { ?> 
                                                    <option value="<?php echo $programs[$i]->program_id; ?>"><?php echo $programs[$i]->program_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="semester_id">
                                                <?php for ($i = 0; $i < sizeof($semesters); $i++) { ?> 
                                                    <option value="<?php echo $semesters[$i]->semester_id; ?>"><?php echo $semesters[$i]->semester_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td> 
                                        <td> 
                                            <select class="form-control" name="session_id">
                                                <?php for ($i = 0; $i < sizeof($sessions); $i++) { ?> 
                                                    <option value="<?php echo $sessions[$i]->session_id; ?>"><?php echo $sessions[$i]->year; ?></option>
                                                <?php } ?>
                                            </select>

                                        </td>
                                        
                                        <td>
                                                    <select id="shift" name="shift" class="form-control">
                                                        <option selected="">Shift</option>
                                                        <option value="1st Shift">1st Shift</option>
                                                        <option value="2nd Shift">2nd Shift</option>
                                                    </select>
                                                </td>

                                    </tr>
                                </table> 
                                <input type="submit" name="submit" value="Search" class="btn btn-success btn-sm pull-left"  />
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
