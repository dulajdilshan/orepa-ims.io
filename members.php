<?php include('Server.php');
    //session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}
?>

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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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


</head>
<body class="landing">

<header id="header">

    <nav id="nav">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="members.php">Add Members</a></li>
            <li><a href="home.php?logout='1'" style="color: red;">logout</a></li>
        </ul>
    </nav>
</header>
<!-- Banner -->
<section id="banner">
    <h2><img src="images/orepa-logo.gif"></img></h2>
    <p>Old Royalists Engineering Professionals' Association Database</p>
    <ul>
        <div class="container" style="width: 600px">
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td colspan="1">
                        <form class="well form-horizontal" action="members.php" method="post">
                            <?php include('errors.php'); ?>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Full Name</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="Full Name" class="form-control" required value="<?php echo $fullName; ?>" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">University</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="university" name="university" placeholder="University Name" class="form-control" required value="<?php echo $university; ?>" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Batch</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="batch" name="batch" placeholder="Batch" class="form-control" required value="<?php echo $batch; ?>" type="number"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Field</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-certificate"></i></span><input id="field" name="field" placeholder="Field of Study" class="form-control" required value="<?php echo $field; ?>" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Batch of Royal College</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="batch_royal" name="batch_royal" placeholder="Batch of Royal College" class="form-control" required value="<?php echo $batch_royal; ?>" type="number"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Current Position</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="position" name="position" placeholder="Current Position" class="form-control"  value="<?php echo $position; ?>"type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Company</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span><input id="company" name="company" placeholder="Company" class="form-control" value="<?php echo $company; ?>" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Position(OREPA)</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="position_orepa" name="position_orepa" placeholder="Position of OREPA" class="form-control"  value="<?php echo $position_orepa; ?>" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Email</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="email" name="email" placeholder="Email" class="form-control" required value="<?php echo $email; ?>" type="email"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Phone Number</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span><input id="phoneNumber" name="phoneNumber" placeholder="Phone Number" class="form-control" required="true" value="<?php echo $phoneNumber; ?>" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Comments</label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span><textarea rows="5" id="comments" name="comments" placeholder="Any Comments" class="form-control"></textarea></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="add_member" class="btn btn-default btn-success btn-block" value="Add Memeber">
                                    <input type="submit" name="update_member" class="btn btn-default btn-success btn-block" value="Update Memeber">
                                </div>
                            </fieldset>
                        </form>
                    </td>

                </tr>
                </tbody>
            </table>
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
<footer id="footer" >
    <div class="container">
        <ul class="copyright">
            <li>&copy; 2018. All rights reserved.</li>
            <li>Designed by CSE Department of University of Moratuwa</li>
        </ul>
    </div>
</footer>

</body>
</html>