<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"> Program</h2>

                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">List of Programs  <span class="pull-right"> <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>programs/programs/-1/add">Add New Programs</a></span></div>
                    <div class="panel-body table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Name Of Faculty</th>
                                <th>Name Of Department</th>
                                <th>Name of Program</th>  
                                <th width="150">Action</th>
                            </tr>
                            <?php
                            $total = 0;
                            for ($i = 0; $i < sizeof($programs); $i++) {
                                ?> 
                                <tr>
                                    <td><?php
                                        echo $i + 1;
                                        $total = $total + 1;
                                        ?></td>
                                    <td><?php echo $faculty_name[$i]; ?></td> 
                                    <td><?php echo $department_name[$i]; ?></td>
                                    <td><?php echo $programs[$i]->program_name; ?></td>  
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                            <a href="<?php echo base_url(); ?>programs/programs/<?php echo $programs[$i]->program_id; ?>/edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                         <a href="<?php echo base_url(); ?>programs/status/<?php echo $programs[$i]->program_id; ?>" class="btn btn-<?php
                                                if ($programs[$i]->status == 'active') {
                                                    echo 'success';
                                                } else {
                                                    echo 'warning';
                                                }
                                                ?> btn-sm"><?php
                                                    if ($programs[$i]->status == 'active') {
                                                        echo 'Active';
                                                    } else {
                                                        echo 'De-active';
                                                    }
                                                    ?></a>
                                        </div>
                                    </td>
                                </tr> 
                            <?php } ?> 
                        </table>
                    </div> 
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

</div>
