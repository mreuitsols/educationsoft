<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12"> 
                <div class="col-md-8"> 

                    <h1 class="text-center styles"><?php echo $Institute; ?></h1>
    <!--                <h3 class="text-center" style="font-size: 16px;"> <?php echo $programs['program_name']; ?> </h3>-->

                    <p class="text-center">
                        <img width="127"   style="margin: 0 auto;" src="<?php echo base_url(); ?>public/uploads/images/<?php
                        if ($logo) {
                            echo $logo;
                        } else {
                            echo 'default-logo.png';
                        }
                        ?>" /></p>


                    <h4 class="text-center">Payment Receipt</h4>  


                </div>
                <div class="col-md-8">  

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Student ID</th>
                                <th>Name of Student</th>
                                <th>P.A Amount</th>
                                <th>Pay Amount</th>
                                <th>Due Amount</th>
                                <th>Ad. Amount</th>
                                <th>Status</th>
                            </tr> 
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            if(is_array($dr_amount_studentList) && sizeof($dr_amount_studentList) > 0){
                            foreach ($dr_amount_studentList as $st_info) { ?>
                                <tr>
                                    <td><?= $i + 1; ?></td>
                                    <td><?= $st_info->student_id; ?></td>
                                    <td><?php
                                        $where = array('student_id' =>$st_info->student_id);
                                        $student_name = $this->General_model->select_any_where('students', $where);
                                        echo $student_name['student_name'];
                                        ?></td>
                                    <td class="text-right"><?php // $dueAmount= $this->Accounts_model->select_sum_where_row('student_dr_account', 'dr_amount', $where); 
 echo $student_dr_amount;    // echo number_format($dueAmount['dr_amount'],2);
                                    ?> TK</td>
                                    <td  class="text-right"><?php $st_info->student_id; 
                                     $pay_amount= $this->Accounts_model->select_sum_where_row('student_account', 'cr_amount', $where);   
                                    echo number_format($pay_amount['cr_amount'],2);
                                    ?> TK</td>
                                    <td  class="text-right">
                                        <?php   if($student_dr_amount  > $pay_amount['cr_amount'] ){
       echo number_format($pay_amount['cr_amount'] - $student_dr_amount,2);
                                        }else{
                                            echo '00.00';
                                        } ?>
                                    </td>
                                    <td  class="text-right">
                                        <?php   if($student_dr_amount  < $pay_amount['cr_amount'] ){
       echo number_format($pay_amount['cr_amount'] - $student_dr_amount,2);
                                        }else{
                                            echo '00.00';
                                        } ?>
                                    </td>
                                    <td class="text-primary"><?php if($student_dr_amount == $pay_amount['cr_amount'] ){
     echo 'Paid';
                                        }else if($student_dr_amount < $pay_amount['cr_amount'] )  {  echo 'Advanced'; }else{
                                            echo 'Unpaid';
                                        } ?></td>

                                </tr>
                                    <?php $i++;
                                }
                            }?>
                        </tbody>
                    </table>


                    <button class="no-print btn btn-warning btn-sm" onclick="print()"><i class="fa fa-print"></i> Print</button>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
