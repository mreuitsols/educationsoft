 
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row"> 
            <h1 class="page-header"> Subject Distribution</h1>
            <div class="col-md-12">  
                <div class="panel panel-default">
                    <!-- Default panel contents --> 
                    <div class="panel-heading">Search Subject by Faculty and Program  </div>
                    <div class="panel-body table-responsive">
                        <form id="submitform" action="<?php echo base_url(); ?>subjects/save_distribution" method="post">


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

                            <?php
                            $years = $curriculums['program_duration'] * 12;

                            $smt = ($years / $curriculums['semester_duration']);

                            for ($i = 0; $i < $smt; $i++) {

                                $distributionsData = $this->db->query("SELECT * FROM subject_distributions WHERE faculty_id = '" . $faculty['faculty_id'] . "' AND program_id = '" . $programs['program_id'] . "' AND  curriculum_id = '" . $curriculums['curriculum_id'] . "' AND semester_id = '" . $semesters[$i]->semester_id . "' ");
                                $resultDis = $distributionsData->result_array();
                                ?>

                                <input type='hidden' name="semester[]" value="<?php echo $semesters[$i]->semester_id; ?>" />
                                <table width="100%" class="table table-bordered"> 
                                    <tr style="background: #F8F8F8;"><th> <?php echo $semesters[$i]->semester_name; ?></th></tr>
                                    <tr>
                                        <td>
                                            <table class="table table-bordered   student-information">
                                                <tr>
                                                    <th style="width:3%">SL</th>
                                                    <th style="width: 30%">Subject Name</th>
                                                    <th style="width: 8%">Sub Code</th>
                                                    <th style="width: 13%">Subject type</th>
                                                    <th style="width: 8%">Credit</th>
                                                    <th style="width: 20%">Author</th> 
                                                </tr>
                                                <?php
                                                $totalCredit = 0;
                                                if (is_array($subjectList[$i]) AND sizeof($subjectList[$i]) > 0) {
                                                    for ($j = 0; $j < sizeof($subjectList[$i]); $j++) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $j + 1; ?></td>
                                                            <td> 
                                                                <?php echo $subjectList[$i][$j]['subject_name']; ?> 
                                                            </td>
                                                            <td> 
                                                                <?php echo $subjectList[$i][$j]['subject_code']; ?> 
                                                            </td>
                                                            <td> 
                                                                <?php echo $subjectList[$i][$j]['subject_type']; ?> 
                                                            </td>
                                                            <td> 
                                                                <?php
                                                                echo $subjectList[$i][$j]['credit'];
                                                                $totalCredit = $totalCredit + $subjectList[$i][$j]['credit'];
                                                                ?> 
                                                            </td>
                                                            <td> 
                                                                <?php echo $subjectList[$i][$j]['author_name']; ?> 
                                                            </td> 

                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?> 
                                                <tr>
                                                    <th colspan="4">Total = </th> 
                                                    <th colspan=""> <?php echo $totalCredit; ?> - Credit</th>
                                                    <th></th>
                                                </tr>
                                            </table> 
                                        </td>
                                    </tr>
                                </table><?php
                            }
                            ?>
                            <div class="col-sm-12">
                                <input type="submit" value="Print" onclick="print();" class="btn btn-warning nextBtn btn-md" /> 
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



