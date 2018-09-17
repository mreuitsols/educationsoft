<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Department  </h1>

                <div class="row"> 
                    <div class="col-md-6">  
                        <div class="panel panel-default">
                            <!-- Default panel contents --> 
                            <div class="panel-heading">Add Department  </div>
                            <div class="panel-body">
                                <form action="<?php echo base_url(); ?>departments/save_department" method="post"> 

                                    <div class="form-group">
                                        <label for="branch_name">Faculty Name</label> 
                                        <select class="form-control" id="faculty" class="faculty" name="faculty_id">
                                            <option selected="">Select Faculty</option>
                                            <?php for ($i = 0; $i < sizeof($facultyData); $i++) { ?> 
                                                <option  <?php
                                                if ($edit_department['faculty_id'] == $facultyData[$i]->faculty_id) {
                                                    echo 'selected=""';
                                                };
                                                ?>  value="<?php echo $facultyData[$i]->faculty_id; ?>"><?php echo $facultyData[$i]->faculty_name; ?></option>
                                                <?php } ?>
                                        </select> 
                                        <input type="hidden" class="form-control" id="department_id" value="<?php echo $edit_department['department_id']; ?>" name="department_id">
                                    </div>
                                    <div class="form-group"> 
                                        <label for="department_name">Department Name</label>
                                        <input type="text" class="form-control" required="" id="department_name" value="<?php echo $edit_department['department_name']; ?>" name="department_name" placeholder="Department Name">
                                    </div> 
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </form>
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


