<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Fee Purpose Setup </h1>
                <div class="col-md-6">  


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
                        <div class="panel-heading">Payment</div>
                        <div class="panel-body">
                            <form action="<?php echo base_url(); ?>accounts/save_cr_payment" method="post">
                                <div class="form-group">
                                    <label for="totalDue">Total Due Amount</label> 

                                    <input type="text" id="totalDue" name="totalDue" readonly="" value="<?php echo $dueAmount[0]->dr_amount; ?>" class="form-control" />
                                    <input type="hidden" name="student_id" value="<?php echo $student_info['student_id']; ?>" class="form-control" id="student_id" /> 
                                    <input type="hidden" name="program_id" value="<?php echo $student_info['program_id']; ?>" class="form-control" id="program_id" /> 
                                    <input type="hidden" name="semester_id"  value="<?php echo $student_info['semester_id']; ?>" class="form-control" id="semester_id" /> 
                                    <input type="hidden" name="session_id" value="<?php echo $student_info['session_id']; ?>" class="form-control" id="session_id" /> 
                                </div> 

                                <div class="form-group">
                                    <label for="ProgramName">Pay Amount</label>
                                    <input type="text" name="pay_amount" class="form-control" id="pay_amount" /> 
                                </div>  

                                <div class="form-group">
                                    <label for="ProgramName">Due Amount</label>
                                    <input type="text" name="due_amount" class="form-control" id="total" /> 
                                </div>   
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </form>
                        </div> 
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading">Student Details</div>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <th>Student ID: </th>
                                    <td><?php echo $student_info['student_id']; ?></td>  
                                </tr>
                                <tr>
                                    <th>Student Name: </th>
                                    <td><?php echo $student_info['student_name']; ?></td>  
                                </tr>
                                <tr>
                                    <th>Program: </th>
                                    <td><?php
                                        $program = $this->General_model->select_any_where('programs', array('program_id' => $student_info['program_id']));
                                        echo $program['program_name'];
                                        ?></td>  
                                </tr>
                                <tr>
                                    <th>Semester: </th>
                                    <td><?php
                                        $semesters = $this->General_model->select_any_where('semesters', array('semester_id' => $student_info['semester_id']));
                                        echo $semesters['semester_name']
                                        ?></td>  
                                </tr>
                                <tr>
                                    <th>Session: </th>
                                    <td><?php
                                        $session = $this->General_model->select_any_where('sessions', array('session_id' => $student_info['session_id']));
                                        echo $session['year']
                                        ?></td>  
                                </tr>
                            </table>
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

        var total = 0;
        var sum = 0;
        $('#totalDue').each(function () {
            total = this.value;
        });
        var pay_amount = 0;
        
        
        $("#pay_amount").each(function () {

            $(this).keyup(function () {
                pay_amount = this.value;
                sum = (total - pay_amount);
                   $("#total").val(sum);
            });
          
        });
 
       
    })
</script>
