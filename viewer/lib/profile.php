<?php

include '../controler/connect.php';
//session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
?>
<html>

<head>

    <link rel="shortcut icon" href="images/favicon.ico"/>   <!-- Browser Icon -->

    <meta charset="UTF-8">
    <title>E-pals - Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--JQUERY LIBRARIES-->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!--END-->
    <!--BOOSTRAP LIBRARIES-->
    <script src="js/bootstrap.min.js"></script>
    <link href="../viewer/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.css" rel="stylesheet">
    <!--END-->



    <link href="../viewer/css/profile.css" rel="stylesheet">
    <link href="../viewer/css/style.css" rel="stylesheet">
    <script src="js/profile.js"></script>



    <script>


</script>
    <!--ALERTS-->

</head>
<body>
<p id="username" hidden><?php echo $_SESSION['username'] ?></p>

<div class="container-fluid">
    <div class=" col-md-0">
            <div id="cssmenu">
                <ul >
                    <li><a href="home.php"><span class="fa fa-lg fa-home"></span> Home</a></li>
                    <li class="active"><a href="#"><span class="fa fa-lg fa-user"></span> Profile</a></li>
                    <li class="logout"><a href="../controler/logout.php"><span class="fa fa-lg fa-sign-out"></span> Log out</a></li>

                </ul>
            </div>
    </div>
        <div class="col-md-12">
    <div class="content-profile-page">
        <div class="profile-user-page card">
            <div class="img-user-profile">
                <img class="profile-bgHome" src="http://37.media.tumblr.com/88cbce9265c55a70a753beb0d6ecc2cd/tumblr_n8gxzn78qH1st5lhmo1_1280.jpg" />
                <img class=" avatar user" src="images/user.png">
            </div>
            <div class="user-profile-data">
                <h1 id="name" title="Name is not set">User's Name</h1>
            </div>
            <ul class="data-user">
                <li><a role="button" data-toggle="modal" data-target="#myModal"><span class="fa fa-lg fa-thumbs-o-up"></span> <strong>Interests</strong></a></li>
            </ul>
        </div>
    </div>
</div>
    <!-- Interests Pop up -->

    <!-- Interests Pop up -->



<div class="footer" >

    <div class="footer_img" align="center">
        <a href="#"><img src="../viewer/images/Logo_01.png" height ="30" width="140"></a><em style = "vertical-align: top;
    color:darkblue;">©<?php echo date("Y");?></em></div>
</div>

</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Choose your interests?</h4>
            </div>
            <div class="modal-body">








                </div
            </div>

            <div class="modal-footer">
                <button class="btn-primary btn" ><span class="glyphicon glyphicon-ok"></span> Submit</button>
                <button class="btn-danger btn" data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span> Cancel</button>

            </div>

        </div>
    </div>
</div>

</body>
</html>
