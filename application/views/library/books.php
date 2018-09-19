<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Book Management</h1>
                <div class="col-md-12">  
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
                        <div class="panel-heading">Add New Book</div>
                        <div class="panel-body">
                            <form action="<?= base_url() ?>library/book" method="post">
                                <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="publisher_name">Book name</label>
                                    <input type="text" name="publisher_name" id="publisher_name" class="form-control" />
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="publisher_name">Book Short name</label>
                                    <input type="text" name="publisher_name" id="publisher_name" class="form-control" />
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="remarks">Remarks</label>
                                    <textarea class="form-control" name="remarks"></textarea>
                                </div>  
                                

                                </div>
                                                                <div class="form-group col-md-12">

                                 <button type="submit" class="btn btn-primary mb-2 pull-right">Submit</button>
                                                                </div>
                            </form>
                        </div> 
                    </div>
                </div> 
                <div class="col-md-12 mt-3">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $total = 0;
                        for ($i = 0; $i < sizeof($publisherlist); $i++) {
                            ?> 
                            <tr>
                                <td><?php
                                    echo $i + 1;
                                    $total = $total + 1;
                                    ?>
                                </td>
                                <td><?php echo $publisherlist[$i]->publisher_name; ?></td>
                                <td><?php echo $publisherlist[$i]->publisher_phone; ?></td>
                                <td><?php echo $publisherlist[$i]->publisher_email; ?></td>
                                <td><?php echo $publisherlist[$i]->publisher_website; ?></td>
                                <td><?php echo $publisherlist[$i]->remarks; ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="<?= base_url() ?>library/delete_subcategory/<?= $publisherlist[$i]->publisher_id; ?>" class="btn btn-danger btn-xs" onclick="confirm('Are you want to delete this item?')"><i class="fa fa-trash"></i> Delete</a>
                                    </div>
                                </td>
                            </tr> 
                        <?php } ?>
                        <tr>
                            <th colspan="2">Total Books Found</th><td colspan="5"><?php echo $total; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>


