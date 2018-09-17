<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Section </h2>

                <div class="row"> 
                    <div class="col-md-6 col-sm-12">  
                        <div class="panel panel-default">
                           
                            <!-- Default panel contents --> 
                            <div class="panel-heading">  <?php if($sectionEditData != NULL) { ?>Edit Section <span class="pull-right"><a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>sections/sections/-1/add">Add New Section</a></span> <?php }else{ echo 'Add Section';} ?></div>
                            <div class="panel-body">
                                <form action="<?php echo base_url(); ?>sections/save_section" method="post">
                                    <div class="form-group">
                                        <label for="section_name">Section Name</label>
                                        <input type="text" class="form-control" required="" id="section_name" value="<?php echo $sectionEditData['section_name']; ?>" name="section_name" placeholder="Section Year">

                                        <input type="hidden" required="" class="form-control" id="section_id" value="<?php echo $sectionEditData['section_id']; ?>" name="section_id">
                                    </div>
                                     
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </form>
                            </div> 
                        </div>
                    </div> 
                    <div class="col-md-6 col-sm-12">  
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">List of Section</div>
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="40">SL</th>
                                        <th>Name Of Section</th> 
                                        <th width="80">Action</th>
                                    </tr>
                                    <?php
                                    $total = 0;
                                    for ($i = 0; $i < sizeof($sectionData); $i++) {
                                        ?> 
                                        <tr>
                                            <td><?php
                                                echo $i + 1;
                                                $total = $total + 1;
                                                ?></td>
                                            <td><?php echo $sectionData[$i]->section_name; ?></td> 
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                    <a href="<?php echo base_url(); ?>sections/sections/<?php echo $sectionData[$i]->section_id; ?>/edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                                    <!--<a href="<?php echo base_url(); ?>sections/delete/<?php echo $sectionData[$i]->section_id; ?>/edit" class="btn btn-danger btn-xs">Delete</a>-->
                                                </div>
                                            </td>
                                        </tr> 
                                    <?php } ?>
                                    <tr>
                                        <th colspan="2">Total Section</th><td colspan="2"><?php echo $total; ?></td>
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