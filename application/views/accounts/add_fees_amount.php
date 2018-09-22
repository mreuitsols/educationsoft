<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Fee Purpose Setup </h1>
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
                        <div class="panel-heading">Fee Purpose Setup</div>
                        <div class="panel-body">
                            <form action="<?php echo base_url(); ?>accounts/save_fees_amount" method="post">
                                <div class="form-group">
                                    <label for="program_id">Program Name</label>
                                    <select class="form-control program_id" id="program_id" onchange="getPurposeList()" name="program_id">
                                        <option value="">Select Program</option>
                                        <?php for ($i = 0; $i < sizeof($programs); $i++) { ?>
                                            <option value="<?php echo $programs[$i]->program_id; ?>" <?php ?> ><?php echo $programs[$i]->program_name; ?></option><?php }
                                        ?>
                                    </select>  
                                </div> 
                                <div class="form-group">
                                    <label for="semester_id">Semester</label>
                                    <select class="form-control semester_id" id="semester_id" onchange="getPurposeList()" name="semester_id">
                                        <option value="">Select Semester</option>
                                        <?php for ($i = 0; $i < sizeof($semesters); $i++) { ?>
                                            <option value="<?php echo $semesters[$i]->semester_id; ?>" <?php ?> ><?php echo $semesters[$i]->semester_name; ?></option><?php }
                                        ?>
                                    </select>  
                                </div> 
                                <div class="form-group">
                                    <label for="session_id">Section</label>
                                    <select class="form-control section_id" id="session_id" onchange="getPurposeList()" name="session_id">
                                        <option value="">Select Section</option>
                                        <?php for ($i = 0; $i < sizeof($sections); $i++) { ?>
                                            <option value="<?php echo $sections[$i]->session_id; ?>" <?php ?> ><?php echo $sections[$i]->year; ?></option><?php }
                                        ?>
                                    </select>  
                                </div> 

                                <div class="row">
                                    <div class="col-sm-12">

                                        <table class="table">
                                            <tbody  id="fee_purpose_setup">
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="session_id">Fee Purpose</label>
                                                            <select class="form-control purpose" onchange="retypeCheck(this);" name="purpose_id[]">
                                                                <option value="">Select Purpose</option>
                                                                <?php for ($i = 0; $i < sizeof($fee_purpose); $i++) { ?>
                                                                    <option value="<?php echo $fee_purpose[$i]->purpose_id; ?>" <?php ?> ><?php echo $fee_purpose[$i]->purpose_name; ?></option><?php }
                                                                ?>
                                                            </select>  
                                                        </div>
                                                    </td>
                                                    <td class="" style="width: 50%">
                                                        <div class="form-group">
                                                            <label for="session_id">Fee Amount</label>
                                                            <input type="text" name="amount[]" required="" class="form-control" placeholder="amount" style="width: 90%; display: inline-block;"/>

                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <td colspan="5" style="text-align: left;">
                                                        <input type="button" value="+ Add New" onclick="addrow();" id="addNewRow" class="btn btn-primary btn-md pull-right"  style="" /> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div id="old-data"></div>

                                    </div>
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


    function addrow() {
        var newRow = document.createElement('tr');
        var newRow1 = document.createElement('tr');
        var tbodyId = document.getElementById('fee_purpose_setup');
        var cols = document.createElement('td');

        cols.innerHTML = '<select class="form-control purpose" id="" onchange="retypeCheck(this);" name="purpose_id[]"> <option value="">Select Purpose</option>  <?php for ($i = 0; $i < sizeof($fee_purpose); $i++) { ?> <option value="<?php echo $fee_purpose[$i]->purpose_id; ?>" <?php ?> ><?php echo $fee_purpose[$i]->purpose_name; ?></option><?php } ?></select>';
        var cols2 = document.createElement('td');
        cols2.innerHTML = '<input type="text" name="amount[]" required="" class="form-control" style="width: 90%; display: inline-block;"/> <input type="button" class="delete btn btn-md btn-danger " onclick="rowdelete(this);"  value="X">';

        newRow.append(cols);
        newRow.append(cols2);
        tbodyId.appendChild(newRow);
    }
//    var evt;
//        function retypeCheck(evt) { 
//        totalInput=document.getElementsByClassName('purpose');
//        
//        for (i = 0; i < totalInput.length; i++)
//        {
//          
//            if (totalInput[i].value == evt.value)
//            {
//                 alert('already exits');
//            }
//        }  
//    }


    function rowdelete(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
    
    
    function getPurposeList() {

        var program_id = document.getElementById('program_id').value;
        var semester_id = document.getElementById('semester_id').value;
        var session_id = document.getElementById('session_id').value;
        var tbodyid = document.getElementById('old-data');

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
                        _td.innerHTML = "<h3 class='text-center'>Previous Data List</h3>";
                        thtr.appendChild(_td);
                        creThead.appendChild(thtr);
                        creTbl.appendChild(creThead);

                        var creTbody = document.createElement('tbody');

                        for (var m = 0; m < dataJson.length; m++) {
                            var creTr = document.createElement('tr');
                            for (var n = 1; n < 4; n++) {

                                var ctrTd = document.createElement('td');
                                if (n == 1) {
                                    ctrTd.innerHTML = SL;
                                } else if (n == 2) {
                                    ctrTd.innerHTML = dataJson[m].purpose_name;
                                } else if (n == 3) {
                                    ctrTd.innerHTML = dataJson[m].amount;
                                }
                                creTr.appendChild(ctrTd);
                            }
                            creTbody.appendChild(creTr);

                            SL++;
                        }
                        creTbl.appendChild(creTbody);
                        tbodyid.appendChild(creTbl);
                    }  
                }
            });
        }
    }

</script>
