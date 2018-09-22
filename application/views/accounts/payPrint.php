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
                    <table class="table table-bordered">
                        <tr>
                            <th width="40">SL</th>
                            <th>Fee Purpose</th>
                            <th class="text-center" width="100">Amount</th>
                            <th class="text-center">Pay Amount</th>
                        </tr>
                        <?php
                        $i = 1;
                        $totalFees = 0;
                        $Loop = sizeof($FeepurposeData);

                        foreach ($FeepurposeData as $purpose) {
                            $feePurpose = $this->General_model->select_any_where('account_purpose_list', array('purpose_id' => $purpose->purpose_id));
                            ?>
                            <tr>
                                <td><?= $i; ?> </td>
                                <td><?= $feePurpose['purpose_name']; ?></td>
                                <td class="text-right"><?php
                                    echo number_format($purpose->fees_amount, 2) . ' TK';
                                    $totalFees = $totalFees + $purpose->fees_amount;
                                    if ($i == 1) {
                                        ?>  </td>
                                    <td class="text-right" rowspan="<?php echo $Loop; ?>"> <?php
                                        if ($pay_amount[0]->cr_amount > 0) {
                                            echo number_format($pay_amount[0]->cr_amount, 2);
                                        } else {
                                            echo number_format(0, 2);
                                        }
                                        ?> TK</td>
                                <?php } ?>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                        <tfoot>
                            <tr>
                                <th colspan="2">Total : </th><th colspan="" class="text-right"><?php echo number_format($totalFees, 2); ?> TK</th> <th class="text-right"><?php
                                    if ($pay_amount[0]->cr_amount > 0) {
                                        echo number_format($pay_amount[0]->cr_amount, 2);
                                    } else {
                                        echo number_format(0, 2);
                                    }
                                    ?> TK</th></tr>
                            <tr>
                                <th colspan="3">Total Due : </th> <th class="text-right"><?php
                                    if ($pay_amount[0]->cr_amount > 0) {
                                       $totalDue = $totalFees - $pay_amount[0]->cr_amount;
                                        echo number_format($totalDue, 2);
                                    } else {
                                        echo number_format(0, 2);
                                    }
                                    ?> TK</th></tr>
                        </tfoot>
                    </table>  
                    <button class="no-print btn btn-warning btn-sm" onclick="print()"><i class="fa fa-print"></i> Print</button>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
