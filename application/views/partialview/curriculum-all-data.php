<div class="row">
    <div class="col-md-12">
        <div class="form-row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label">Section </label>
                    <select class="form-control" name="section">
                        <?php for ($i = 0; $i < sizeof($sections); $i++) { ?> 
                            <option value="<?php echo $sections[$i]->section_id; ?>"><?php echo $sections[$i]->section_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label">Total Year </label>

                    <input type="text"  readonly="" name="credit" value="<?php echo $curriculums['program_duration']; ?>" class="form-control">

                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label">Total Credit </label>

                    <input type="text" readonly="" name="credit" value="<?php echo $curriculums['creadit']; ?>" class="form-control">

                </div>
            </div>

        </div><!-- End form row-->
        <div class="form-row">

            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label">Semester Duration </label>

                    <input type="text" readonly="" name="credit" value="<?php echo $curriculums['semester_duration']; ?>" class="form-control">

                </div>
            </div> 
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label">Per Credit Fee </label>

                    <input type="text" readonly="" name="credit" value="<?php echo $curriculums['per_creadit_fee']; ?>" class="form-control">

                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label">Lab Fee </label>

                    <input type="text" readonly="" name="credit" value="<?php echo $curriculums['lab_fee']; ?>" class="form-control">

                </div>
            </div>
        </div><!-- End form row-->
        <div class="form-row">

            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label">Library Fee (Per Semester)</label>

                    <input type="text" readonly="" name="credit" value="<?php echo $curriculums['library_fee']; ?>" class="form-control">

                </div>
            </div>


            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label">Registration Fee (Per Semester)</label> 
                    <input type="text" readonly="" name="credit" value="<?php echo $curriculums['registration_fee']; ?>" class="form-control"> 
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">

                    <label class="control-label"> </label>
                    <input type="hidden" />
                </div>
            </div>
        </div><!-- End form row-->  
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="form-row">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Total Tuition Fee : </label>

                            <?php echo $curriculums['creadit'] . ' * ' . $curriculums['per_creadit_fee'] . ' = ' . $total_tuition_fee = $curriculums['creadit'] * $curriculums['per_creadit_fee']; ?> BDT
                            <br/>
                            <label>Total Registration Fee: </label>
                            <?php
                            if ($curriculums['semester_duration'] > 0) {
                                $total_semester = ($curriculums['program_duration'] * 12 / $curriculums['semester_duration']);
                                echo $total_semester . ' * ' . $curriculums['registration_fee'] . ' = ' . $total_semester * $curriculums['registration_fee'];
                                $registration_fee = $total_semester * $curriculums['registration_fee'];
                            }
                            ?>
                            <br>
                            <label>Lab Fee: </label>  
                            <?php echo $total_lab . ' * ' . $curriculums['lab_fee'] . ' = ' . ($total_lab * $curriculums['lab_fee']);
                            $total_lab = $total_lab * $curriculums['lab_fee'];
                            ?> BDT

                            <br>
                            <label>Library Fee: </label>  
                            <?php
                            $total_amount = 0;
                            if ($curriculums['semester_duration'] > 0) {

                                echo $total_semester . ' * ' . $curriculums['library_fee'] . ' = ' . $total_semester * $curriculums['library_fee'];
                                $total_library_fee = $total_semester * $curriculums['library_fee'];
                                $total_amount = $total_amount + $total_tuition_fee + $registration_fee + $total_lab + $total_library_fee;
                            }
                            ?> BDT
                            <br>
                            -----------------------------------------------------------------------------------------------
                            <br>
                            <label>Total Fee  = </label>  
                            <?php
                            echo $total_amount;
                            ?>
 BDT
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>