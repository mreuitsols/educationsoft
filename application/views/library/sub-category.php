<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">SubCategories</h1>
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
                        <div class="panel-heading">Add Sub Category</div>
                        <div class="panel-body">
                            <form action="<?= base_url() ?>library/add_subcategory" method="post">
                                <div class="form-group">
                                    <label for="book_cat_name">Parent Category name</label>
                                    <select class="form-control" name="book_main_catid">

                                        <?php
                                        $total = 0;
                                        for ($i = 0; $i < sizeof($categorylist); $i++) {
                                            ?> 
                                            <option value="<?= $categorylist[$i]->book_catid; ?>"><?php echo $categorylist[$i]->book_cat_name; ?></option>
                                        <?php } ?>            
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="book_sub_cat_name">Subcategory Name</label>
                                    <input type="text" name="category_name" id="category_name" class="form-control" />
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
                            <th>Category Name</th>
                            <th>Parent Category</th>
                            <th>Remarks</th>
                            <th width="150">Action</th>
                        </tr>
                        <?php
                        $total = 0;
                        for ($i = 0; $i < sizeof($subcategorylist); $i++) {
                            ?> 
                            <tr>
                                <td><?php
                                    echo $i + 1;
                                    $total = $total + 1;
                                    ?></td>
                                <td><?php echo $subcategorylist[$i]->category_name; ?></td>
                                <td><?php 
                                        $book_categories = $this->General_model->select_any_where('book_categories', array('book_catid' =>$subcategorylist[$i]->book_main_catid));
                                        echo $book_categories['book_cat_name'];
                                        ?></td>
                                <td><?php echo $subcategorylist[$i]->remarks; ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="<?= base_url() ?>library/delete_subcategory/<?= $subcategorylist[$i]->subcat_id; ?>" class="btn btn-danger btn-xs" onclick="confirm('Are you want to delete this item?')"><i class="fa fa-trash"></i> Delete</a>
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


