<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mark Distribution</h1>
                <div class="col-md-12">  
                    <div class="panel panel-default">
                        <!-- Default panel contents --> 
                        <div class="panel-heading">Add Distribution  </div>
                        <div class="panel-body">


                            <?php if ($this->session->flashdata('success')) { ?> 

                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>  
                            <?php } ?>
                            <?php if ($this->session->flashdata('error')) { ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div> 
                            <?php } ?>  

                            <form class="form-horizontal" action="<?php echo base_url(); ?>distributions/save" method="post" >

                                <table class="table table-bordered">
                                    <tr>
                                        <th>Program Name</th>
                                        <th>Semester</th> 
                                        <th>Session</th> 
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="program_id">
                                                <?php for ($i = 0; $i < sizeof($programs); $i++) { ?> 
                                                    <option value="<?php echo $programs[$i]->program_id; ?>"><?php echo $programs[$i]->program_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="semester_id">
                                                <?php for ($i = 0; $i < sizeof($semesters); $i++) { ?> 
                                                    <option value="<?php echo $semesters[$i]->semester_id; ?>"><?php echo $semesters[$i]->semester_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        
                                        <td> 
                                            <select class="form-control" name="session_id">
                                                <?php for ($i = 0; $i < sizeof($session); $i++) { ?> 
                                                    <option value="<?php echo $session[$i]->session_id; ?>"><?php echo $session[$i]->year; ?></option>
                                                <?php } ?>
                                            </select>

                                        </td>

                                    </tr>
                                </table>

                                <table class="table table-bordered">
                                    <tr> 
                                        <th>Course Name</th>
                                        <th>Course Code</th>
                                        <th>Course Credit</th>
                                        <th>Theory Mark</th>
                                        <th>Practical Mark</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" required="" name="course_name" class="form-control" placeholder="Course Name">
                                        </td>
                                        <td>
                                            <input type="text" required="" name="course_code" class="form-control" placeholder="Course Code">
                                        </td>
                                        <td>
                                            <input type="text" required="" name="course_credit" class="form-control" placeholder="Course Credit">
                                        </td>
                                        <td>
                                            <table class="" style="border: none !important;width: 100% !important;">
                                                <tr style="border: none !important">
                                                    <td style="padding-right: 5px;"> <input type="text" name="theocont" class="form-control" placeholder="Cont" /></td>
                                                    <td style="padding-left: 5px;"> <input type="text" name="theofinal" class="form-control" placeholder="Final" /></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td style="padding-right: 5px;"> <input type="text" name="pmarkcont" class="form-control" placeholder="Cont" /></td>
                                                    <td style="padding-left: 5px;"> <input type="text" name="pmarkfinal" class="form-control" placeholder="Final" /></td>
                                                </tr>
                                            </table>
                                        </td>

                                    </tr>
                                </table>
                                <input type="submit" name="submit" value="submit" class="btn btn-success btn-sm"  />
                            </form>


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
