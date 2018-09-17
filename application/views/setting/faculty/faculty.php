<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Faculty </h2>
                <div class="row"> 
                    <div class="col-md-6 col-sm-12">  
                        <div class="panel panel-default">
                            <!-- Default panel contents --> 
                            <div class="panel-heading"> <?php
                                if ($facultyEditData['faculty_id'] != NULL) {
                                    echo 'Edit Faculty';
                                } else {
                                    echo 'Add Faculty';
                                }
                                ?>   
                            </div> 



                            <div class="panel-body">
                                <?php if ($this->session->flashdata('error')) { ?>
                                    <div class="alert alert-warning alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <?php echo $this->session->flashdata('error'); ?>
                                    </div> 
                                <?php }
                                ?>   
                                <form action="<?php echo base_url(); ?>faculties/save_faculty" method="post">
                                    <div class="form-group">
                                        <label for="branch_name">Branch Name</label>
                                        <select class="form-control" name="branch_id">
                                            <option selected="" value="">Select Branch</option>
                                            <?php for ($i = 0; $i < sizeof($branch_list); $i++) { ?> 
                                                <option <?php
                                                if ($facultyEditData['branch_id'] == $branch_list[$i]->branch_id) {
                                                    echo 'selected=""';
                                                };
                                                ?> value="<?php echo $branch_list[$i]->branch_id; ?>"><?php echo $branch_list[$i]->branch_name; ?></option>
                                                <?php } ?>
                                        </select>
                                        <input type="hidden" class="form-control" id="faculty_id" value="<?php echo $facultyEditData['faculty_id']; ?>" name="faculty_id">
                                    </div>

                                    <div class="form-group">
                                        <label for="branch_name">Faculty Name</label>
                                        <input type="text" class="form-control" required="" id="faculty_name" value="<?php echo $facultyEditData['faculty_name']; ?>" name="faculty_name" placeholder="Faculty Name">

                                    </div>


                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </form>
                            </div> 
                        </div>
                    </div> 
                    <div class="col-md-6 col-sm-12">  
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">List of Faculty <span class="pull-right"> <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>faculties/faculties/-1/add">Add New Faculty</a></span></div>
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>SL</th>
                                        <th>Name of Branch</th> 
                                        <th>Name Of Faculty</th>
                                        <th width="150">Action</th>
                                    </tr>
                                    <?php
                                    $total = 0;
                                    for ($i = 0; $i < sizeof($facultyData); $i++) {
                                        ?> 
                                        <tr>
                                            <td><?php
                                                echo $i + 1;
                                                $total = $total + 1;
                                                ?></td>
                                            <td><?php echo $branch_name[$i]; ?></td> 
                                            <td><?php echo $facultyData[$i]->faculty_name; ?></td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                    <a href="<?php echo base_url(); ?>faculties/faculties/<?php echo $facultyData[$i]->faculty_id; ?>/edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                                    <a href="<?php echo base_url(); ?>faculties/status/<?php echo $facultyData[$i]->faculty_id; ?>" class="btn btn-<?php
                                                    if ($facultyData[$i]->status == 'active') {
                                                        echo 'success';
                                                    } else {
                                                        echo 'warning';
                                                    }
                                                    ?> btn-sm"><?php
                                                       if ($facultyData[$i]->status == 'active') {
                                                           echo 'Active';
                                                       } else {
                                                           echo 'De-active';
                                                       }
                                                       ?></a>
                                                    <!--<a href="<?php echo base_url(); ?>faculties/delete/<?php echo $facultyData[$i]->faculty_id; ?>" class="btn btn-danger btn-xs">Delete</a>-->
                                                </div>
                                            </td>
                                        </tr> 
<?php } ?>
                                    <tr>
                                        <th colspan="2">Total Faculty </th><td colspan="2"><?php echo $total; ?></td>
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



