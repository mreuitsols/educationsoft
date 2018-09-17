<script>

    $(document).ready(function () {


        $(".theory").keyup(function () {
            var mark = $(this).val();
            var coursee_id = <?php echo $coursee_id; ?>;
            var max_number = <?php echo $theory_max_number; ?>;
            if (mark > max_number) {
                $("input[type=submit]").attr('disabled', 'disabled');
                alert('Mark Must be Lesthen or Equal ' + max_number);
            } else {
                $("input[type=submit]").removeAttr('disabled');
            }

//            $.ajax({
//                type: 'POST',
//                url: "/educationsoft/ajax/select_course_dustribution_mark/",
//                data: {mark: mark,coursee_id:coursee_id},
//                cache: false,
//                success: function(html) {
//                    console.log(html);
//                    alert(html);
////                    msg.html(html);
//                }
//            });
        });


        $(".practical").keyup(function () {
            var practical = $(this).val();

            var p_max_number = <?php echo $practicals_max_number; ?>;
            if (practical > p_max_number) {
                alert('Mark Must be Lesthen or Equal ' + p_max_number);
            }

        });


    });





</script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Course Mark Entry</h1>
                <div class="col-md-12">  
                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading"> Course Mark Entry </div>
                        <div class="panel-body"> 
                            <div class="row"> 
                                <form id="insertMark" action="<?php echo base_url(); ?>marks/insertMark" method="post" >
                                    <div class="col-md-12"> 



                                        <input type="hidden" readonly="" class="form-control" name="course_id" value="<?php echo $coursee_id; ?>"/> 
                                        <input type="hidden" readonly="" class="form-control" name="exam_type" value="<?php echo $exam_type; ?>"/> 
                                        <input type="hidden" readonly="" class="form-control" name="semester_id" value="<?php echo $semester_id; ?>"/> 
                                        <table width="100%" class="table table-bordered">
                                            <tr>
                                                <th>Program</th>
                                                <th>Course Name</th>
                                                <th>Semester</th>
                                                <th>Session</th>
                                                <th>Section</th>
                                                <th>Exam Type</th>
                                                <th>Theory Max Number</th>
                                                <th>Practicals Max Number</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo $programs['program_name']; ?></td>
                                                <td><?php echo $courses['course_name']; ?></td>
                                                <td><?php echo $semesters['semester_name']; ?></td>
                                                <td><?php echo $sessions['year']; ?></td>
                                                <td><?php echo $sections['section_name']; ?></td>
                                                <td><?php echo $exam_type; ?></td>
                                                <td><?php echo $theory_max_number; ?></td>
                                                <td><?php echo $practicals_max_number; ?></td>
                                            </tr>
                                        </table>
                                        <table width="100%" class="table table-bordered">
                                            <tr><th>Student Name</th>
                                                <th>Student ID</th>
                                                <th>Mark</th> 
                                            </tr>

                                            <?php for ($i = 0; $i < sizeof($students); ++$i) { ?>
                                                <tr>
                                                    <td class="valign-middle">

                                                        <input type="hidden" readonly="" class="form-control" name="sid[]" value="<?php echo $students[$i]->s_id; ?>"/> 
                                                        <?php echo $students[$i]->student_name; ?>
                                                        <!--<input type="text" readonly="" class="form-control" value="<?php echo $students[$i]->student_name; ?>"/>-->
                                                    </td> 
                                                    <td class="valign-middle">
                                                        <?php echo $students[$i]->student_id; ?>
                                                        <!--<input type="text" readonly="" class="form-control" value="<?php echo $students[$i]->student_id; ?>"/>-->
                                                    </td> 
                                                    <td>
                                                        <table class="" style="border: none !important;width: 100% !important;">
                                                            <tr style="border: none !important">
                                                                <td style="padding-right: 5px;"> <input type="text" id="field" name="theory[]" value="<?php echo $marks[$i]['theory']; ?>" class="form-control theory" placeholder="Theory Mark" /></td>
                                                                <td style="padding-left: 5px;"> <input type="text" name="practical[]" value="<?php echo $marks[$i]['practical']; ?>" class="form-control practical" placeholder="Practical Mark" /></td>
                                                            </tr>
                                                        </table>
                                                    </td> 
                                                </tr>
                                            <?php } ?>

                                        </table> 
                                        <input type="submit" onclick="submit();" value="submit" class="btn btn-primary btn-md margins pull-right" />
                                    </div>


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
