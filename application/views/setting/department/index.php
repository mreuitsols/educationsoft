<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Department </h1>
                <div class="col-md-6 col-sm-12">  
                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading"><?php
                            if ($edit_department['department_id'] != NULL) {
                                echo 'Edit Department';
                            } else {
                                echo 'Add Department';
                            }
                            ?>   </div>
                        <div class="panel-body"> 
                            <form action="<?php echo base_url(); ?>departments/save_department" method="post"> 
                                <div class="form-group">
                                    <label for="branch_name">Faculty Name</label> 
                                    <select class="form-control" id="faculty" class="faculty" name="faculty_id">
                                        <option selected="">Select Faculty</option>
                                        <?php foreach ($facultyData as $value) {
                                                                        
                                                                     ?>
                                            <option  <?php
                                            if ($edit_department['faculty_id'] == $value->faculty_id) {
                                                echo 'selected=""';
                                            };
                                            ?>  value="<?php echo $value->faculty_id; ?>"><?php echo $value->faculty_name; ?></option>
                                            <?php } ?>
                                    </select> 
                                    <input type="hidden" class="form-control" id="department_id" value="<?php echo $edit_department['department_id']; ?>" name="department_id">
                                </div>
                                <div class="form-group"> 
                                    <label for="department_name">Department Name</label>
                                    <input type="text" class="form-control" required="" id="department_name" value="<?php echo $edit_department['department_name']; ?>" name="department_name" placeholder="Department Name">
                                </div> 
                                <div class="form-group"> 
                                    <label for="sort_name">Sort Name</label>
                                    <input type="text" class="form-control" required="" id="sort_name" value="<?php echo $edit_department['sort_name']; ?>" name="sort_name" placeholder="Department Sort Name">
                                </div> 
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </form>
                        </div> 
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">  
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">List of Department <span class="pull-right"> <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>departments/departments/-1/add">Add New Department</a></span></div>
                        <div class="panel-body table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>SL</th>
                                    <th>Name Of Faculty</th>
                                    <th>Name of Department</th> 
                                    <th  width="150">Action</th>
                                </tr>
                                <?php
                                $total = 0;
                                for ($i = 0; $i < sizeof($departments); $i++) {
                                    ?> 
                                    <tr>
                                        <td><?php
                                            echo $i + 1;
                                            $total = $total + 1;
                                            ?></td>
                                        <td><?php echo $faculty_name[$i]; ?></td>
                                        <td><?php echo $departments[$i]->department_name; ?></td> 
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                <a href="<?php echo base_url(); ?>departments/departments/<?php echo $departments[$i]->department_id; ?>/edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit </a>
                                               
                                                <a href="<?php echo base_url(); ?>departments/status/<?php echo $departments[$i]->department_id; ?>" class="btn btn-<?php
                                                if ($departments[$i]->status == 'active') {
                                                    echo 'success';
                                                } else {
                                                    echo 'warning';
                                                }
                                                ?> btn-sm"><?php
                                                    if ($departments[$i]->status == 'active') {
                                                        echo 'Active';
                                                    } else {
                                                        echo 'De-active';
                                                    }
                                                    ?></a>
                                            </div>
                                        </td>
                                    </tr> 
                                <?php } ?>
                                <tr>
                                    <th colspan="2">Total Department </th><td colspan="2"><?php echo $total; ?></td>
                                </tr>

                            </table>
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

