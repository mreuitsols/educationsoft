<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Semester </h2>

                <div class="row"> 
                    <div class="col-md-6">   

                        <?php if ($this->session->flashdata('error1')) { ?>
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $this->session->flashdata('error1'); ?>
                            </div> 
                        <?php } ?>   
                        <div class="panel panel-default">

                            <!-- Default panel contents --> 
                            <div class="panel-heading">  <?php if ($semesterEditData != NULL) { ?>Edit Semester <span class="pull-right"><a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>semesters/semesters/-1/add">Add New Semester</a></span> <?php
                                } else {
                                    echo 'Add Semester';
                                }
                                ?></div>
                            <div class="panel-body">
                                <form action="<?php echo base_url(); ?>semesters/save_semester" method="post">
                                    <div class="form-group">
                                        <label for="semester_name">Semester Name</label>
                                        <input type="text" class="form-control" required="" id="semester_name" value="<?php echo $semesterEditData['semester_name']; ?>" name="semester_name" placeholder="Semester Name">

                                        <input type="hidden" required="" class="form-control" id="semester_id" value="<?php echo $semesterEditData['semester_id']; ?>" name="semester_id">
                                    </div>

                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </form>
                            </div> 
                        </div>
                    </div> 
                    <div class="col-md-6">  
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div> 
                        <?php } ?>  
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">List of Semester</div>
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>SL</th>
                                        <th>Name Of Semester</th> 
                                        <th width="80">Action</th>
                                    </tr>
                                    <?php
                                    $total = 0;
                                    for ($i = 0; $i < sizeof($semesterData); $i++) {
                                        ?> 
                                        <tr>
                                            <td><?php
                                                echo $i + 1;
                                                $total = $total + 1;
                                                ?></td>
                                            <td><?php echo $semesterData[$i]->semester_name; ?></td> 
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                    <a href="<?php echo base_url(); ?>semesters/semesters/<?php echo $semesterData[$i]->semester_id; ?>/edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                                    <!--<a href="<?php // echo base_url(); ?>semesters/delete/<?php echo $semesterData[$i]->semester_id; ?>" onclick="customAlert();" class="btn btn-danger btn-xs">Delete</a>-->
                                                </div>
                                            </td>
                                        </tr> 
                                    <?php } ?>
                                    <tr>
                                        <th colspan="2">Total Semester</th><td colspan="2"><?php echo $total; ?></td>
                                    </tr>

                                </table>
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

<script>
    function customAlert() {
        confirm("Do you want to Delete it?");
    }
</script>