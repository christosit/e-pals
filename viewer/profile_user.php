<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location:../viewer/login.php");
    echo headers_sent();
}


?>

<html>
<head xmlns="http://www.w3.org/1999/html">

    <link rel="shortcut icon" href="images/favicon.ico"/>   <!-- Browser Icon -->

    <meta charset="UTF-8">
    <title>E-pals - Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--JQUERY LIBRARIES-->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!--END-->
    <!--BOOSTRAP LIBRARIES-->
    <script src="../controler/js/bootstrap/bootstrap.min.js"></script>
    <link href="../viewer/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- This is what you need -->
    <script src="../controler/js/sweet-alert.js"></script>
    <link rel="stylesheet" href="css/sweet-alert.css">


    <!--END-->


    <!--TAG IT-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />


    <link href="../viewer/css/profile.css" rel="stylesheet">
    <link href="../viewer/css/style.css" rel="stylesheet">
    <!--script src="../controler/js/profile.js"></script-->
    <script src="../controler/js/profile_USER.js"></script>

    <!--animsition--->
    <script src="../controler/js/animsition.js"></script>
     <script src="../controler/js/style.js"></script>
    <link href="../viewer/css/animsition.css" rel="stylesheet">

    <!--AUTOCOMPLETE-->




</head>
<body>
<p class="username" hidden><?php echo $_SESSION['user_id'] ?></p>
<p class="visited_username" hidden></p>
<div class="animsition">
    <div class="container-fluid">
        <div class=" col-md-0">
            <div class="header">

                <a href="home.php" id="menu-action">
                    <img src="images/user.png"  class="user img-circle">
                </a>
                <div class=" col-md-5">

                    <h5 id="name">User's Name</h5>
                </div>

                </div>





            </div>
        </div >
        </div>
        <br>
        <br>
        <div class="row ">
            <div class="col-md-12">
                <!-- SIDEBAR USERPIC -->
                <br><br>

                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">

                            <a data-toggle="modal" data-target="#photo" style="cursor:pointer"><span class="fa fa-camera update">Update your photo</span> </a>                <!--UPLOAD IMG-->

                    <img src="images/user.png" class=" img-circle user">


                </div>


                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <h4 id="email"> </h4>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->

            </div>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="sidebar">
                    <ul>
                        <li><a data-toggle="modal" data-target='#interest' id="interests"><i class="fa fa-check"></i><span>Interests</span></a></li>
                        <li><a href="../model/logout.php" id="account"><i class="fa fa-power-off"></i><span>Log out</span></a></li>
                    </ul>
                </div>
                <!-- END MENU -->



<div class="footer" >

    <div class="footer_img" align="center">
        <a href="#"><img src="../viewer/images/Logo_01.png" height ="30" width="140"></a><em style = "vertical-align: top;
color:darkblue;">&copy;<?php echo date("Y");?></em></div>
</div>






<div id="interest" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">My Interests?</h4>

            </div>
            <div class="modal-body">


                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Category
                        </th>

                    </tr>
                    </thead>
                    <tbody id="head">
                    <tr class="active">

                    </tr>
                    </tbody>
                </table>




            </div><!-- /.col-lg-6 -->


           </div>
        </div>
    </div>



</body>
</html>

