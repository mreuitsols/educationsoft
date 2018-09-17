<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Course Curriculum</h1>

                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">List of Course Curriculum  <span class="pull-right"> <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>course_curriculum/curriculum/-1/add">Add New Course Curriculum</a></span></div>
                    <div class="panel-body table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th> 
                                <th>Name Of Faculty</th>
                                <th>Name Of Program</th>
                                <th>Name of Curriculum</th> 
                                <th>Program Duration</th> 
                                <th>Semester Duration</th> 
                                <th>Total Credit</th>  
                                <th width="180">Action</th>
                            </tr>
                            <?php
                            $total = 0;
                            for ($i = 0; $i < sizeof($probidhan); $i++) {
                                ?> 
                                <tr>
                                    <td><?php
                                        echo $i + 1;
                                        $total = $total + 1;
                                        ?></td>  
                                    <td><?php echo $faculty_name[$i]; ?></td>
                                    <td><?php echo $department_name[$i]; ?></td>
                                    <td><?php echo $probidhan[$i]->curriculum_name; ?></td> 
                                    <td><?php echo $probidhan[$i]->program_duration; ?> Years</td> 
                                    <td><?php echo $probidhan[$i]->semester_duration; ?> Month</td> 
                                    <td><?php echo $probidhan[$i]->creadit; ?></td> 
                                     
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                            <a href="<?php echo base_url(); ?>course_curriculum/curriculum/<?php echo $probidhan[$i]->curriculum_id; ?>/edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="<?php echo base_url(); ?>subjects/subject_distribution" class="btn btn-success btn-sm">Select Courses</a>
                                        </div>
                                    </td>
                                </tr> 
                            <?php } ?> 
                        </table>
                    </div> 
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

</div>
