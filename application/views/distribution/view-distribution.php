<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mark Distribution</h1>
                <div class="col-md-12">  
                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading">View Distribution <span> <a class="btn btn-primary btn-xs pull-right" href="<?php echo base_url(); ?>distributions">Back / Search</a></span> </div>
                        <div class="panel-body">


                            <?php // echo '<pre>'; print_r($theories_result); echo '</pre>'; ?>

                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="3"><?php echo $programs['program_name'] . ' - ' . $semesters['semester_name'] .   ' - ' . $sessions['year']; ?> </th>
                                    <td colspan="3">Credits</td>
                                    <td colspan="5">Marks</td>
                                </tr>
                                <tr>
                                    <th rowspan="2">SL No</th>
                                    <th rowspan="2">Course Code</th>
                                    <th rowspan="2">Name Of the Course</th>

                                    <th rowspan="2">C</th>
                                    <th colspan="2">Theory</th> 
                                    <th  colspan="2">Practical</th>
                                    <th rowspan="2">Total</th> 
                                    <th rowspan="2">Action</th> 


                                </tr>
                                <tr>
                                    <th>Cont</th>
                                    <th>Final</th>
                                    <th>Cont</th>
                                    <th>Final</th>
                                </tr>
                                <?php
                                $gTotal = 0;
                                $theoryCon = 0;
                                $theoryFin = 0;
                                $practicalCon = 0;
                                $practicalFin = 0;
                                $cradit = 0; 
                                for ($i = 0; $i < sizeof($course_data);  $i++) { 
                                    
                                    $total = $theories_result[$i]->cont_asses + $theories_result[$i]->final_exam + $practicals_result[$i]->cont_asses + $practicals_result[$i]->final_exam;
                                    $gTotal += $total;
                                    $theoryCon += $theories_result[$i]->cont_asses;
                                    $theoryFin += $theories_result[$i]->final_exam;
                                    $practicalCon += $practicals_result[$i]->cont_asses;
                                    $practicalFin += $practicals_result[$i]->final_exam;
                                    $cradit += ($total / 50);
                                    ?>
                                    <tr>
                                        <td><?php echo $i + 1; ?></td>

                                        <td>
                                            <?php echo $course_data[$i]->course_code; ?>
                                        </td>
                                        <td> <?php echo $course_data[$i]->course_name; ?> </td>
                                        <td>
                                            <?php echo $total / 50; ?>
                                        </td>

                                        <td> <?php echo $theories_result[$i]->cont_asses; ?> </td>
                                        <td><?php echo $theories_result[$i]->final_exam; ?> </td>
                                        <td> <?php echo $practicals_result[$i]->cont_asses; ?> </td>
                                        <td><?php echo $practicals_result[$i]->final_exam; ?> </td>

                                        <td>
                                            <?php echo $total; ?>
                                        </td>

                                        <td id="non-printable" width="100">
                                           
                                                <form class="pull-left" action="inline" method="post">
                                                    <input name="subid" value="" class="hidden" />
                                                    <input value="Edit" name="edit" type="submit"   class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg" />
                                                </form>

                                                <a href="#" class="btn btn-danger btn-xs pull-right" >Delete</a>
                                                
                                        </td>



                                    </tr> 
                                <?php } ?>

                                <tr>
                                    <th colspan="3">Total</th>
                                    <th><?php echo $cradit; ?></th>
                                    <th><?php echo $theoryCon; ?></th>
                                    <th><?php echo $theoryFin; ?></th>
                                    <th><?php echo $practicalCon; ?></th>
                                    <th><?php echo $practicalFin; ?></th>
                                    <th colspan="2"><?php echo $gTotal; ?></th>
                                     
                                </tr>

                            </table>
                        </div> 
                    </div>

                    <?php if ($this->session->flashdata('success')) { ?> 
                        <div class="panel panel-default">
                            <!-- Default panel contents --> 
                            <div class="panel-heading">Add Distribution  </div>
                            <div class="panel-body">



                            </div> 
                        </div>
                    <?php } ?>
                </div> 
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
