<?php
include '../model/connect.php';?>
<html>
<head>

    <link rel="shortcut icon" href="images/favicon.ico">   <!-- Browser Icon -->

    <meta charset="UTF-8">
    <title>E-Pals - Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!--END-->
    <!--BOOSTRAP LIBRARIES-->
    <script src="../controler/js/bootstrap/bootstrap.min.js"></script>
    <link href="../viewer/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
    <!--END-->
    <link href="../viewer/css/style.css" rel="stylesheet">
    <link href="../viewer/css/forgot.css" rel="stylesheet">
    <script src="../controler/js/forgot.js"></script>
    <!-- This is what you need -->
    <script src="../controler/js/sweet-alert.js"></script>
    <link rel="stylesheet" href="css/sweet-alert.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />



</head>
<body>
<div class="bannerTop">
    <div class="logo">
        <a href="profile.php" title="Go to my Profile"><div id="log"></div></a>
    </div>
</div>
<div class="container-fluid ">

    <div class="row">



    </div>


    <div class="row" align="center">
        <div class="main-form">
<div class="input-group input-group-icon">
    <input type="password" id="password" placeholder="New password" autofocus/>
    <div class="input-icon"><i class="  fa fa-lg fa-lock"></i></div>

</div>
<div class="input-group input-group-icon">
    <input type="password" id="conf_password" placeholder=" Repeat password" />
    <div class="input-icon"><i class="  fa fa-lg fa-lock"></i></div>
</div>
<br><br>
<button id="forgot" class=" btn btn-lg btn-primary btn-block"> SUBMIT</button>

    </div>
        <div class="footer" >
            <div class="footer_img" align="center"><a href="#"><img src="../viewer/images/Logo_01.png" height ="30" width="140"></a><em style=" vertical-align: top;
    color:darkblue;">&copy;	<?php echo date("Y");?></em></div></div>
        </div>

    </div>
    </div>
    </body>
    </html>

    <?php
    if(isset($_POST['forgot']))
    {
        include '../controler/forgot_function.php';
    }
    ?>




