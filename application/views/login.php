 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="shortcut icon" href="favicon_16.ico"/>
        <link rel="bookmark" href="favicon_16.ico"/>
        <!-- site css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
        <!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">-->
        <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]--> 
        <style>
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                /*background-image: url(<?php echo base_url(); ?>public/images/bg.jpg);*/
                background: #efefef;
                color: #C1C3C6
            }
        </style>
    </head>
    <body id="login">
        <div class="container">
            
                    <form class="form-signin" role="form"  action="<?= base_url('') ?>" method="POST">
                        <h2 class="form-signin-heading">Please sign in</h2>
                        <?php if (isset($_SESSION['err'])): ?>
                            <strong>Warning!</strong> <?= $this->session->userdata('err'); ?>
                        <?php endif ?>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </div>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class=" glyphicon glyphicon-lock "></i>
                                </div>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
                            </div>
                        </div>

                        <label class="checkbox">
                            <input type="checkbox" value="remember-me"> &nbsp Remember me
                        </label>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    </form>
               

        </div> 
        <!--footer-->

        <script src="<?php echo base_url(); ?>/public/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/public/js/jquery-3.2.1.slim.min.js" type="text/javascript"></script>

    </body>
</html>
