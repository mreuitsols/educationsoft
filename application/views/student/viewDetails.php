<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3 class="page-header"> Student Details</h3>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Student Details
                    </div>
                    <div class="panel-body">
                        <div class="row"> 
                            <div class="col-md-12">  
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="<?php echo base_url(); ?>public/uploads/students/<?php
                                        if ($students['photo'] != NULL) {
                                            echo $students['photo'];
                                        } else {
                                            echo 'default.png';
                                        }
                                        ?>" class="img-responsive" />
                                    </div>
                                    <div class="col-md-9">
                                        <table class="table">
                                            <tr><th>ID</th> <td>:</td><td><?php echo $students['student_id']; ?> <a href="<?php echo base_url(); ?>students/edit/<?php echo $students['s_id']; ?>" class="pull-right btn btn-primary btn-xs  no-print"><i class="fa fa-pencil"></i> Edit</a></td></tr>
                                            <tr><th>Name </th> <td>:</td><td><?php echo $students['student_name']; ?></td></tr>
                                            <tr><th>Program Name </th><td>:</td> <td><?php echo $programs['progran_name']; ?></td></tr>
                                            <tr><th>Mobile No</th><td>:</td><td><?php echo $students['mobile_no']; ?></td></tr> 
                                        </table>
                                    </div>
                                </div>
                                <hr/>
                            </div>

                        </div>

                        <div class="row">
                            <div class="row  no-print">
                                <div class="col-md-12">  
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#Details" aria-controls="Details" role="tab" data-toggle="tab">Details</a></li>
                                        <li role="presentation"><a href="#contact-details" aria-controls="contact-details" role="tab" data-toggle="tab">Contact Details</a></li>
                                        <li role="presentation"><a href="#Credit" aria-controls="Credit" role="tab" data-toggle="tab">Credit</a></li>
                                        <li role="presentation"><a href="#Accounts" aria-controls="Accounts" role="tab" data-toggle="tab">Accounts</a></li>
                                        <li role="presentation"><a href="#Reports" aria-controls="Reports" role="tab" data-toggle="tab">Reports</a></li>
                                        <li role="presentation"><a href="#Results" aria-controls="Results" role="tab" data-toggle="tab">Results</a></li>
                                        <li role="presentation"><a href="#Send-Mail" aria-controls="Send-Mail" role="tab" data-toggle="tab">Send Mail</a></li>

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
                                                        <td><?php echo $students['student_id']; ?></td>

                                                        <th>Section</th>
                                                        <td><?php echo $sections['section_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Program Name</th>
                                                        <td><?php echo $programs['progran_name']; ?></td>
                                                        <th>Semester</th>
                                                        <td><?php echo $semesters['semester_name']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Session</th>
                                                        <td><?php echo $sessions['year']; ?></td>

                                                        <th>Student Name</th>
                                                        <td><?php echo $students['student_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mobile Number</th>
                                                        <td><?php echo $students['mobile_no']; ?></td>

                                                        <th>Email</th>
                                                        <td><?php echo $students['email']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nationality</th>
                                                        <td><?php echo $students['nationality']; ?></td>

                                                        <th>Country</th>
                                                        <td><?php echo $students['country']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Post Code</th>
                                                        <td><?php echo $students['post_code']; ?></td>

                                                        <th>District</th>
                                                        <td><?php echo $students['district']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gender</th>
                                                        <td><?php echo $students['gender']; ?></td>

                                                        <th>Father's Name</th>
                                                        <td><?php echo $students['father_name']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Mother's Name</th>
                                                        <td><?php echo $students['mother_name']; ?></td>

                                                        <th>Father's Occupation</th>
                                                        <td><?php echo $students['father_occupation']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Permanent Address</th>
                                                        <td><?php echo $students['parmanent_address']; ?></td>

                                                        <th>Present Address</th>
                                                        <td><?php echo $students['present_address']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>H.S.C G.P.A</th>
                                                        <td><?php echo $students['hsc_gpa']; ?></td>

                                                        <th>Date of Birth</th>
                                                        <td><?php echo $students['date_of_birth']; ?></td>
                                                    </tr>


                                                    <tr>
                                                        <th>Blood Group</th>
                                                        <td><?php echo $students['blood_group']; ?></td>
                                                        <th>Passport No</th>
                                                        <td><?php echo $students['passport_no']; ?></td>

                                                    </tr>


                                                    <tr>
                                                        <th>Telephone No </th>
                                                        <td><?php echo $students['telephone_no']; ?></td>
                                                        <th>Birth Place</th>
                                                        <td><?php echo $students['birth_place']; ?></td>

                                                    </tr>

                                                    <tr>
                                                        <th>Entry Date </th>
                                                        <td><?php echo $students['entry_date']; ?></td>
                                                        <th>Marital Status</th>
                                                        <td><?php echo $students['marital_status']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <th> Religion</th>
                                                        <td><?php echo $students['religion']; ?></td>
                                                        <th> Graduation Name  </th>
                                                        <td><?php echo $students['graduation_name']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <th>Graduation Date  </th>
                                                        <td><?php echo $students['graduation_date']; ?></td>
                                                        <th> Hold Bar </th>
                                                        <td><?php echo $students['hold_bar']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <th> Hold Bar Date</th>
                                                        <td><?php echo $students['hold_bar_date']; ?></td>
                                                        <th> Hold Bar Information </th>
                                                        <td><?php echo $students['hold_bar_information']; ?></td>

                                                    </tr>


                                                    <tr>
                                                        <th>Tuition fee</th>
                                                        <td><?php echo $students['tution_fee']; ?></td>
                                                        <th>Due</th>
                                                        <td><?php echo $students['due']; ?></td>

                                                    </tr>

                                                </table>
                                                <button type="button" onclick="print();" class="btn btn-warning btn-sm no-print" ><i class="fa fa-print"></i> Print</button>
                                            </div>
                                        </div>

                                        <div role="tabpanel" class="tab-pane" id="contact-details">
                                            <div class="col-md-12">
                                                <br/>
                                                <table class="table table-bordered color-border">
                                                    <tr>
                                                        <th>Permanent Address</th>
                                                        <td><?php echo $students['parmanent_address']; ?></td>

                                                        <th>Present Address</th>
                                                        <td><?php echo $students['present_address']; ?></td>
                                                    </tr> 
                                                    <tr>
                                                        <th>Post Code</th>
                                                        <td><?php echo $students['post_code']; ?></td>

                                                        <th>District</th>
                                                        <td><?php echo $students['district']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Mobile Number</th>
                                                        <td><?php echo $students['mobile_no']; ?></td>

                                                        <th>Email</th>
                                                        <td><?php echo $students['email']; ?></td>
                                                    </tr> 
                                                    <tr>


                                                        <th>Country</th>
                                                        <td><?php echo $students['country']; ?></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>

                                                </table>
                                                <button type="button" class="btn btn-warning btn-sm  no-print" ><i class="fa fa-print"></i> Print</button>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="Credit">
                                            <div class="col-md-12">
                                                <br/>
                                                <table class="table table-bordered color-border">
                                                    <tr>
                                                        <th>Credit</th>
                                                        <td><?php echo $students['require_credit']; ?></td>

                                                        <th>Tuition Fee</th>
                                                        <td><?php echo $students['tution_fee']; ?></td>
                                                    </tr> 
                                                    <tr>
                                                        <th>Due</th>
                                                        <td><?php echo $students['due']; ?></td>

                                                        <th> </th>
                                                        <td><?php //echo $students['district']; ?></td>
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
