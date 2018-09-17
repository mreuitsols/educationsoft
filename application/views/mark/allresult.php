<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Department Result</h1>
                <div class="col-md-12">  
                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading">Department Result </div>
                        <div class="panel-body">

                            <h3>Result Sheet</h3>
                            <table class="table table-bordered result-sheet">
                                <tr><th>Roll</th><th>Name</th><th>GPA</th></tr>
                                <?php
                                for ($i = 0; $i < sizeof($students); $i++) {
                                    ?>
                                <tr><td><?php echo $students[$i]->student_id; ?></td><td><?php echo $students[$i]->student_name; ?></td><td><?php echo $result[$i]; ?></td></tr>

                                    <?php
                                }
                                ?>

                            </table>

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
