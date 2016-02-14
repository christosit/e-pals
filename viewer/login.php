<html><head>
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Browser Icon -->
    <meta charset="UTF-8">
    <title>E-Pals - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--JQUERY LIBRARIES-->
    <script src="../controler/js/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!--END-->
    <script>
      // Handler for .ready() called.
    </script>
    <!--BOOSTRAP LIBRARIES-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--END-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <script src="../controler/js/login.js"></script>
    <!-- This is what you need -->
    <script src="../controler/js/sweet-alert.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css">
    <!--USER PIC-->
    <script src="../controler/js/user_pic.js"></script>
    <!--animsition--->
    <script src="../controler/js/animsition.js"></script>
    <script src="../controler/js/style.js"></script>
    <!--loader-->
    <script src="fblogin/fb.js"></script>
    <script>
      $(document).ready(function() {
            function top() {
                document.getElementById('top').scrollIntoView();
            }

            function bottom() {
                document.getElementById('bottom').scrollIntoView();
                window.setTimeout(function () {
                    top();
                }, 2000);
            };

            bottom();
        });
    </script>
    <!--switch-->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
    <meta charset="utf-8">
  </head><body>
    <div class="animsition">
        <div class="container-fluid ">

        <div class="bannerTop" id="bottom">
        <div class="logo">
          <a href="profile.php" title="Go to my Profile"><div id="log"></div></a>
        </div>
      </div>
        <div class="row" align="center">
          <div class="main-form" id="scroll">
            <div class="row">
              <div id="login_pic" class="img-responsive ">
                <img class="img-circle user" src="images/user.png">
              </div>
            </div>
            <div class="input-group input-group-icon">
              <input type="email" id="email" placeholder="Email" value="aelg34@gmail.com" autofocus="">
              <div class="input-icon">
                <i class="  fa fa-lg fa-user"></i>
              </div>
            </div>
            <div class="input-group input-group-icon">
              <input type="password" id="password" placeholder="Password" value="2">
              <div class="input-icon">
                <i class="  fa fa-lg fa-lock"></i>
              </div>
            </div>
            <label>
              <input type="checkbox" id="keep_me" data-toggle="toggle">&ensp;&ensp;
              <span>Remember me</span>
            </label>
            <button id="login" class=" btn btn-lg btn-primary btn-block">
              <span id="top"></span>Sign In</button>
            <div class="fb-login-button" onlogin="Login"></div>
            <div class="fb-like" data-layout="standard" data-action="like" data-show-faces="true"></div>
            <a role="button" data-toggle="modal" data-target="#myModal">Forgot your password?</a>
            <div>
              <label>Don't have an account? </label>
              <a href="register.php"> <button id="sign_up" class="btn btn-lg btn-link"> Sign Up</button></a>
            </div>
          </div>
        </div>
      <div class="footer">
        <div class="footer_img">
          <a href=""><img src="images/Logo_01.png" height="30" width="140"></a>
          <em style="vertical-align: top;
    color:darkblue;">©
            <?php echo date("Y");?>
          </em>

        </div>
      </div>
        </div>

        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content/Forgot-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">×</button>
              <h4 class="modal-title">Resend your password?</h4>
            </div>
            <div class="modal-body">
              <label>Email Address:</label>
              <input type="email" placeholder="Please enter your email" id="email_forgot">
              <p hidden="" id="required">* This field is required</p>
            </div>
            <div class="modal-footer">
              <button class="btn-primary btn" id="forgot">
                <span class="glyphicon glyphicon-ok"></span>Send Email</button>
              <button class="btn-danger btn" data-dismiss="modal">
                <span class="glyphicon glyphicon-remove"></span>Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  

</body></html>