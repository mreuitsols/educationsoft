<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add New Teacher </h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add New Teacher
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">  
                                <form action="<?php echo base_url(); ?>teachers/save" method="post" enctype= "multipart/form-data">
                                    <table width="100%" class="  student-entry-form" id="example">

                                        <tr>
                                            <th>  Department</th><th>:</th>
                                            <td>


                                                <select class="form-control" name="department_id">
                                                    <option selected="">Select</option>
                                                    <?php for ($i = 0; $i < sizeof($departments); $i++) {
                                                        ?>
                                                        <option <?php
                                                        if ($employee['department_id'] == $departments[$i]->department_id) {
                                                            echo 'selected=""';
                                                        }
                                                        ?> value="<?php echo $departments[$i]->department_id; ?>"><?php echo $departments[$i]->department_name; ?></option>
                                                        <?php } ?>
                                                </select>

                                            </td>
                                            <th>Employee ID </th> <th>:</th>
                                            <td>
                                                <input class="form-control" type="text" name="employee_id" value="<?php echo $employee['employee_id']; ?>"/>
                                                <input class="form-control" type="hidden" name="e_id" value="<?php echo $employee['e_id']; ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Name of Employee </th> <th>:</th>
                                            <td>
                                                <input class="form-control" type="text" name="employee_name" value="<?php echo $employee['employee_name']; ?>"/>
                                            </td>  


                                            <th>Employee Post</th> <th>:</th>

                                            <td>  
                                                <select class="form-control" name="post">
                                                    <option value="">----Select-----</option>
                                                    <option <?php
                                                    if ($employee['post'] == 'Principal') {
                                                        echo 'selected=""';
                                                    }
                                                    ?> value="Principal">Principal</option>
                                                    <option <?php
                                                    if ($employee['post'] == 'Vice Principal') {
                                                        echo 'selected=""';
                                                    }
                                                    ?> value="Vice Principal">Vice Principal</option>
                                                    <option <?php
                                                    if ($employee['post'] == 'Lecturer') {
                                                        echo 'selected=""';
                                                    }
                                                    ?> value="Lecturer">Lecturer</option>
                                                    <option <?php
                                                    if ($employee['post'] == 'Operator') {
                                                        echo 'selected=""';
                                                    }
                                                    ?> value="Operator">Operator</option>
                                                    <option <?php
                                                    if ($employee['post'] == 'MLSS') {
                                                        echo 'selected=""';
                                                    }
                                                    ?> value="MLSS">MLSS</option>

                                                </select>

                                            </td>
                                        </tr>
                                        <tr>


                                            <th>Gender</th> <th>:</th>
                                            <td><select class="form-control" name="gender">
                                                    <option value="">----Select-----</option>
                                                    <option <?php
                                                    if ($employee['gender'] == 'Male') {
                                                        echo 'selected=""';
                                                    }
                                                    ?> value="Male">Male</option>
                                                    <option <?php
                                                    if ($employee['gender'] == 'Female') {
                                                        echo 'selected=""';
                                                    }
                                                    ?> value="Female">Female</option>
                                                </select></td>
                                            <th>Employee Type</th> <th>:</th>
                                            <td><select class="form-control" name="employee_type">
                                                    <option value="">----Select-----</option>
                                                    <option <?php
                                                    if ($employee['employee_type'] == 'Teacher') {
                                                        echo 'selected=""';
                                                    }
                                                    ?> value="Teacher">Teacher</option>
                                                    <option <?php
                                                    if ($employee['employee_type'] == 'Employee') {
                                                        echo 'selected=""';
                                                    }
                                                    ?> value="Employee">Employee/MSLL</option> 
                                                </select></td>
                                        </tr>
                                        <tr>


                                            <th>Qualification </th><th>:</th>
                                            <td><input class="form-control" type="text" value="<?php echo $employee['qualification']; ?>" name="qualification" /></td>
                                            <th>Joining Date</th> <th>:</th>
                                            <td><input class="form-control" type="date" value="<?php echo $employee['join_date']; ?>" name="join_date" /></td>
                                        </tr>


                                        <tr>
                                            <th>Experience</th> <th>:</th>
                                            <td><input class="form-control" type="text" value="<?php echo $employee['experience']; ?>" name="experience" /></td>
                                            <th>Postal Code</th>
                                            <th>:</th>
                                            <td><input class="form-control" value="<?php echo $employee['post_code']; ?>" type="text" name="post_code" /></td>
                                        </tr> 

                                        <tr>
                                            <th>Father's Name </th> <th>:</th>
                                            <td><input class="form-control" type="text" value="<?php echo $employee['father_name']; ?>" name="father_name" /></td>
                                            <th>Mother's Name </th> <th>:</th>
                                            <td><input class="form-control" type="text" value="<?php echo $employee['mother_name']; ?>" name="mother_name" /></td>
                                        </tr>

                                        <tr> 
                                            <th>Religion</th> <th>:</th>


                                            <td>
                                                <select name='religion' class="form-control">
                                                    <option value="" selected="">Select Religion</option>
                                                    <option <?php if ($employee['religion'] == 'Islam') {
                                                            echo 'selected=""';
                                                        } ?> value="Islam">Islam</option>
                                                    <option <?php if ($employee['religion'] == 'Hindu') {
                                                            echo 'selected=""';
                                                        } ?> value="Hindu">Hindu</option>
                                                    <option <?php if ($employee['religion'] == 'Christian') {
                                                            echo 'selected=""';
                                                        } ?> value="Christian">Christian</option>
                                                    <option <?php if ($employee['religion'] == 'Buddhism') {
                                                            echo 'selected=""';
                                                        } ?> value="Buddhism">Buddhism</option> 
                                                </select> 
                                            </td>


                                            <th>Marital Status</th> <th>:</th>
                                            <td>
                                                <select name="marital_status" class="form-control">
                                                    <option value="" selected="">Select Religion</option>
                                                    <option <?php if ($employee['marital_status'] == 'Married') {
                                                            echo 'selected=""';
                                                        } ?> value="Married">Married</option>
                                                    <option <?php if ($employee['marital_status'] == 'Unmarried') {
                                                            echo 'selected=""';
                                                        } ?> value="Unmarried">Unmarried</option>
                                                    <option <?php if ($employee['marital_status'] == 'Single') {
                                                            echo 'selected=""';
                                                        } ?> value="Single">Single</option> 
                                                </select> 
                                            </td>
                                        </tr>
                                        <tr> 
                                            <th>District</th> <th>:</th>
                                            <td><input class="form-control" type="text" name="district" value="<?php echo $employee['district']; ?>"/></td>

                                            <th>Country </th> <th>:</th>
                                            <td><input class="form-control" type="text" name="country"  value="<?php echo $employee['country']; ?>" /></td>
                                        </tr>

                                        <tr>
                                            <th>Mobile No </th> <th>:</th>
                                            <td><input class="form-control" type="text" name="mobile_no"  value="<?php echo $employee['mobile_no']; ?>" /></td>
                                            <th>E-mail Address</th> <th>:</th>
                                            <td><input class="form-control" type="text" value="<?php echo $employee['email']; ?>" name="email" /></td>
                                        </tr>

                                        <tr>
                                            <th>Date of Birth </th> <th>:</th>
                                            <td><input class="form-control" type="date" name="date_of_birth"  value="<?php echo $employee['date_of_birth']; ?>" /></td>
                                            <th>Blood Group</th> <th>:</th>
                                            <td><input class="form-control" type="text" name="blood_group" value="<?php echo $employee['blood_group']; ?>"/></td>
                                        </tr>

                                        <tr>
                                            <th>Teacher's Picture </th> <th>:</th>
                                            <td><input class="" type="file" name="file" /></td>

                                            <th>Nationality</th><th>:</th>
                                            <td><input class="form-control" type="text" value="<?php echo $employee['nationality']; ?>" name="nationality" /></td>
                                        </tr>

                                        <tr>
                                            <th valign='top'>Present Address  </th> <th>:</th>
                                            <td><textarea class="form-control" name="present_address" rows="2"><?php echo $employee['present_address']; ?></textarea></td>
                                            <th valign='top'>Permanent Address</th> <th>:</th>
                                            <td><textarea class="form-control" name="parmanent_address" rows="2"><?php echo $employee['parmanent_address']; ?></textarea></td>
                                        </tr>

                                    </table>
                                    <p class="text-left">
                                        <input class="btn btn-md btn-primary" type="submit" name="add" value="Submit" /> 
                                    </p>

                                                                                        
                                    </table>
                                </form>
                            </div>
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
