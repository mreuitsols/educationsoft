

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row"> 
            <h1 class="page-header"> Subject List</h1>
            <div class="col-md-12">  
                <div class="panel panel-default">
                    <!-- Default panel contents --> 
                    <div class="panel-heading">Subject List </div>
                    <div class="panel-body ">
                        <form id="submitform" action="<?php echo base_url(); ?>subjects/save_distribution" method="post">
                            <div class="table-responsive">

                                <table class="table table-bordered student-information">
                                    <tr>
                                        <th>Faculty Name</th>
                                        <th>Program Name</th>
                                        <th>Curriculum</th>
                                        <th width='300'>Total Credit</th>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="hidden" value="<?php echo $faculty['faculty_id']; ?>" name="faculty_id" /> 
                                            <?php echo $faculty['faculty_name']; ?>
                                        </td>
                                        <td>
                                            <input type="hidden" value="<?php echo $programs['program_id']; ?>" name="program_id" /> 
                                            <?php echo $programs['program_name']; ?>

                                        </td>
                                        <td>
                                            <input type="hidden" value="<?php echo $curriculums['curriculum_id']; ?>" name="curriculum_id" /> 
                                            <?php echo $curriculums['curriculum_name']; ?>

                                        </td>
                                        <td>
                                            Total Credit : <?php echo $curriculums['creadit']; ?>  
                                        </td>  
                                    </tr>
                                </table>
                                <table class="table table-bordered   student-information">
                                    <tr>
                                        <th>SL NO</th>
                                        <th>Subject Name</th>
                                        <th>Subject Code</th>
                                        <th>Subject type</th>
                                        <th>Subject Credit</th>
                                        <th>Author</th>
                                        <th>Publication</th>
                                        <th width='50'>Action</th>
                                    </tr>
                                    <?php
                                    for ($j = 0; $j < sizeof($subjectList); $j++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $j + 1; ?></td>
                                            <td> 
                                                <?php echo $subjectList[$j]->subject_name; ?> 
                                            </td>
                                            <td> 
                                                <?php echo $subjectList[$j]->subject_code; ?> 
                                            </td>
                                            <td> 
                                                <?php echo $subjectList[$j]->subject_type; ?> 
                                            </td>
                                            <td> 
                                                <?php echo $subjectList[$j]->credit; ?> 
                                            </td>
                                            <td> 
                                                <?php echo $subjectList[$j]->author_name; ?> 
                                            </td>
                                            <td> 
                                                <?php echo $subjectList[$j]->publisher; ?> 
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>Subjects/edit/<?php echo $subjectList[$j]->subject_id; ?>" class="btn btn-success btn-xs"> <i class="fa fa-pencil"></i> Edit</a>
                                            </td>  
                                        </tr>
                                        <?php
                                    }
                                    ?> 
                                </table>
                            </div>
                        </form>
                    </div> 
                </div> 
            </div>  
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>



