<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Payment list</h1>
                <div class="col-md-8">  


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

                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading">Add Student Fees By Semester</div>
                        <div class="panel-body">
                            <form action="<?php echo base_url(); ?>accounts/viewallprint" method="post">

                                 <div class="form-group">
                                    <label for="program_id">Program Name</label>
                                    <select class="form-control program_id" id="program_id" onchange="getPurposeList()" name="program_id">
                                        <option value="">Select Program</option>
                                        <?php for ($i = 0; $i < sizeof($programs); $i++) { ?>
                                            <option value="<?php echo $programs[$i]->program_id; ?>" <?php ?> ><?php echo $programs[$i]->program_name; ?></option><?php }
                                        ?>
                                    </select>  
                                </div> 
                                <div class="form-group">
                                    <label for="semester_id">Semester</label>
                                    <select class="form-control semester_id" id="semester_id" onchange="getPurposeList()" name="semester_id">
                                        <option value="">Select Semester</option>
                                        <?php for ($i = 0; $i < sizeof($semesters); $i++) { ?>
                                            <option value="<?php echo $semesters[$i]->semester_id; ?>" <?php ?> ><?php echo $semesters[$i]->semester_name; ?></option><?php }
                                        ?>
                                    </select>  
                                </div> 
                                <div class="form-group">
                                    <label for="session_id">Section</label>
                                    <select class="form-control section_id" id="session_id" onchange="getPurposeList()" name="session_id">
                                        <option value="">Select Section</option>
                                        <?php for ($i = 0; $i < sizeof($sections); $i++) { ?>
                                            <option value="<?php echo $sections[$i]->session_id; ?>" <?php ?> ><?php echo $sections[$i]->year; ?></option><?php }
                                        ?>
                                    </select>  
                                </div>  

                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
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

 