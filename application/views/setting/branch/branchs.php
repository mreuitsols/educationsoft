<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Branch </h1>

                <div class="row"> 
                    <div class="col-md-6 col-sm-12">  
                        <div class="panel panel-default">
                            <!-- Default panel contents --> 
                            <div class="panel-heading">
                                <?php
                                if ($branchEditData['branch_id'] != NULL) {
                                    echo 'Edit Branch';
                                } else {
                                    echo 'Add Branch';
                                }
                                ?>
                            </div>
                            <div class="panel-body">
                                <form action="<?php echo base_url(); ?>branchs/save_branch" method="post">
                                    <div class="form-group">
                                        <label for="branch_name">Branch Name</label>
                                        <input type="text" class="form-control" required="" id="branch_name" value="<?php echo $branchEditData['branch_name']; ?>" name="branch_name" placeholder="Branch Name">

                                        <input type="hidden" class="form-control" id="branch_id" value="<?php echo $branchEditData['branch_id']; ?>" name="branch_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" required="" value="<?php echo $branchEditData['address']; ?>" id="address" name="address" placeholder="Address">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_no">Phone No</label>
                                        <input type="text" class="form-control" required="" value="<?php echo $branchEditData['phone_no']; ?>" id="phone_no" name="phone_no" placeholder="Phone Number">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </form>
                            </div> 
                        </div>
                    </div> 
                    <div class="col-md-6 col-sm-12">  
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">List of Branch <span class="pull-right"><a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>branchs/branchs/-1/add">Add New Branch</a></span></div>
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>SL</th>
                                        <th>Name Of Branch</th>
                                        <th>Address</th>
                                        <th>Phone No</th>
                                        <th width="80">Action</th>
                                    </tr>
                                    <?php
                                    $total = 0;
                                    for ($i = 0; $i < sizeof($branchData); $i++) {
                                        ?> 
                                        <tr>
                                            <td><?php
                                                echo $i + 1;
                                                $total = $total + 1;
                                                ?></td>
                                            <td><?php echo $branchData[$i]->branch_name; ?></td>
                                            <td><?php echo $branchData[$i]->address; ?></td>
                                            <td><?php echo $branchData[$i]->phone_no; ?></td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                    <a href="<?php echo base_url(); ?>branchs/branchs/<?php echo $branchData[$i]->branch_id; ?>/edit" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                                    <!--<a href="<?php echo base_url(); ?>branchs/delete/<?php echo $branchData[$i]->branch_id; ?>" class="btn btn-danger btn-xs">Delete</a>-->
                                                </div>
                                            </td>
                                        </tr> 
                                    <?php } ?>
                                    <tr>
                                        <th colspan="2">Total Branch</th><td colspan="3"><?php echo $total; ?></td>
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