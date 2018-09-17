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


                <h4 class="text-center">ACADEMIC TRANSCRIPT</h4>  

            
            </div> 
        </div>
        <div class="row">   

            <h5>SL No: 6546545</h5>
            <table width='100%'> 
                <tr>
                    <td width=''  valign="top"  width="35%">


                        <table style=" " class="student-information">
                            <tr>
                                <td width="35%">Semester</td> <td width="20%">:</td>  
                                <td  width=""><?php echo $semesters['semester_name']; ?></td>
                            </tr>
                            <tr>
                                <td>Matric No</td> <td>:</td>  
                                <td> <?php echo $students['student_id']; ?> </td>
                            </tr>
                            <tr>
                                <td>  Name of Student </td> <td>:</td>  
                                <td> <?php echo $students['student_name']; ?> </td>
                            </tr>

                            <tr> <td>Father's Name</td><td>:</td> <td><?php echo $students['father_name']; ?></td></tr>
                            <tr> <td>Mother's Name</td><td>:</td> <td><?php echo $students['mother_name']; ?></td></tr> 


                            <tr>
                                <td>Program </td> <td>:</td>  
                                <td><?php echo $programs['program_name']; ?> </td>
                            </tr> 

                            <tr>
                                <td>Session</td><td>:</td>  
                                <td>2007</td> 
                            </tr>

                            <tr>
                                <td>Institute</td> <td>:</td>  
                                <td><?php echo $Institute; ?></td>
                            </tr> 


                        </table>

                    </td> 

                    <td>


                    </td>


                    <td valign="top"  width="35%">
                        <table class="range-of-mark" width="" border="1" cellpadding="0" cellspacing="0" align="right">
                            <tr> <td>Range of Marks (%)</td><td>Grade</td><td>Point</td> </tr>
                            <tr><td>80 and above</td><td>A+</td><td>4.00</td></tr>
                            <tr><td>75 to 79</td><td>A</td><td>3.75</td></tr>
                            <tr><td>70 to 74</td> <td>A-</td><td>3.50</td></tr>
                            <tr><td>65 to 69</td><td>B+</td><td>3.25</td></tr>
                            <tr><td>60 to 64</td><td>B</td><td>3.00</td></tr>
                            <tr> <td>55 to 59</td><td>B-</td><td>2.75</td></tr>
                            <tr> <td>50 to 54</td> <td>C+</td><td>2.50</td></tr>
                            <tr><td>45 to 49</td> <td>C</td><td>2.25</td></tr>
                            <tr><td>40 to 44</td><td>D</td><td>2.00</td></tr>
                            <tr><td>Below 40</td><td>F</td><td>0.00</td> </tr>
                        </table>

                    </td>
                </tr>
            </table>


        </div>
        <div class="row">   
                </br>
                <table width="100%" border="1" cellpadding="0" cellspacing="0" >
                    <tr bordercolor="#000000">
                        <td width="28" class="style20 style16"><div align="center" class="style16 style37">Sl.</div></td>
                        <td width="129" class="style20 style16"><div align="center" class="style32">Course Code </div></td>
                        <td width="259" class="style20 style16"><div align="center" class="style32">Course Title </div></td>
                        <td width="78" class="style20 style16"><div align="center" class="style32">Credit </div></td>
                        <td width="69" class="style20 style16"><div align="center" class="style32">Point </div></td>
                        <td width="77" class="style20 style16"><div align="center" class="style32">Grade </div></td> 
                    </tr>
                    <?php
                    $subjectsTotal = 0;
                    $gpT = 0;

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
                        else if ($gp === 3.75)
                            return 'A';
                        else if ($gp === 3.50)
                            return 'A-';
                        else if ($gp === 3.25)
                            return 'B+';
                        else if ($gp === 3.00)
                            return 'B';
                        else if ($gp === 2.75)
                            return 'B-';
                        else if ($gp === 2.50)
                            return 'C+';
                        else if ($gp === 2.25)
                            return 'C';
                        else if ($gp === 2.00)
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

                    $cgpa = 0;
                    $totalSubject = 0;
                    ?>
                    <?php for ($i = 0; $i < sizeof($courseList); ++$i) { ?>
                        <tr bordercolor="#999999">
                            <td><div align="center" class="style32"><?php echo $i + 1; ?></div></td>
                            <td><div align="center" class="style32"><?php echo $courseList[$i]->course_code; ?></div></td>
                            <td><div align="center" class="style32"><?php echo $courseList[$i]->course_name; ?></div></td>
                            <td><div align="center" class="style32"><?php echo $courseList[$i]->course_credit; ?></div></td>
                            <td><div align="center" class="style32"><?php
                                    $sum = $courseMarkList[$i]->theory + $courseMarkList[$i]->practical;
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
                <br>

                <table width="50%" border="0" align="left" cellpadding="0" cellspacing="0">


                    <tr>
                        <td>CGP:</td>
                        <td>CGPA :<?php echo bcadd(0,$cgpa / $totalSubject,2); ?> </td>
                    </tr>

                </table>
                <div align="right">
                    <table width="36%" border="0" align="right">  
                        <tr>
                            <td height="18"> Status:  </td>
                            <td><span class="style34"><?php echo getRemark($cgpa / $totalSubject); ?></span></td>
                        </tr>
                    </table>
                </div> 
            <p style="" align="right" class="drictor"><br>

                <span>Drictor <br>
                    Academic Affairs Division</span> </br>.............................</p>
        </div> 

        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
