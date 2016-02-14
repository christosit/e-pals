<?php
include "../model/connect.php";
?>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>

    <link rel="shortcut icon" href="images/favicon.ico"/>   <!-- Browser Icon -->

    <meta charset="UTF-8">
    <title>E-pals - Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--JQUERY LIBRARIES-->
    <script src="../controler/js/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!--END-->
    <!--BOOSTRAP LIBRARIES-->
    <script src="../controler/js/bootstrap/bootstrap.min.js"></script>
    <link href="../viewer/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--END-->

    <script type="text/javascript" src="../controler/js/register.js"></script>
    <link href="css/sweetalert.css" rel="stylesheet">
    <script src="../controler/js/sweet-alert.js"></script>



    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />


    <link href="../viewer/css/register.css" rel="stylesheet">
    <link href="../viewer/css/style.css" rel="stylesheet">
    <link href="../viewer/css/font-awesome.css" rel="stylesheet">

    <!--VALIDATOR-->
    <script src="../controler/js/register.js"></script>
    <script src="../controler/js/validator.js"></script>
    <script src="../controler/js/bootstrap/pwstrength-bootstrap-1.1.5.js"></script>
    <!---switch--->
    <link href="css/bootstrap-switch.css" rel="stylesheet">
    <script src="../controler/js/bootstrap/bootstrap-switch.js"></script>
    <!---datepicker--->
    <script src="../controler/js/jquery.date-dropdowns.js"></script>


</head>

<body>
<span hidden class='ok' id='0'></span>
<div class="container-fluid">
<div class="bannerTop">
    <div class="logo">
        <a href="#" title="Go to my Profile"><div id="log"></div></a>
    </div>
</div>
<div class="col-md-12" >

<form data-toggle="validator">
        <div class="form-group">
            <div class="form-group col-sm-6">
                <label for="inputName" class="control-label">Name</label>
                <input type="text"  id="name" placeholder="Cina " required>
                <div class="help-block with-errors"></div>

            </div>
            <div class="form-group col-sm-6">
                <label for="inputName" class="control-label">Surname</label>
                <input type="text" class="" id="surname" placeholder=" Saffary" required>
                <div class="help-block with-errors"></div>

            </div>
        </div>
        <div class="form-group">
            <div class="form-group col-sm-6">
                <label for="inputEmail" class="control-label">Email</label>
                <input type="email"  id="email" placeholder="Email" data-error="Bruh, that email address is invalid" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-sm-6">
                <label for="inputName" class="control-label">Repeat Email</label>
                <input type="email"  id="conf_email" data-match="#email" data-match-error="Whoops, these don't match" placeholder="Confirm your email address" required>
                <div class="help-block with-errors"></div>

            </div>
        </div>
        <div class="form-group">
            <div class="form-group col-sm-6">
                <label for="inputPassword" class="control-label">Password</label>
                <input type="password" data-minlength="6"  id="password" placeholder="Password" required>
                <span class="help-block with-errors">Minimum of 6 characters</span>
            </div>
            <div class="form-group col-sm-6">
                <label for="inputPassword" class="control-label"> Repeat Password</label>
                <input type="password"  id="conf_pass" data-match="#password" data-match-error="Whoops, these don't match" placeholder="Confirm your password" required>
                <div class="help-block with-errors"></div>
                <span class="help-block">Minimum of 6 characters</span>

            </div>
        </div>
        <div class="form-group">
            <div class="form-group col-sm-6">
                <label class="control-label">Home Address</label>
                <input type="text"  id="address" placeholder="Home Addresss" required>
            </div>
            <div class="form-group col-sm-6">
                <label  class="control-label">Nationality</label>
                <input type="text" class="" id="nationality" placeholder="Nationality" required>
                <div class="help-block with-errors"></div>

            </div>
        </div>
        <div class="form-group">
            <div class=" col-sm-6">
                <label>Choose your genre </label><br>
                        <input type="radio" name="genre" class="genre" value="female" required>
                        Female
                            <input type="radio" name="genre" class="genre" value="male" required>
                        Male
                    <div class="help-block with-errors"></div>

                </div>
            </div>
        <div class=' form-group '>
            <div class="form-group col-sm-6">
                <label>Birthday</label>
                <input type="hidden" class="birthday">

            </div>
        </div>
<div class="form-group " align="center">
            <button type="submit" class="btn btn-primary" id="register">Submit</button>
    </div>
    </form>
</div>
</div>

<div class="footer" >
    <div class="footer_img"><a href="#"><img src="../viewer/images/Logo_01.png" height ="30" width="140"></a><em style = "vertical-align: top;
    color:darkblue;">&copy;	<?php echo date("Y");?></em></div>
</div>
</body>
</html>






