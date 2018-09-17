<option value="">Select</option>
<?php var_dump($curriculums); for ($i = 0; $i < sizeof($curriculums); ++$i) { ?>
    <option value="<?php echo $curriculums[$i]->curriculum_id; ?>"><?php echo $curriculums[$i]->curriculum_name; ?></option>
<?php } ?>
 