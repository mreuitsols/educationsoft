<option value="">Select Program</option>
<?php for ($i = 0; $i < sizeof($programsdata); ++$i) { ?>
    <option value="<?php echo $programsdata[$i]->program_id; ?>"><?php echo $programsdata[$i]->program_name; ?></option>
<?php } ?>
 