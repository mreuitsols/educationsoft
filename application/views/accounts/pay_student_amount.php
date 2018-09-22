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
                            <form name="listForm" action="<?php echo base_url(); ?>accounts/save_cr_payment" method="post">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="40">SL</th>
                                        <th>Fee Purpose</th>
                                        <th width="100">Amount</th>
                                        <!--<td>Amount</td>-->
                                    </tr>
                                    <?php
                                    $i = 1;
                                    $totalFees = 0;
                                    foreach ($FeepurposeData as $purpose) {
                                        $feePurpose = $this->General_model->select_any_where('account_purpose_list', array('purpose_id' => $purpose->purpose_id));
                                        ?>
                                        <tr>
                                            <td><?= $i; ?> </td>
                                            <td><?= $feePurpose['purpose_name']; ?></td>
                                            <td><?php
                                                echo $purpose->fees_amount;
                                                $totalFees = $totalFees + $purpose->fees_amount;
                                                ?></td>
                                            <!--<td> <input name="choice" type="checkbox" onclick="checkboxes();" value="<?= $purpose->fees_amount; ?>" /></td>-->
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                    <tfoot><tr><th colspan="2">Total : </th><th colspan=""><?php echo $totalFees; ?></th></tr></tfoot>
                                </table>
                                <div class="form-group">
                                    <label for="totalDue">Total Due Amount</label> 
                                    <!--<input type="text" value="" id="dueTotal" />-->
                                    <input type="text" id="totalDue" name="totalDue" readonly="" value="<?php echo $totalFees - $pay_amount[0]->cr_amount; ?>" class="form-control" />
                                   
                                    <input type="hidden" name="student_id" value="<?php echo $student_info['student_id']; ?>" class="form-control" id="student_id" /> 
                                    <input type="hidden" name="program_id" value="<?php echo $student_info['program_id']; ?>" class="form-control" id="program_id" /> 
                                    <input type="hidden" name="semester_id"  value="<?php echo $student_info['semester_id']; ?>" class="form-control" id="semester_id" /> 
                                    <input type="hidden" name="session_id" value="<?php echo $student_info['session_id']; ?>" class="form-control" id="session_id" /> 
                                </div> 

                                <div class="form-group">
                                    <label for="ProgramName">Pay Amount</label>
                                    <input type="text" name="pay_amount" class="form-control" id="pay_amount" value="0"/> 
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
                            <h4>Payment Status:</h4>
                            <p>Payable Amount : <?php echo number_format($totalFees,2); ?> TK </p>
                            <p>Paid : <?php if($pay_amount[0]->cr_amount > 0){ echo number_format($pay_amount[0]->cr_amount,2); }else{    echo number_format(0,2);} ?> TK</p>
                            <p>Unpaid : <?php echo number_format($totalFees - $pay_amount[0]->cr_amount,2); ?> TK</p>
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
//    function checkboxes() {
//        addon = 0;
//        totalInput=document.getElementsByName("choice");
//        for (i = 0; i < totalInput.length; i++)
//        {
//            if (totalInput[i].checked == true)
//            {
//                addon += parseInt(totalInput[i].value, 10);
//            }
//        } 
//        document.getElementById('dueTotal').value = addon;
//    }

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
