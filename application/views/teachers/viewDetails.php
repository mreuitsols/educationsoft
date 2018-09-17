<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3 class="page-header"> Employee Details</h3>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Employee Details
                    </div>
                    <div class="panel-body">
                        <div class="row"> 
                            <div class="col-md-12">  
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="<?php echo base_url(); ?>public/uploads/employees/<?php
                                        if ($employees['photo'] != NULL) {
                                            echo $employees['photo'];
                                        } else {
                                            echo 'default.png';
                                        }
                                        ?>" class="img-responsive"/>
                                    </div>
                                    <div class="col-md-9">
                                        <table class="table">
                                            <tr><th>ID</th> <td>:</td><td><?php echo $employees['employee_id']; ?> <a href="<?php echo base_url(); ?>teachers/edit/<?php echo $employees['e_id']; ?>" class="pull-right btn btn-primary btn-xs  no-print"><i class="fa fa-pencil"></i> Edit</a></td></tr>
                                            <tr><th>Name </th> <td>:</td><td><?php echo $employees['employee_name']; ?></td></tr>
                                            <tr><th>Program Name </th><td>:</td> <td><?php echo $departments['department_name']; ?></td></tr>
                                            <tr><th>Mobile No</th><td>:</td><td><?php echo $employees['mobile_no']; ?></td></tr> 
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="row  no-print">
                                <div class="col-md-12">  
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#Details" aria-controls="Details" role="tab" data-toggle="tab">Details</a></li>
                                        <li role="presentation"><a href="#contact-details" aria-controls="contact-details" role="tab" data-toggle="tab">Contact Details</a></li>

                                        <li role="presentation"><a href="#Accounts" aria-controls="Accounts" role="tab" data-toggle="tab">Routine</a></li>
                                        <li role="presentation"><a href="#Reports" aria-controls="Reports" role="tab" data-toggle="tab">Mark Entry</a></li>  

                                    </ul>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">  
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="Details">
                                            <div class="col-md-12">
                                                <br/>
                                                <table class="table table-bordered color-border">
                                                    <tr>
                                                        <th width='25%'>ID No</th>
                                                        <td><?php echo $employees['employee_id']; ?></td>

                                                        <th>Section</th>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Department Name</th>
                                                        <td><?php echo $departments['department_name']; ?></td>
                                                        <th>Joining Date</th>
                                                        <td><?php echo $employees['join_date']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Session</th>
                                                        <td><?php //echo $employees['year'];  ?></td>

                                                        <th>Student Name</th>
                                                        <td><?php echo $employees['employee_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mobile Number</th>
                                                        <td><?php echo $employees['mobile_no']; ?></td>

                                                        <th>Email</th>
                                                        <td><?php echo $employees['email']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nationality</th>
                                                        <td><?php echo $employees['nationality']; ?></td>

                                                        <th>Country</th>
                                                        <td><?php echo $employees['country']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Post Code</th>
                                                        <td><?php echo $employees['post_code']; ?></td>

                                                        <th>District</th>
                                                        <td><?php echo $employees['district']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gender</th>
                                                        <td><?php echo $employees['gender']; ?></td>

                                                        <th>Father's Name</th>
                                                        <td><?php echo $employees['father_name']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Mother's Name</th>
                                                        <td><?php echo $employees['mother_name']; ?></td>

                                                        <th>Father's Occupation</th>
                                                        <td><?php ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Permanent Address</th>
                                                        <td><?php echo $employees['parmanent_address']; ?></td>

                                                        <th>Present Address</th>
                                                        <td><?php echo $employees['present_address']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>H.S.C G.P.A</th>
                                                        <td><?php ?></td>

                                                        <th>Date of Birth</th>
                                                        <td><?php echo $employees['date_of_birth']; ?></td>
                                                    </tr>


                                                    <tr>
                                                        <th>Blood Group</th>
                                                        <td><?php echo $employees['blood_group']; ?></td>
                                                        <th>Passport No</th>
                                                        <td><?php ?></td>

                                                    </tr>



                                                    <tr>
                                                        <th> Religion</th>
                                                        <td><?php echo $employees['religion']; ?></td>
                                                        <th> Qualification  </th>
                                                        <td><?php echo $employees['qualification']; ?></td>

                                                    </tr>


                                                </table>
                                                <button type="button" onclick="print();" class="btn btn-warning btn-sm no-print" ><i class="fa fa-print"></i> Print</button>
                                            </div>
                                        </div> 
                                        <div role="tabpanel" class="tab-pane" id="Credit">
                                            <div class="col-md-12">
                                                <br/>
                                                <table class="table table-bordered color-border">
                                                    <tr>
                                                        <th>Credit</th>
                                                        <td><?php echo $employees['require_credit']; ?></td>

                                                        <th>Tuition Fee</th>
                                                        <td><?php echo $employees['tution_fee']; ?></td>
                                                    </tr> 
                                                    <tr>
                                                        <th>Due</th>
                                                        <td><?php echo $employees['due']; ?></td>

                                                        <th> </th>
                                                        <td><?php //echo $employees['district'];  ?></td>
                                                    </tr>


                                                </table>
                                                <button type="button" class="btn btn-warning btn-sm  no-print" ><i class="fa fa-print"></i> Print</button>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="Accounts">
                                            <div class="col-md-12">
                                                <h3>Under Maintains </h3>
                                            </div>
                                        </div>

                                        <div role="tabpanel" class="tab-pane" id="Reports">
                                            <div class="col-md-12">
                                                <h3>Under Maintains </h3>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="Results">
                                            <div class="col-md-12">
                                                <h3>Under Maintains </h3>
                                            </div>

                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="Send-Mail">
                                            <div class="col-md-12">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Message</label>
                                                        <textarea class="mail form-control" placeholder="Text Here........"></textarea> 
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Send</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid --> 
