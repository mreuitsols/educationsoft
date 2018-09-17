<div id="page-wrapper">
    <div class="container-fluid" style="width: 960px; margin: 0 auto;">   
        <div class="row"> 
            <div class="col-md-12"> 

                <h1 class="text-center styles"><?php echo $Institute; ?> <input type="submit" value="Print" id="non-printable" onclick="print();" class="btn btn-warning btn-sm no-print pull-right" /></h1>
<!--                <h3 class="text-center" style="font-size: 16px;"> <?php echo $programs['program_name']; ?> </h3>-->

                <p class="text-center">
                    <img width="127"   style="margin: 0 auto;" src="<?php echo base_url(); ?>public/uploads/images/<?php
                    if ($logo) {
                        echo $logo;
                    } else {
                        echo 'default-logo.png';
                    }
                    ?>" /></p>


                <h4 class="text-center">CONSOLIDATED TRANSCRIPT</h4>  


            </div> 
        </div>
        <div class="row">   

            <h5>SL No: 6546545</h5> 
            <table width='100%'> 
                <tr>
                    <td width=''  valign="top"  width=" ">


                        <table style=" " class="student-information">

                            <tr>
                                <td>Matric No</td> <td>:</td>  
                                <td> <?php echo $students['student_id']; ?> </td>
                            </tr>
                            <tr>
                                <td>  Name of Student </td> <td>:</td>  
                                <td> <?php echo $students['student_name']; ?> </td>
                            </tr>
                            <tr>
                                <td>Program </td> <td>:</td>  
                                <td><?php echo $programs['program_name']; ?> </td>
                            </tr> 
                            <tr>
                                <td>Institute</td> <td>:</td>  
                                <td><?php echo $Institute; ?></td>
                            </tr>
                        </table>

                    </td>  
                </tr>
            </table>


        </div>
        <div class="row">   
            </br>

            <?php

            function getGP($pr) {
                if ($pr >= 80)
                    return 4;
                else if ($pr >= 75)
                    return 3.75;
                else if ($pr >= 70)
                    return 3.50;
                else if ($pr >= 65)
                    return 3.25;
                else if ($pr >= 60)
                    return 3.00;
                else if ($pr >= 55)
                    return 2.75;
                else if ($pr >= 50)
                    return 2.50;
                else if ($pr >= 45)
                    return 2.25;
                else if ($pr >= 40)
                    return 2.00;
                else
                    return 0;
            }

            function getLG($gp) {
                if ($gp >= 4)
                    return 'A+';
                else if ($gp >= 3.75)
                    return 'A';
                else if ($gp >= 3.50)
                    return 'A-';
                else if ($gp >= 3.25)
                    return 'B+';
                else if ($gp >= 3.00)
                    return 'B';
                else if ($gp >= 2.75)
                    return 'B-';
                else if ($gp >= 2.50)
                    return 'C+';
                else if ($gp >= 2.25)
                    return 'C';
                else if ($gp >= 2.00)
                    return 'D';
                else
                    return 'F';
            }

            function getRemark($point) {
                if ($point >= 4)
                    return 'Excellent';
                else if ($point >= 3.75)
                    return 'Very Good ';
                else if ($point >= 3.50)
                    return 'Very Good ';
                else if ($point >= 3.25)
                    return 'Good';
                else if ($point >= 3.00)
                    return 'Good';
                else if ($point >= 2.75)
                    return 'Satisfactory';
                else if ($point >= 2.50)
                    return 'Satisfactory';
                else if ($point >= 2.25)
                    return 'Pass';
                else if ($point >= 2.00)
                    return 'Pass';
                else
                    return 'Fail';
            }

            for ($i = 0; $i < sizeof($courseList); ++$i) {
                ?>

            <table class="transcript-header" cellpadding="0" cellspacing="0">
                    <tr>
                        <th>Semester : <?php echo $semesters[$i]['semester_name']; ?></th>
                  
                    </tr>

                </table> 
                <table width="100%" border="1" cellpadding="0" cellspacing="0" >
                    <tr bordercolor="#000000">
                        <th width="28" class="style20 style16">Sl.</th>
                        <th width="129" class="style20 style16">Course Code</th>
                        <th width="259" class="style20 style16">Course Title</th>
                        <th width="78" class="style20 style16">Credit</th>
                        <th width="69" class="style20 style16">Point</th>
                        <th width="77" class="style20 style16">Grade</th> 
                    </tr>
                    <?php
                    $subjectsTotal = 0;
                    $gpT = 0;


                    $cgpa = 0;
                    $totalSubject = 0;
                    $k = 0;
                    $creditTotal = 0;
                    ?>
                    <?php for ($j = 0; $j < sizeof($courseList[$i]); $j++) { ?>
                        <tr bordercolor="#999999">
                            <td><div align="center" class="style32"><?php
                                    echo $k + 1;
                                    $k++;
                                    ?></div></td>
                            <td><div align="center" class="style32"><?php echo $courseList[$i][$j]->course_code; ?></div></td>
                            <td><div align="center" class="style32"><?php echo $courseList[$i][$j]->course_name; ?></div></td>
                            <td><div align="center" class="style32"><?php
                                    echo $courseList[$i][$j]->course_credit;
                                    $creditTotal = $creditTotal + $courseList[$i][$j]->course_credit;
                                    ?></div></td>
                            <td>
                                <div align="center" class="style32"><?php
                                    $sum = $courseMarkList[$i][$j]->theory + $courseMarkList[$i][$j]->practical;
                                    echo $gpa = getGP($sum);
                                    $cgpa = $cgpa + getGP($sum);
                                    $sum = 0;
                                    $totalSubject++;
                                    ?></div></td>
                            <td><div align="center" class="style32"><?php
                                    echo getLG($gpa);
                                    $gpa = 0;
                                    ?></div></td> 
                        </tr>
                    <?php } ?>
                </table>
                <table  class="transcript-header" cellpadding="0" cellspacing="0"  >
                     
                   
                    <tr>

                        <th> Credit : <?php echo $creditTotal; ?></th>
                    <th> GPA : <?php echo bcadd(0, $cgpa / $totalSubject, 2); ?></th>
                    <th> Gread : <?php echo getLG(bcadd(0, $cgpa / $totalSubject, 2)); ?></th>
                        <th colspan="3">  </th>
                    </tr>

                </table>
                <br/>

                <?php
            }
            ?> 

            <p class="style16" align="left"><strong>Director<br> 
                    Academic Affairs Division</strong></p>
        </div> 

        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
