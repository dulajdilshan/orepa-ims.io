<?php include('Server.php') ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <title>OREPA Database</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />

    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <link href="css/bootstrap.mini.css" rel="stylesheet"/>
    <link href="css/metisMenu.min.css" rel="stylesheet"/>
    <link href="css/sb-admin-2.css" rel="stylesheet"/>

    <noscript>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-xlarge.css" />



    </noscript>
    <link rel="icon" href="images/favicon-96x96.png">


    <!-- Bootstrap Core CSS -->


    <!-- MetisMenu CSS -->


    <!-- Custom CSS -->


    <!-- Custom Fonts -->

</head>
<body class="landing">

<!-- Banner -->
<section id="banner">
    <h2><img src="images/orepa-logo.gif"></img></h2>
    <p>Old Royalists Engineering Professionals' Association Database</p>
    <ul class="actions">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="index.php">
                                <?php include('errors.php'); ?>
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="login_user" class="btn btn-default btn-success btn-block" value="Login">
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </ul>
</section>


<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/sb-admin-2.js"></script>




<!-- Footer -->
<footer id="footer">
    <div class="container">
        <ul class="copyright">
            <li>&copy; 2018. All rights reserved.</li>
            <li>Designed by CSE Department of University of Moratuwa</li>
        </ul>
    </div>
</footer>

</body>
</html>