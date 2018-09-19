<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Author</h1>
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
                        <div class="panel-heading">Add New Author</div>
                        <div class="panel-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="author_name">Author name</label>
                                    <input type="text" name="author_name" value="<?= $name_autor;?>" id="author_name" class="form-control" />
                                </div>   
                                <div class="form-group">
                                    <label for="author_details">Details</label>
                                    <textarea class="form-control" name="author_details"><?= $name_detaiils;?></textarea>
                                </div>  
                                <button type="submit" name="author_submit" class="btn btn-primary mb-2">Submit</button>
                            </form>
                        </div> 
                    </div>
                </div> 
                <div class="col-md-8">
                   
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Author Details</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $i=0;
                         foreach ($authorlist as $single_list) {

                            $i++;
                                                            
                            ?> 
                            <tr>
                                <td>
                                    <?= $i?>
                                    
                                </td>
                                <td><?php echo $single_list->author_name; ?></td>
                                <td><?php echo $single_list->author_details; ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                        <a href="<?= base_url() ?>library/authors/<?= $single_list->author_id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                         <a href="<?= base_url() ?>library/delete_author/<?= $single_list->author_id; ?>" class="btn btn-danger btn-xs" onclick="confirm('Are you want to delete this item?')"><i class="fa fa-trash"></i> Delete</a>
                                    </div>
                                </td>
                            </tr> 
                        <?php } ?>
                        <tr>
                            <th colspan="2">Total Author</th><td colspan="5"><?php echo $i; ?></td>
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


