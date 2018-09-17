<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Payment </h1>
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
                            <form action="<?php echo base_url(); ?>accounts/search_st_data" method="post">

                                <div class="form-group">
                                    <label for="student_id">Student Id</label>
                                    <input type="text" class="form-control" name="student_id" />
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
