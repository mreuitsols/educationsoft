
<script type="text/javascript">

    function getFee() {

        var program_id = document.getElementById('program_id').value;
        var semester_id = document.getElementById('semester_id').value;
        var session_id = document.getElementById('session_id').value;
        var tbodyid = document.getElementById('fee_purposeList');
        
        tbodyid.innerHTML = '';
        if (program_id > 0 && semester_id > 0 && session_id > 0) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>ajax/select_fees_purpose/", //here we are calling our user controller and get_cities method with the country_id
                data: {'program_id': program_id, 'semester_id': semester_id, 'session_id': session_id},
                dataType: 'text',
                success: function (dataView) {

                    var dataJson = JSON.parse(dataView);
                    var lengthJson = JSON.parse(dataView).length;

                    var SL = 1;
                    var creTbl = document.createElement('table');
                    creTbl.setAttribute('class', 'table table-bordered');

                    var creThead = document.createElement('thead');
                    var thtr = document.createElement('tr');
                    var _td = document.createElement('td');
                    _td.setAttribute('colspan', '3');
                    if (lengthJson > 0) {
                        _td.innerHTML = "<h3 class='text-center'>Select Fee Purpose List</h3>";
                        thtr.appendChild(_td);
                        creThead.appendChild(thtr);
                        creTbl.appendChild(creThead);

                        var creTbody = document.createElement('tbody');

                        for (var m = 0; m < dataJson.length; m++) {
                            // alert(dataJson[m].s_id);

                            var creTr = document.createElement('tr');

                            for (var n = 1; n < 5; n++) {

                                var ctrTd = document.createElement('td');
                                if (n == 1) {
                                    ctrTd.innerHTML = SL;
                                } else if (n == 2) {
                                    ctrTd.innerHTML = dataJson[m].purpose_name;
                                } else if (n == 3) {
                                    ctrTd.innerHTML = dataJson[m].amount;
                                } else if (n == 4) {
                                    var chkbox = document.createElement('input');
                                    var chkbox2 = document.createElement('input');

                                    ctrTd.append(chkbox);
                                    chkbox.setAttribute('value', dataJson[m].purpose_id);
                                    chkbox.setAttribute('type', 'checkbox');
                                    chkbox.setAttribute('name', 'purpose_id[]');

                                    var chekd = dataJson[m].check;
                                    if (chekd == 'checked') {
                                        chkbox.setAttribute('checked', 'checked');
                                    }

                                    ctrTd.append(chkbox2);
                                    chkbox2.setAttribute('value', dataJson[m].amount);
                                    chkbox2.setAttribute('type', 'hidden');
                                    chkbox2.setAttribute('name', 'amount[]');

                                }
                                creTr.appendChild(ctrTd);
                            }
                            creTbody.appendChild(creTr);


                            SL++;
                        }
                        creTbl.appendChild(creTbody);
                        tbodyid.appendChild(creTbl);
                    } else {
                        _td.innerHTML = "<h3 class='text-center'>Data Not Found!</h3>";
                        thtr.appendChild(_td);
                        creThead.appendChild(thtr);
                        creTbl.appendChild(creThead);
                        tbodyid.appendChild(creTbl);
                    }

                }
            });
        }
    }
</script>


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Student Fees By Semester </h1>
                <div class="col-md-8">  


                    <?php if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div> 
                    <?php } ?>  
                    <?php if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div> 
                    <?php } ?>  

                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading">Add Student Fees By Semester</div>
                        <div class="panel-body">
                            <form action="<?php echo base_url(); ?>accounts/save_st_fees_by_semester" method="post">



                                <div class="form-group">
                                    <label for="program_id">Program Name</label>
                                    <select class="form-control program_id" id="program_id" name="program_id" onchange="getFee();">
                                        <option value="">Select Program</option>
                                        <?php for ($i = 0; $i < sizeof($programs); $i++) { ?>
                                            <option value="<?php echo $programs[$i]->program_id; ?>" <?php ?> ><?php echo $programs[$i]->program_name; ?></option><?php }
                                        ?>
                                    </select>  
                                </div> 
                                <div class="form-group">
                                    <label for="semester_id">Semester</label>
                                    <select class="form-control semester_id" id="semester_id" name="semester_id" onchange="getFee();">
                                        <option value="">Select Semester</option>
                                        <?php for ($i = 0; $i < sizeof($semesters); $i++) { ?>
                                            <option value="<?php echo $semesters[$i]->semester_id; ?>" <?php ?> ><?php echo $semesters[$i]->semester_name; ?></option><?php }
                                        ?>
                                    </select>  
                                </div> 
                                <div class="form-group">
                                    <label for="session_id">Section</label>
                                    <select class="form-control section_id" id="session_id" name="session_id" onchange="getFee();">
                                        <option value="">Select Section</option>
                                        <?php for ($i = 0; $i < sizeof($sections); $i++) { ?>
                                            <option value="<?php echo $sections[$i]->session_id; ?>" <?php ?> ><?php echo $sections[$i]->year; ?></option><?php }
                                        ?>
                                    </select>  
                                </div>
                                <div id="fee_purposeList">

                                </div>

                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
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


<script>
    $(document).ready(function () {

        $("#addNewRow").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><select class="form-control section_id" id="session_id" name="purpose_id[]"> <option value="">Select Purpose</option>  <?php for ($i = 0; $i < sizeof($fee_purpose); $i++) { ?> <option value="<?php echo $fee_purpose[$i]->purpose_id; ?>" <?php ?> ><?php echo $fee_purpose[$i]->purpose_name; ?></option><?php } ?></select></td>';
            cols += '<td><input type="text" name="amount[]" required="" class="form-control" style="width: 90%; display: inline-block;"/> <input type="button" class="delete btn btn-md btn-danger "  value="X"></td>';

            newRow.append(cols);
            $("#fee_purpose_setup").append(newRow);
            counter++;
        });



        $("#fee_purpose_setup").on("click", ".delete", function (event) {
            $(this).closest("tr").remove();
        });


    });

</script>
