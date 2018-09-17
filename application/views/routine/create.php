
<script type="text/javascript">
//    function addDrop(prefix, col, name) {
//        var selectors = document.getElementById(prefix + 'selectors' + col);
//
//        var selecDrop = document.createElement('select');
//        selecDrop.setAttribute('name', name);
//        selecDrop.setAttribute('id', prefix + 'drop' + col + (selectors.children.length - 2));
//        if (prefix === '') {
//            selecDrop.setAttribute('onchange', 'reload_tl(' + col + ');');
//        }
//        selecDrop.innerHTML = document.getElementById(prefix + 'drop' + col + '0').innerHTML;
//        selectors.appendChild(selecDrop);
//    }
//    function subDrop(prefix, col) {
//        var selectors = document.getElementById(prefix + 'selectors' + col);
//        var dropLast = selectors.children[selectors.children.length - 1];
//        selectors.removeChild(dropLast);
//    }
//    function reload_tl(col) {
//
//        var selectors = document.getElementById('selectors' + col);
//
//        var subjects = [document.getElementById(('drop' + col) + 0).value];
//        for (i = 1, total = selectors.children.length; i < total - 2; ++i) {
//            subjects.push(document.getElementById(('drop' + col) + i).value);
//        }
//
//        $.post('function.php',
//                {subjects: subjects.toString()},
//        function(data) {
//            document.getElementById(('tea_drop' + col) + 0).innerHTML = "<option selected=\"\">Teacher</option>" + data;
//        });
//    }
//    function submit() {
//        var groupId = document.getElementById('groupId').value;
//        var shift = document.getElementById('shift').value;
//        var period = document.getElementById('period').value;
//
//        var subjects_arr = [];
//        var sections_arr = [];
//        var teachers_arr = [];
//        for (i = 0; i < 6; ++i) {
//            var selectors = document.getElementById('selectors' + i);
//            var subjects = [(document.getElementById(('drop' + i) + 0).value)];
//            for (j = 1, total = selectors.children.length; j < total - 2; ++j) {
//                subjects.push(document.getElementById(('drop' + i) + j).value);
//            }
//            subjects_arr.push(subjects);
//
//            var sec_selectors = document.getElementById('sec_selectors' + i);
//            var sections = [(document.getElementById(('sec_drop' + i) + 0).value)];
//            for (j = 1, total = sec_selectors.children.length; j < total - 2; ++j) {
//                sections.push(document.getElementById(('sec_drop' + i) + j).value);
//            }
//            sections_arr.push(sections);
//            // alert(sections);
//
//            var tea_selectors = document.getElementById('tea_selectors' + i);
//            var teachers = [(document.getElementById(('tea_drop' + i) + 0).value)];
//            for (j = 1, total = tea_selectors.children.length; j < total - 2; ++j) {
//                teachers.push(document.getElementById(('tea_drop' + i) + j).value);
//            }
//            teachers_arr.push(teachers);
//            //alert(teachers);
//        }
//
//        $.post('function.php',
//                {
//                    Insert: true,
//                    GID: groupId,
//                    Shift: shift,
//                    Period: period,
//                    SubjectsList: subjects_arr,
//                    SectionsList: sections_arr,
//                    TeachersList: teachers_arr
//                },
//        function(data) {
//            alert(data);
//        });
//    }



    $(document).ready(function() {

        $("#session_id").on("change", function() {
            var program_id = $('#program_id').val();
            var semester_id = $('#semester_id').val();
            var session_id = $('#session_id').val();

            $.ajax({
                type: "POST",
                url: "/educationsoft/ajax/select_subject/", //here we are calling our user controller and get_cities method with the country_id
                data: {'program_id': program_id, 'semester_id': semester_id, 'session_id': session_id},
                dataType: "text",
                success: function(html) {
                    console.log(html);
                    $('.course_name').html(html);
                    $('#subjectDiv').removeClass('hide');
                    $('#subjectDiv').addClass('show');

                }
            });
        });
        $("#program_id").on("change", function() {
            var program_id = $('#program_id').val();

            $.ajax({
                type: "POST",
                url: "/educationsoft/ajax/select_teaher/", //here we are calling our user controller and get_cities method with the country_id
                data: {'program_id': program_id},
                dataType: "text",
                success: function(html) {
                    console.log(html);
                    $('.teachers').html(html);

                }
            });
        });



    });

</script>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Insert Routine</h1>
                <div class="col-md-12">  
                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading">Insert Routine  </div>
                        <div class="panel-body"> 




                            <div class="row"> 
                                <form action="<?php echo base_url(); ?>routines/save" method="post" >
                                    <div class="col-md-12">
                                        <h3>Create Routine</h3> 
                                        <table width="100%" class="table table-bordered">
                                            <tr><td>Select Program</td>
                                                <td>Select Semester</td>
                                                <td>Select Session</td>
                                                <td>Select Shift</td>
                                                <td>Select Period</td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <select  id="program_id" class="form-control " name="program_id">
                                                        <option value="" selected="">Select</option>
                                                        <?php for ($i = 0; $i < sizeof($programs); $i++) { ?> 
                                                            <option value="<?php echo $programs[$i]->program_id; ?>"><?php echo $programs[$i]->program_name; ?></option>
                                                        <?php } ?>
                                                    </select> 
                                                </td>


                                                <td>
                                                    <select  id="semester_id" class="form-control " name="semester_id">
                                                        <option value="" selected="">Select</option>
                                                        <?php for ($i = 0; $i < sizeof($semesters); $i++) { ?> 
                                                            <option value="<?php echo $semesters[$i]->semester_id; ?>"><?php echo $semesters[$i]->semester_name; ?></option>
                                                        <?php } ?>
                                                    </select> 
                                                </td>

                                                <td>
                                                    <select  id="session_id" class="form-control " name="session_id">
                                                        <option value="" selected="">Select</option>
                                                        <?php for ($i = 0; $i < sizeof($sessions); $i++) { ?> 
                                                            <option value="<?php echo $sessions[$i]->session_id; ?>"><?php echo $sessions[$i]->year; ?></option>
                                                        <?php } ?>
                                                    </select> 
                                                </td>

                                                <td>
                                                    <select id="shift" name="shift" class="form-control">
                                                        <option selected="">Shift</option>
                                                        <option value="1st Shift">1st Shift</option>
                                                        <option value="2nd Shift">2nd Shift</option>
                                                    </select>
                                                </td>

                                                <td>
                                                    <select id="period" name="period" class="form-control">
                                                        <option selected="">Period</option>
                                                        <option value="1st Period">1st Period</option>
                                                        <option value="2nd Period">2nd Period</option>
                                                        <option value="3rd Period">3rd Period</option>
                                                        <option value="4th Period">4th Period</option>
                                                        <option value="5th Period">5th Period</option>
                                                        <option value="6th Period">6th Period</option>
                                                        <option value="7th Period">7th Period</option>
                                                        <option value="8th Period">8th Period</option>
                                                    </select>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div id="subjectDiv" class="col-md-12 hide">
                                        <h3>Create Classes</h3>
                                        <table class="options table table-bordered">
                                            <tr>
                                                <th width="10%">Day's</th>
                                                <th width="30%">Subjects</th>
                                                <th width="20%">Sections</th>
                                                <th width="30%">Teachers</th>
                                            </tr>
                                            <tr>
                                                <th>Sat</th>
                                                <td class="form-control">
                                                    <select name="coursees[]" class="course_name form-control"></select> 
                                                </td>
                                                <td>
                                                    <select class="form-control" name="sections[]">
                                                        <option selected="">Section</option>
                                                        <?php for ($i = 0; $i < sizeof($sections); $i++) { ?> 
                                                            <option value="<?php echo $sections[$i]->section_id; ?>"><?php echo $sections[$i]->section_name; ?></option>
                                                        <?php } ?>
                                                    </select>

                                                </td>
                                                <td>
                                                    <select name="teachers[]" class="teachers form-control">
                                                        <option selected="">Teacher</option>
                                                    </select>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Sun</th>
                                                <td>
                                                    <select onchange="" name="coursees[]" class="course_name form-control"> 
                                                    </select> 
                                                </td>
                                                <td>
                                                    <select class="form-control" name="sections[]">
                                                        <option selected="">Section</option>
                                                        <?php for ($i = 0; $i < sizeof($sections); $i++) { ?> 
                                                            <option value="<?php echo $sections[$i]->section_id; ?>"><?php echo $sections[$i]->section_name; ?></option>
                                                        <?php } ?>
                                                    </select>

                                                </td>
                                                <td>
                                                    <select name="teachers[]"  class="teachers form-control">
                                                        <option selected="">Teacher</option>
                                                    </select> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Mon</th>
                                                <td>
                                                    <select onchange="" name="coursees[]" class="course_name form-control"> 
                                                    </select> 
                                                </td>
                                                <td>
                                                    <select class="form-control" name="sections[]">
                                                        <option selected="">Section</option>
                                                        <?php for ($i = 0; $i < sizeof($sections); $i++) { ?> 
                                                            <option value="<?php echo $sections[$i]->section_id; ?>"><?php echo $sections[$i]->section_name; ?></option>
                                                        <?php } ?>
                                                    </select>

                                                </td>
                                                <td>
                                                    <select name="teachers[]" class="teachers form-control">
                                                        <option selected="">Teacher</option>
                                                    </select> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tue</th>
                                                <td> 
                                                    <select name="coursees[]" class="course_name form-control" > 
                                                    </select>  
                                                </td>
                                                <td>
                                                    <select class="form-control" name="sections[]">
                                                        <option selected="">Section</option>
                                                        <?php for ($i = 0; $i < sizeof($sections); $i++) { ?> 
                                                            <option value="<?php echo $sections[$i]->section_id; ?>"><?php echo $sections[$i]->section_name; ?></option>
                                                        <?php } ?>
                                                    </select> 
                                                </td>
                                                <td>
                                                    <select name="teachers[]" class="teachers form-control">

                                                    </select>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Wed</th>
                                                <td>
                                                    <select name="coursees[]" class="course_name form-control">

                                                    </select>  
                                                </td>
                                                <td>
                                                    <select class="form-control" name="sections[]">
                                                        <option selected="">Section</option> 
                                                        <?php for ($i = 0; $i < sizeof($sections); $i++) { ?> 
                                                            <option value="<?php echo $sections[$i]->section_id; ?>"><?php echo $sections[$i]->section_name; ?></option>
                                                        <?php } ?>
                                                    </select> 
                                                </td>
                                                <td>
                                                    <select name="teachers[]" class="teachers form-control">

                                                    </select>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Thu</th>
                                                <td> 
                                                    <select name="coursees[]" class="course_name form-control" >

                                                    </select> 
                                                </td>
                                                <td>
                                                    <select class="form-control" name="sections[]">
                                                        <option selected="">Section</option>
                                                        <?php for ($i = 0; $i < sizeof($sections); $i++) { ?> 
                                                            <option value="<?php echo $sections[$i]->section_id; ?>"><?php echo $sections[$i]->section_name; ?></option>
                                                        <?php } ?>
                                                    </select> 
                                                </td>
                                                <td>
                                                    <select name="teachers[]" class="teachers form-control">

                                                    </select> 
                                                </td>
                                            </tr>

                                        </table>
                                        <input type="submit" onclick="submit();" value="submit" class="btn btn-primary btn-md margins" />
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
