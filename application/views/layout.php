    
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->


        <link href="<?php echo base_url(); ?>public/admin-assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/admin-assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>public/admin-assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="<?php echo base_url(); ?>public/admin-assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">    
        <link href="<?php echo base_url(); ?>public/summernote/summernote.css" rel="stylesheet">    




        <link href="<?php echo base_url(); ?>public/admin-assets/dist/css/sb-admin-2.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>public/admin-assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/js/countryJs/css/countrySelect.css">
        
        <!-- Include Bootstrap Datepicker -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />


        <script
            src="<?php echo base_url(); ?>public/js/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="">
        <div id="wrapper">
            <?php $this->load->view($sidebar); ?>
            <?php $this->load->view($page); ?> 

            <!--footer--> 

            <!--
                        <footer class="main-footer site-footer"> 
                            <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="http://euitsols.com/" target="_blank">EUITsols</a>.</strong> All rights
                            reserved.
                        </footer> -->
        </div>

        <!-- ./wrapper -->

        <script src="<?php echo base_url(); ?>public/admin-assets/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>public/admin-assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>public/admin-assets/vendor/metisMenu/metisMenu.min.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
        <!-- DataTables JavaScript -->
        <script src="<?php echo base_url(); ?>public/admin-assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>public/admin-assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>public/admin-assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
        <script src="<?php echo base_url(); ?>public/js/countryJs/js/countrySelect.js"></script>


        <script src="<?php echo base_url(); ?>public/summernote/summernote.min.js"></script>


        <!-- Metis Menu Plugin JavaScript -->

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>public/admin-assets/dist/js/sb-admin-2.js"></script>

        <script src="<?php echo base_url(); ?>public/js/educationjs.js"></script>
        
         <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });

                $('.summernote').summernote({
                    placeholder: 'Text Here........',
                    tabsize: 2,
                    height: 100,
                    lang: "es-ES",
                    disableDragAndDrop: true,
                    toolbar: [
                        ["style", ["style"]],
                        ["font", ["bold", "italic", "underline", "clear"]],
                        ["fontname", ["fontname"]],
                        ["color", ["color"]],
                        ["para", ["ul", "ol", "paragraph"]],
                        ["height", ["height"]],
                        ["table", ["table"]],
                        ["insert", ["link", "hr"]],
                        ["view", ["fullscreen", "codeview"]],
                        ["help", ["help"]]
                    ],
                    callbacks: {
                        onImageUpload: function (files) {
                            // Evitamos que se puedan pegar imágenes.
                            null;
                        }
                    }
                });


                $('.mail').summernote({
                    placeholder: 'Text Here........',
                    tabsize: 2,
                    height: 250,
                    lang: "es-ES",
                    disableDragAndDrop: true,
                    toolbar: [
                        ["style", ["style"]],
                        ["font", ["bold", "italic", "underline", "clear"]],
                        ["fontname", ["fontname"]],
                        ["color", ["color"]],
                        ["para", ["ul", "ol", "paragraph"]],
                        ["height", ["height"]],
                        ["table", ["table"]],
                        ["insert", ["link", "hr"]],
                        ["view", ["fullscreen", "codeview"]],
                        ["help", ["help"]]
                    ],
                    callbacks: {
                        onImageUpload: function (files) {
                            // Evitamos que se puedan pegar imágenes.
                            null;
                        }
                    }
                });

            });





        </script> 


        <script>
            $(document).ready(function () {
                $('.dateRangePicker')
                        .datepicker({
                            format: 'mm/dd/yyyy',
                            startDate: '01/01/1951',
                            endDate: '12/30/2020'
                        })
                        .on('changeDate', function (e) {
                            // Revalidate the date field
                            $('#dateRangeForm').formValidation('revalidateField', 'date');
                        });
            });
        </script>

        <script>
            $(".country_selector").countrySelect({
                //defaultCountry: "jp",
                //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                preferredCountries: ['bd']
            });
        </script>
    </body>
</html>
