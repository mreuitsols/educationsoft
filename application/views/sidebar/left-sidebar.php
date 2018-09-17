 
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url(); ?>">EUITsols</a>
    </div>
    <!-- /.navbar-header --> 

    <ul class="nav navbar-top-links navbar-right">

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> User <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url(); ?>logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links --> 





    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">


                <?php if ($_SESSION['role'] == "admin") { ?>
                    <li>
                        <a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>



                    <li>
                        <a href="#">
                            <i class="fa fa-gears"></i> <span> Settings</span> 
                            <span class="fa arrow"></span> 
                        </a>
                        <ul class="nav nav-second-level">

                            <li<?php
                            if ($_SERVER['REQUEST_URI'] == 'settings') {
                                echo 'active';
                            }
                            ?> class=""><a href="<?php echo base_url(); ?>settings"><i class="fa fa-gear"></i> General Settings <span class="fa arrow"></span> </a>
                                <ul class="nav nav-third-level">

                                    <li class=""><a href="<?php echo base_url(); ?>settings"><i class="fa fa-home"></i> Institute Info Settings</a></li>
                                    <li><a href="<?php echo base_url(); ?>semesters"><i class="fa fa-arrow-circle-right"></i> Semesters</a></li>
                                    <li><a href="<?php echo base_url(); ?>sessions"><i class="fa fa-arrow-circle-right"></i> Sessions</a></li>
                                    <li><a href="<?php echo base_url(); ?>sections"><i class="fa fa-arrow-circle-right"></i> Section</a></li> 

                                </ul> 
                            </li>
                            <li><a href="<?php echo base_url(); ?>branchs"><i class="fa fa-server"></i> Branch</a></li>
                            <li><a href="<?php echo base_url(); ?>faculties"><i class="fa fa-server"></i> Faculty</a></li>
                            <li><a href="<?php echo base_url(); ?>departments"><i class="fa fa-server"></i> Department</a></li>
                            <li><a href="<?php echo base_url(); ?>programs"><i class="fa fa-server"></i> Programs</a></li> 
                            <li><a href="<?php echo base_url(); ?>course_curriculum"><i class="fa fa-server"></i> Course Curriculum</a></li> 

                        </ul> 
                        <!-- /.nav-second-level -->
                    </li>
                    <li class="">
                        <a href="#">
                            <i class="fa fa-book"></i>
                           Subjects
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url(); ?>subjects/create"><i class="fa fa-plus"></i> Add Subject</a></li>
                            <li><a href="<?php echo base_url(); ?>subjects"><i class="fa fa-eye"></i> View Subject</a></li>

                        </ul>
                    </li>
                    <li class="">
                        <a href="#">
                            <i class="fa fa-book"></i>
                           Subjects Distribution
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url(); ?>subjects/subject_distribution"><i class="fa fa-plus"></i> Add Subject Distribution</a></li>
                            <li><a href="<?php echo base_url(); ?>subjects/distribution_view"><i class="fa fa-eye"></i> View Subject</a></li>

                        </ul>
                    </li>
<!--                    <li class="">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            Course Distributions 
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url(); ?>distributions/create"><i class="fa fa-plus"></i> Add Distributions</a></li>
                            <li><a href="<?php echo base_url(); ?>distributions"><i class="fa fa-eye"></i> View Distributions</a></li>

                        </ul>
                    </li>-->
                    <li class="">
                        <a href="#">
                            <i class="fa fa-graduation-cap "></i>
                            Students 
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url(); ?>students/addstudent"><i class="fa fa-plus"></i> Add Student</a></li>
                            <li><a href="<?php echo base_url(); ?>students"><i class="fa fa-search"></i> Search Student</a></li>

                        </ul>
                    </li>


                    <li>
                        <a href="#">
                            <i class="fa fa-edit"></i>
                            Migrations 
                            <span class="fa arrow"></span>
                        </a> 
                    </li>



                    <li class="">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            Teachers 
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url(); ?>teachers/create"><i class="fa fa-plus"></i> Add Teachers</a></li>
                            <li><a href="<?php echo base_url(); ?>teachers"><i class="fa fa-search"></i>  Teachers List</a></li>
                            <li><a href="<?php echo base_url(); ?>teachers/employees"><i class="fa fa-search"></i>  Employees List</a></li>


                        </ul>
                    </li>




                    <li class="">
                        <a href="#">
                            <i class="fa fa-calculator"></i>
                            Marks 
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url(); ?>marks"><i class="fa fa-plus"></i> Mark Entry</a></li>  
                            <li><a href="<?php echo base_url(); ?>marks/marksheet"><i class="fa fa-plus"></i> Mark Sheet</a></li>  
                            <li><a href="<?php echo base_url(); ?>marks/searchresult"><i class="fa fa-plus"></i>All Results</a></li>  
                        </ul>
                    </li>

                    <!--                    <li class="">
                                            <a href="#">
                                                <i class="fa fa-calculator"></i>
                                                Routine 
                                                <span class="fa arrow"></span>
                                            </a>
                                            <ul class="nav nav-second-level">
                    
                                                <li><a href="<?php echo base_url(); ?>routines/create"><i class="fa fa-plus"></i>Routine Create</a></li>
                                                <li><a href="<?php echo base_url(); ?>routines/search"><i class="fa fa-search"></i> Routine View</a></li>
                    
                                            </ul>
                                        </li>-->


                    <li class="">
                        <a href="#">
                            <i class="fa fa-calculator"></i>
                            Reports 
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">

                            <li><a href="<?php echo base_url(); ?>reports/semester_transcript"><i class="fa fa-circle-o"></i> Semester Transcript</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/ac_semester_ct"><i class="fa fa-circle-o"></i> Consolidated Transcript</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/official_transcript"><i class="fa fa-circle-o"></i> Official Transcript</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/ac_semester_ct"><i class="fa fa-circle-o"></i> Final Transcript</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/student_financial_information"><i class="fa fa-circle-o"></i> Student Financial Information</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/student_library_information"><i class="fa fa-circle-o"></i> Student Library Information</a></li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="#">
                            <i class="fa fa-money"></i>
                            Accounts 
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">

                            <li><a href="<?php echo base_url(); ?>accounts/add_purpose"><i class="fa fa-plus"></i> Fee Setup</a></li> 
                            <li><a href="<?php echo base_url(); ?>accounts/add_fees_amount"><i class="fa fa-plus"></i> Fees Amount by Semester</a></li> 
                            <li><a href="<?php echo base_url(); ?>accounts/add_studnet_fees_by_semester"><i class="fa fa-plus"></i> Add Student Fees by Semester</a></li> 
                            <li><a href="<?php echo base_url(); ?>accounts/addpayment"><i class="fa fa-plus"></i> Payment</a></li> 
                        </ul>
                    </li>


               
                   <li class="">
                        <a href="#">
                            <i class="fa fa-money"></i>
                            Library 
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">

                            <li><a href="#"><i class="fa fa-plus"></i>Add new Book</a></li> 
                            <li><a href="<?php echo base_url(); ?>library/book_category"><i class="fa fa-plus"></i>Book Categories</a></li> 
                           <li><a href="<?php echo base_url(); ?>library/book_subcategory"><i class="fa fa-plus"></i>Book subCategories</a></li> 
                          <li><a href="<?php echo base_url(); ?>library/publishers"><i class="fa fa-plus"></i>Publishers</a></li> 
                            <li><a href="#"><i class="fa fa-plus"></i>Authors</a></li> 
                        </ul>
                    </li>


                <?php } ?>



                <?php if ($_SESSION['role'] == "student") { ?>
                    <li>
                        <a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard fa-fw"></i> Profile</a>
                    </li>



                    <li>
                        <a href="#">
                            <i class="fa fa-file"></i> <span> Transcript</span> 
                            <span class="fa arrow"></span> 
                        </a>
                        <ul class="nav nav-second-level">

                            <li><a href="<?php echo base_url(); ?>reports/semester_transcript"><i class="fa fa-paste"></i> Semester Transcript</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/consolidated_transcript"><i class="fa fa-circle-o"></i> Consolidated Transcript</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/official_transcript"><i class="fa fa-circle-o"></i> Official Transcript</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/final_transcript"><i class="fa fa-circle-o"></i> Final Transcript</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/student_financial_information"><i class="fa fa-circle-o"></i> Student Financial Information</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/student_library_information"><i class="fa fa-circle-o"></i> Student Library Information</a></li>

                        </ul> 
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-file"></i> <span> Routine</span>  
                        </a> 
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-file"></i> <span> Notice</span> 
                        </a> 
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-edit"></i> <span> Change Password</span> 
                        </a> 
                    </li>
                <?php } ?>

                <?php if ($_SESSION['role'] == "teacher") { ?>
                    <li>
                        <a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard fa-fw"></i> Profile</a>
                    </li>



                    <li>
                        <a href="#">
                            <i class="fa fa-file"></i> <span> Insert Mark</span> 
                            <span class="fa arrow"></span> 
                        </a>
                        <ul class="nav nav-second-level">

                            <li><a href="<?php echo base_url(); ?>reports/semester_transcript"><i class="fa fa-paste"></i> Semester Transcript</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/consolidated_transcript"><i class="fa fa-circle-o"></i> Consolidated Transcript</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/official_transcript"><i class="fa fa-circle-o"></i> Official Transcript</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/final_transcript"><i class="fa fa-circle-o"></i> Final Transcript</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/student_financial_information"><i class="fa fa-circle-o"></i> Student Financial Information</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/student_library_information"><i class="fa fa-circle-o"></i> Student Library Information</a></li>

                        </ul> 
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-file"></i> <span> View Routine</span> 
                            <span class="fa arrow"></span> 
                        </a>
                        <ul class="nav nav-second-level">

                            <li><a href="<?php echo base_url(); ?>reports/semester_transcript"><i class="fa fa-paste"></i> Semester Transcript</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/consolidated_transcript"><i class="fa fa-circle-o"></i> Consolidated Transcript</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/official_transcript"><i class="fa fa-circle-o"></i> Official Transcript</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/final_transcript"><i class="fa fa-circle-o"></i> Final Transcript</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/student_financial_information"><i class="fa fa-circle-o"></i> Student Financial Information</a></li>
                            <li><a href="<?php echo base_url(); ?>reports/student_library_information"><i class="fa fa-circle-o"></i> Student Library Information</a></li>

                        </ul> 
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="">
                            <i class="fa fa-file"></i> <span> Notice</span> 
                        </a> 
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-edit"></i> <span> Change Password</span> 
                        </a> 
                    </li>
                <?php } ?>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
