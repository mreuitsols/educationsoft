<?php
$courses;
if (!sizeof($courses)) {
    exit();
}

function routine_align($subs, $secs, $teas, $roms) {
    $subs = explode(',', $subs);
    $secs = explode(',', $secs);
    $teas = explode(',', $teas);
    $roms = explode(',', $roms);
    $max = sizeof($subs) > 0 ? sizeof($subs) : 0;
    $max = sizeof($secs) > $max ? sizeof($secs) : $max;
    $max = sizeof($teas) > $max ? sizeof($teas) : $max;
    $max = sizeof($roms) > $max ? sizeof($roms) : $max;

    $ret = [];
    for ($i = 0; $i < $max; ++$i) {
        $sub_l = $i < sizeof($subs) ? $subs[$i] : $subs[sizeof($subs) - 1]; //echo $sub_l.'|';
        $sec_l = $i < sizeof($secs) ? $secs[$i] : $secs[sizeof($secs) - 1]; //echo $sec_l.'|';
//        $tea_l = $i < sizeof($teas) ? getCollectionGlobalV2(mysql_query("SELECT `nick_name` FROM `teachers` WHERE `id`=" . $teas[$i] . " "))[0][0] : $teas[sizeof($teas) - 1]; //echo $tea_l.'|';
        $rom_l = $i < sizeof($roms) ? $roms[$i] : $roms[sizeof($roms) - 1]; //echo $rom_l.'|';
        $ret[$i] = "<table class='views'><tr><td class='c'>" . $sub_l . ($sec_l === '' ? '' : (' - ' . $sec_l)) . "</td></tr><tr><td class='c'>" . $tea_l . ' - ' . $rom_l . "</td></tr></table>";
    }

    return $ret;
}

$teachers = [];
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">View Routine</h1>
                <div class="col-md-12">  
                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading">View Routine <span> <a class="btn btn-primary btn-xs pull-right" href="<?php echo base_url(); ?>distributions">Back / Search</a></span> </div>
                        <div class="panel-body">
<?php routine_align(); ?>

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
