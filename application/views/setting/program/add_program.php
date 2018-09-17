
<script type="text/javascript">


    $(document).ready(function () {

        $("#faculty_id").on("change", function () {
            var faculty_id = $('#faculty_id').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>ajax/select_department/", //here we are calling our user controller and get_cities method with the country_id
                        data: {'faculty_id': faculty_id},
                dataType: "text",
                success: function (html) {
//                    console.log(html);
                    $('.department_id').html(html);

                }
            });
        });



    });

</script>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Programs </h2>
                <div class="col-md-12">  
                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading">Add Program  </div>
                        <div class="panel-body">

                            <form role="form" action="<?php echo base_url(); ?>programs/save" method="post" class="student-entry-form">
                                <div class="row">

                                    <div class="col-md-12"> 
                                        <div class="form-row">

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="faculty_id">Select Faculty</label>
                                                    <select class="form-control" id="faculty_id" name="faculty_id">
                                                        <option selected="">Select Program</option>
                                                        <?php for ($i = 0; $i < sizeof($faculty); $i++) { ?> 
                                                        <option <?php if($faculty[$i]->faculty_id ==$programData['faculty_id'] ){ echo 'selected=""';}  ?>  value="<?php echo $faculty[$i]->faculty_id; ?>"><?php echo $faculty[$i]->faculty_name; ?></option>
                                                        <?php } ?>
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="department_id">Select Department</label>
                                                    <select class="form-control department_id" id="department_id" name="department_id">
                                                        <option selected="">Select Department</option> 
                                                        <?php for ($i = 0; $i < sizeof($departments); $i++) { ?> 
                                                        <option <?php if($departments[$i]->department_id ==$programData['department_id'] ){ echo 'selected=""';}  ?>  value="<?php echo $departments[$i]->department_id; ?>"><?php echo $departments[$i]->department_name; ?></option>
                                                        <?php } ?>
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="progran_name">Name of Program</label>
                                                    <input type="text" class="form-control" required="" value="<?php echo $programData['program_name']; ?>" id="progran_name" name="progran_name" placeholder="Name of Program"> 
                                                    <input type="hidden" class="form-control" required="" value="<?php echo $programData['program_id']; ?>" id="program_id" name="program_id" placeholder="Name of Program"> 
                                                </div> 
                                            </div>

                                        </div> <!-- End form row--> 

                                        <div class="col-sm-12">
                                            <input type="submit" value="submit"  class="btn btn-primary pull-right nextBtn btn-md" /> 
                                        </div> 
                                    </div> 
                                </div>  
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

