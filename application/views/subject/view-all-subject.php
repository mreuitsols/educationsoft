

<script type="text/javascript">


    $(document).ready(function () {

        $("#faculty_id").on("change", function () {
            var faculty_id = $('#faculty_id').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>ajax/select_program/", //here we are calling our user controller and get_cities method with the country_id
                data: {'faculty_id': faculty_id},
                dataType: "text",
                success: function (html) {
//                    console.log(html);
                    $('.program_id').html(html);

                }
            });
        });



        $("#program_id").on("change", function () {
            var program_id = $('#program_id').val();
            var faculty_id = $('#faculty_id').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>ajax/select_curriculum/", //here we are calling our user controller and get_cities method with the country_id
                data: {'program_id': program_id, 'faculty_id': faculty_id},
                dataType: "text",
                success: function (html) {
//                    console.log(html);
                    $('#curriculum_id').html(html);

                }
            });
        });
//        

        var credit = <?php echo $curriculums['creadit']; ?>;
        $(':radio, :checkbox').change(updateTotal);

        function updateTotal() {
            var total = 0;
            $(':radio:checked, :checkbox:checked').each(function () {
                var datavalue = $(this).attr('data-attr');
                total += parseInt(datavalue);
            });
//            console.log(total);
            if (credit < total) {

                $(this).prop('checked', false);
                        alert("Total credit must be equeal of :  " + credit);
                total = (total - datavalue);



                $("input[type=submit]").attr('disabled', true);
            } else if (credit == total) {
                $("input[type=submit]").removeAttr('disabled');
            } else if (credit > total) {
                $("input[type=submit]").attr('disabled', true);
            }
            $('#total').html(total);
        }


    });

</script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row"> 
            <h1 class="page-header"> Subject Distribution</h1>
            <div class="col-md-12">  
                <div class="panel panel-default">
                    <!-- Default panel contents --> 
                    <div class="panel-heading">Subject Distribution  </div>
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
                                        Total Credit : <?php echo $curriculums['creadit']; ?> <br/> <strong>Selected Credit : </strong> <span class="total" id="total"><?php echo $totalCredit; ?></span> 
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
                                            <?php
                                            for ($j = 0; $j < sizeof($subjectList); $j++) {
//                                                    echo $dist_subjectList[$j]->distribution_id;
                                                $check = '';
                                                if (is_array($resultDis) AND sizeof($resultDis) > 0) {
                                                    $searchDis = $this->db->query("SELECT * FROM distribution_subject_list WHERE distribution_id = '" . $resultDis[0]['distribution_id'] . "'");
                                                    $result = $searchDis->result_array();
                                                    if (is_array($result) AND sizeof($result) > 0) {
                                                        foreach ($result AS $value) {
                                                            if ($value['semester_id'] == $semesters[$i]->semester_id AND $value['subject_id'] == $subjectList[$j]->subject_id) {
                                                                $check = 'checked';
                                                            }
                                                        }
                                                    }
                                                }
                                                ?> 
                                                <div class="col-sm-4">
                                                    <label for="<?php echo $i . $subjectList[$j]->subject_id; ?>">
                                                        <input data-attr="<?php echo $subjectList[$j]->credit; ?>" type="checkbox" <?= $check; ?> id="<?php echo $i . $subjectList[$j]->subject_id; ?>" name="subject<?php echo $i; ?>[]" value="<?php echo $subjectList[$j]->subject_id; ?>">   <?php
                                                        echo $subjectList[$j]->subject_name . '-' . $subjectList[$j]->subject_type . '- ( Cr-' . $subjectList[$j]->credit . " )";
                                                        ?>
                                                    </label>
                                                </div>
                                                <?php
                                            }
                                            ?> 
                                        </td>
                                    </tr>
                                </table><?php
                            }
                            ?>
                            <div class="col-sm-12">
                                <input type="submit" value="submit" disabled=""  class="btn btn-primary nextBtn btn-md" /> 
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



