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
                            <form action="<?php echo base_url(); ?>accounts/save_purpose" method="post">
                                <div class="form-group">
                                    <label for="ProgramName">Purpose Name</label>

                                    <input type="text" name="purpose_name" class="form-control" />

                                </div> 
                                <div class="form-group">
                                    <label for="Session">Sort Description</label>
                                    <textarea class="form-control" name="purpose_description"></textarea>
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

        //iterate through each textboxes and add keyup
        //handler to trigger sum event
        $(".txt").each(function () {

            $(this).keyup(function () {
                calculateSum();
            });
        });

    });

    function calculateSum() {

        var sum = 0;
        //iterate through each textboxes and add the values
        $(".txt").each(function () {

            //add only if the value is number
            if (!isNaN(this.value) && this.value.length != 0) {
                sum += parseFloat(this.value);
            }

        });
        //.toFixed() method will roundoff the final sum to 2 decimal places


        $("#total").val(sum.toFixed(2));
    }
</script>
