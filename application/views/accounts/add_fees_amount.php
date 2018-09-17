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
                                    <select class="form-control program_id" id="program_id" name="program_id">
                                        <option value="">Select Program</option>
                                        <?php for ($i = 0; $i < sizeof($programs); $i++) { ?>
                                            <option value="<?php echo $programs[$i]->program_id; ?>" <?php ?> ><?php echo $programs[$i]->program_name; ?></option><?php }
                                        ?>
                                    </select>  
                                </div> 
                                <div class="form-group">
                                    <label for="semester_id">Semester</label>
                                    <select class="form-control semester_id" id="semester_id" name="semester_id">
                                        <option value="">Select Semester</option>
                                        <?php for ($i = 0; $i < sizeof($semesters); $i++) { ?>
                                            <option value="<?php echo $semesters[$i]->semester_id; ?>" <?php ?> ><?php echo $semesters[$i]->semester_name; ?></option><?php }
                                        ?>
                                    </select>  
                                </div> 
                                <div class="form-group">
                                    <label for="session_id">Section</label>
                                    <select class="form-control section_id" id="session_id" name="session_id">
                                        <option value="">Select Section</option>
                                        <?php for ($i = 0; $i < sizeof($sections); $i++) { ?>
                                            <option value="<?php echo $sections[$i]->session_id; ?>" <?php ?> ><?php echo $sections[$i]->year; ?></option><?php }
                                        ?>
                                    </select>  
                                </div> 

                                <div class="row">
                                    <div class="col-sm-12">
                                       
                                        <table class="table" id="fee_purpose_setup">
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="session_id">Fee Purpose</label>
                                                        <select class="form-control section_id" id="session_id" name="purpose_id[]">
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

                                            <tfoot>
                                                <tr>
                                                    <td colspan="5" style="text-align: left;">
                                                         <input type="button" value="+ Add New" id="addNewRow" class="btn btn-primary btn-md pull-right"  style="" /> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                </tr>
                                            </tfoot>
                                        </table>

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
