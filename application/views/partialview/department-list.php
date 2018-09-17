<option value="">Select Department</option>
<?php for ($i = 0; $i < sizeof($departments); ++$i) { ?>
    <option value="<?php echo $departments[$i]->department_id; ?>"><?php echo $departments[$i]->department_name; ?></option>
<?php } ?>
 