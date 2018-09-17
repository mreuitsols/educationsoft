<option value="">Select</option>
<?php for ($i = 0; $i < sizeof($course_list); ++$i) { ?>
    <option value="<?php echo $course_list[$i]->course_id; ?>"><?php echo $course_list[$i]->course_name; ?></option>
<?php } ?>
 