<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Publisher</h1>
                <div class="col-md-4">  
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
                        <div class="panel-heading">Add New Publisher</div>
                        <div class="panel-body">
                            <form action="<?= base_url() ?>library/add_publishers" method="post">

                                <div class="form-group">
                                    <label for="publisher_name">Publisher Name</label>
                                    <input type="text" name="publisher_name" id="publisher_name" class="form-control" />
                                </div> 

                                <div class="form-group">
                                    <label for="publisher_name">Publisher Phone</label>
                                    <input type="text" name="publisher_phone" id="publisher_phone" class="form-control" />
                                </div> 
                                <div class="form-group">
                                    <label for="publisher_email">Publisher Email</label>
                                    <input type="email" name="publisher_email" id="publisher_email" class="form-control" />
                                </div> 
                                <div class="form-group">
                                    <label for="publisher_website">Publisher Website</label>
                                    <input type="url" name="publisher_website" id="publisher_website" class="form-control" />
                                </div>   
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <textarea class="form-control" name="remarks"></textarea>
                                </div>  
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </form>
                        </div> 
                    </div>
                </div> 
                <div class="col-md-8">
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
                            <th colspan="2">Total Publisher</th><td colspan="5"><?php echo $total; ?></td>
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


