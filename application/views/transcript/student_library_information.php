<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Student Library Information</h2>
                <div class="col-md-6">  
                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading">Student Library Information</div>
                        <div class="panel-body">
                            <form action="<?php echo base_url(); ?>programs/save" method="post">
                                <div class="form-group">
                                    <label for="progran_name">Student Id</label>
                                    <input type="text" class="form-control" required="" id="progran_name" name="progran_name" placeholder="Name of Program"> 
                                    <input type="hidden" class="form-control" required=""  id="program_id" name="program_id" placeholder="Name of Program"> 
                                </div> 


                                
                                  <div class="form-group">
                                    <label for="department">Semester</label>
                                    <select class="form-control" id="department_id" name="department_id">
                                        <option selected="">Select Semester</option>
                                       
                                    </select> 
                                </div>
                                
                               
                                 
                              
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </form>
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
