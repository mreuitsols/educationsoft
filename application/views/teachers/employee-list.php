<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Employee List</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Employee List
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">  

                                <table width="100%" class="table table-bordered " id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Employee Id</th>
                                            <th>Employee Name</th>
                                            <th>Contact Number</th>
                                            <th>Employee Post</th>
                                            <th>Email</th>

                                            <th width="200" class="text-center">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < sizeof($employees); $i++) { ?> 
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $employees[$i]->employee_id; ?></td>
                                                <td><?php echo $employees[$i]->employee_name; ?></td>
                                                <td><?php echo $employees[$i]->mobile_no; ?></td>
                                                <td><?php echo $employees[$i]->post; ?></td>
                                                <td><?php echo $employees[$i]->email; ?></td>
                                                <td>
                                                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                                        <a href="<?php echo base_url(); ?>teachers/edit/<?php echo $employees[$i]->e_id; ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                                        <a href="<?php echo base_url(); ?>teachers/view/<?php echo $employees[$i]->e_id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View</a>
                                                        <a href="" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> Print</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
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
