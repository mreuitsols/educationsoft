<option>Select</option>
<?php for ($i = 0; $i < sizeof($teacherList); ++$i) { ?>
    <option value="<?php echo $teacherList[$i]->e_id; ?>"><?php echo $teacherList[$i]->employee_name; ?></option>
<?php } ?>
 