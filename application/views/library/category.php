<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category</h1>
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
                        <div class="panel-heading">Add Category</div>
                        <div class="panel-body">
                            <form action="<?= base_url() ?>library/add_category" method="post">
                                <div class="form-group">
                                    <label for="book_cat_name">Category name</label>
                                    <input type="text" name="book_cat_name" class="form-control" />
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
                            <th>Name Of Category</th>
                            <th>Remarks</th>
                            <th width="150">Action</th>
                        </tr>
                        <?php
                        $total = 0;
                        for ($i = 0; $i < sizeof($categorylist); $i++) {
                            ?> 
                            <tr>
                                <?php $id = $categorylist[$i]->book_catid; ?>
                                <td><?php
                                    echo $i + 1;
                                    $total = $total + 1;
                                    ?></td>
                                <td><?php echo $categorylist[$i]->book_cat_name; ?></td>
                                <td><?php echo $categorylist[$i]->remarks; ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="<?= base_url() ?>library/delete_category/<?= $id ?>" class="btn btn-danger btn-xs" onclick="confirm('Are you want to delete this item?')"><i class="fa fa-trash"></i> Delete</a>
                                    </div>
                                </td>
                            </tr> 
                        <?php } ?>
                        <tr>
                            <th colspan="2">Total Category</th><td colspan="3"><?php echo $total; ?></td>
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


