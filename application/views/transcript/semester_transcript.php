<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Semester Transcript</h2>
                <div class="col-md-6">  
                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
<!--                        <div class="panel-heading">Semester Transcript</div>-->
                        <div class="panel-body">
                            <form action="<?php echo base_url(); ?>reports/semester_tc_view" method="post">
                                <div class="form-group">
                                    <label for="student_id">Student Id</label>
                                    <input type="text" class="form-control" required="" id="student_id" name="student_id" placeholder="ID Number">  
                                </div>  
                                <div class="form-group">
                                    <label for="student_id">Exam Type</label>
                                    
                                                    <select class="form-control" name="exam-type"> 
                                                        <option value="Mid Exam">Mid Exam</option>
                                                        <option value="Final Exam">Final Exam</option>
                                                    </select>
                                </div> 
                                                
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
