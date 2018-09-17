<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Session </h2>

                <div class="row"> 
                    <div class="col-md-6 col-sm-12">  
                        <div class="panel panel-default">
                           
                            <!-- Default panel contents --> 
                            <div class="panel-heading">  <?php if($sessionEditData != NULL) { ?>Edit Session <span class="pull-right"><a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>sessions/sessions/-1/add">Add New Session</a></span> <?php }else{ echo 'Add Session';} ?></div>
                            <div class="panel-body">
                                <form action="<?php echo base_url(); ?>sessions/save_session" method="post">
                                    <div class="form-group">
                                        <label for="session_name">Session Name</label>
                                        <input type="text" class="form-control" required="" id="session_name" value="<?php echo $sessionEditData['year']; ?>" name="session_name" placeholder="Session Year">

                                        <input type="hidden" required="" class="form-control" id="session_id" value="<?php echo $sessionEditData['session_id']; ?>" name="session_id">
                                    </div>
                                     
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </form>
                            </div> 
                        </div>
                    </div> 
                    <div class="col-md-6 col-sm-12">  
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">List of Session</div>
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="40">SL</th>
                                        <th>Name Of Session</th> 
                                        <th width="60">Action</th>
                                    </tr>
                                    <?php
                                    $total = 0;
                                    for ($i = 0; $i < sizeof($sessionData); $i++) {
                                        ?> 
                                        <tr>
                                            <td><?php
                                                echo $i + 1;
                                                $total = $total + 1;
                                                ?></td>
                                            <td><?php echo $sessionData[$i]->year; ?></td> 
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                    <a href="<?php echo base_url(); ?>sessions/sessions/<?php echo $sessionData[$i]->session_id; ?>/edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                                    <!--<a href="<?php echo base_url(); ?>sessions/delete/<?php echo $sessionData[$i]->session_id; ?>" class="btn btn-danger btn-xs">Delete</a>-->
                                                </div>
                                            </td>
                                        </tr> 
                                    <?php } ?>
                                    <tr>
                                        <th colspan="2">Total Session</th><td colspan="2"><?php echo $total; ?></td>
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