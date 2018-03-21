
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

    <script type="text/javascript" src="js/jspdf.min.js"></script>
    <script type="text/javascript" src="js/jspdf.plugin.autotable.js"></script>
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


</head>
<body class="landing">

<header id="header">

    <nav id="nav">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="members.php">Add Members</a></li>
            <li><a href="home.php?logout='1'" style="color: red;">Logout</a></li>
        </ul>
    </nav>
</header>
<!-- Banner -->
<section id="banner">
    <h2><img src="images/orepa-logo.gif"></img></h2>
    <p>Old Royalists Engineering Professionals' Association Database</p>
    <ul>
        <div class="container" style="width: content-box ;">
            <div class="advance-search">
                <form action="home.php" method="post">
                    <div class="row">
                        <!-- Store Search -->
                        <div class="col-lg-2 col-md-4">
                            <div class="block d-flex">
                                <input style="color: aliceblue; border: 1px solid #ccc;" type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="name" id="search" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <div class="block d-flex">
                                <input style="color: aliceblue; border: 1px solid #ccc;" type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="university" id="search" placeholder="University">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <div class="block d-flex">
                                <input  style="color: aliceblue;border: 1px solid #ccc; " type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="batch" id="search" placeholder="University Batch">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <div class="block d-flex">
                                <input  style="color: aliceblue;border: 1px solid #ccc " type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="batch_royal" id="search" placeholder="Batch Of Royal">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <div class="block d-flex">
                                <input  style="color: aliceblue;border: 1px solid #ccc;" type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="field" id="search" placeholder="Field">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <div class="block d-flex">
                                <input  style="color: aliceblue;border: 1px solid #ccc;" type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="company" id="search" placeholder="Company">
                            </div>
                        </div>

                    </div>
                    <div class="row" style="padding-top: 12px">
                        <div  class="col-lg-5 col-md-6">
                        </div>
                        <div style="padding-right:10px" class="col-lg-1 col-md-6" >
                            <div  class="block d-flex">
                                <input  type="submit" name="search" class="btn btn-main" value="Search"></input>
                            </div>
                        </div>
                        <div  class="col-lg-2 col-md-6">
                            <div class="block d-flex">
                                <input type="submit" onclick="javascript:PdfFromHTML()" value="Download PDF "></input>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="container">
            <div id="datatable" class="row" style="width: max-content%">
                <table  id="table" class=" table-bordered table-hover table-condensed" style="background-color: #999999;color: black ;width:100%">
                    <thead>
                    <tr>
                        <th bgcolor="#2f4f4f"><font color="#f0f8ff"> Name</font></th>
                        <th bgcolor="#2f4f4f"><font color="#f0f8ff">University</font></th>
                        <th bgcolor="#2f4f4f"><font color="#f0f8ff">Batch</font></th>
                        <th bgcolor="#2f4f4f"><font color="#f0f8ff">Field</font></th>
                        <th bgcolor="#2f4f4f"><font color="#f0f8ff">Batch(College)</font></th>
                        <th bgcolor="#2f4f4f"><font color="#f0f8ff">Position</font></th>
                        <th bgcolor="#2f4f4f"><font color="#f0f8ff">Mobile</font></th>
                        <th bgcolor="#2f4f4f"><font color="#f0f8ff">Email</font></th>
                        <th bgcolor="#2f4f4f"><font color="#f0f8ff">Position(OREPA)</font></th>



                    </tr>
                    </thead>
        <?php
        if(isset($_SESSION['query'])){
        $result = mysqli_query($conn,$_SESSION['query'] );
                if(true){
                    while($row=mysqli_fetch_row($result)){
                        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[4]."</td>
<td>".$row[3]."</td><td>".$row[5]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr>";
                    }
                   // echo "</table>";
                }
        }

        ?>
                </table>
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

<script type="text/javascript">
    function PdfFromHTML() {
        var pdf = new jsPDF('l', 'pt', 'a4');
        pdf.setFontSize(6);
        var res = pdf.autoTableHtmlToJson(document.getElementById("table"), false);
        pdf.autoTable(res.columns, res.data, {
            startY: 60,
            tableWidth: 'auto',
            columnWidth: 'auto',
            styles: {
                overflow: 'linebreak'
            }
        });
        pdf.save("Data-sheet.pdf");


    }
</script>


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