<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location:../viewer/login.php");
    //echo headers_sent();
}


?>

<html>

<head>

    <link rel="shortcut icon" href="images/favicon.ico"/>   <!-- Browser Icon -->

    <meta charset="UTF-8">
    <title>E-pals - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--JQUERY LIBRARIES-->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!--END-->
    <!--BOOSTRAP LIBRARIES-->
    <script src="../controler/js/bootstrap/bootstrap.min.js"></script>
    <link href="../viewer/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.css" rel="stylesheet">
    <!--END-->


    <script src="../controler/js/profile.js"></script>

   <link href="../viewer/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />

    <!-- NEWS FEED-->
    <script src="../controler/js/home.js"></script>
    <link href="../viewer/css/home.css" rel="stylesheet">
    <link href="../viewer/css/profile.css" rel="stylesheet">


    <!--animsition--->
    <script src="../controler/js/animsition.js"></script>
    <script src="../controler/js/style.js"></script>
    <link href="../viewer/css/animsition.css" rel="stylesheet">

    <script src="../controler/js/sweet-alert.js"></script>
    <link href="../viewer/css/sweet-alert.css" rel="stylesheet">
    <script src="../controler/js/jquery.ddslick.js "></script>
    <script src="../controler/js/bootstrap3-typeahead.js"></script>
    <script src="../controler/js/search.js"></script>
    <link href="../viewer/css/search.css" rel="stylesheet">

    <!--script>
        $(document).ready(function() {
            $('input.typeahead').typeahead({
                source: function (query, process) {
                    $.ajax({
                        url: '../model/profile.php',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {query: query,
                        choice:10
                        },
                        success: function(result) {
                            //var data = $.parseJSON(result);
                           console.log(result);

                            //process(result);
                            $('.typeahead.dropdown-menu').ddslick({

                                data: result,
                                defaultSelectedIndex:2
                            });
                        }
                    });
                }
            });
        });
    </--script-->

</head>


<!--MODAL-->

<body>
<p class="username" hidden><?php echo $_SESSION['user_id'] ?></p>
<div class="animsition">
    <nav class="navbar navbar-default megamenu ">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a href="home.php">
                    <img src="images/logo_icon.png"  class=" img-rounded">
                    <h4 id="name">User's Name</h4>

                </a>

            </div>

            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <!--input class="typeahead" type="text" data-provide="typeahead" autocomplete="on"-->
                    <div class="contentArea">
                        <input type="search" class="form-control" placeholder="Search">
                        <input type="search" class="search" id="inputSearch" /><span><i class="glyphicon glyphicon-search"></i> </span>
                        <div id="divResult"></div>
                    </div>
                </div>
            </form>
            <div class="collapse navbar-collapse">
                <div  id="not" align="right">
                    <script>
                        $(document).ready(function(){
                            $('#show_nots').popover({
                                html : true,
                                content: function() {
                                    return $('#notificationContainer').html();
                                }
                            });

                            $('#show_nots').click(function() {
                                $('#show_msg').popover('hide');
                            });


                        });
                        $(document).ready(function(){
                            $('#show_msg').popover({
                                html : true,
                                content: function() {
                                    return $('#messageContainer').html();
                                }
                            });
                            $('#show_msg').click(function() {
                                $('#show_nots').popover('hide');
                            });
                        });
                    </script>






                    <a href="#"
                       data-placement="bottom"
                       title="Notifications"
                       id="show_nots"
                       rel="popover"><span class="fa fa-globe"></span> Notifications <span id="notification_count" class=" badge "></span> </a>
                    <div id="notificationContainer">

                        <div id="notificationsBody" class="notifications">

                            <ul class="list-group" id="noti_list">
                            </ul>
                        </div>
                        <div class="popover-footer"><a href="#">See All</a></div></div>


                    <a href="#"
                       data-placement="bottom"
                       title="MESSAGE"
                       id="show_msg"
                       rel="popover"><span class="fa fa-comments"></span> Messages <span id="msg_count" class="badge "></span> </a>
                    <div id="messageContainer">

                        <div id="notificationsBody" class="message">

                            <ul class="list-group" id="msg_list">
                            </ul>
                        </div>
                        <div class="popover-footer"><a href="#">See All</a></div></div>





                </div>
            </div>
            </div><!-- /.navbar-collapse -->
    </nav>
    <div class="container">
<div class="col-md-12">

            <!-- SIDEBAR USERPIC -->
            <div class="profile-userbuttons">

                        <div class='article_content'>

                            <img src='../viewer/images/user.png'  class='user img-circle'>

                        </div>
                        <div class='article_profile'>
                            <div class="container2">
                                <fieldset class="inputs">
                                    <h5>Description</h5>
                                    <textarea                  id="text-box" placeholder="Say Something..."></textarea>
                                </fieldset><br>
                                <fieldset class="actions">
                                    <button id="submit">Post</button>
                                </fieldset>
                            </div>

                        </div>
                        </div>


                <div id="news" class="feed">
                    <!--div class='newsfeed_articlecontainer'></div-->
                    </div>

    <div class="sidebar">
        <ul>
            <li><a href="profile.php"><i class="fa fa-user fa-lg"></i><span>Profile</span></a></li>
            <li><a  data-toggle="modal" data-target='#edit' id="account"><i class="fa fa-cogs fa-lg"></i><span>Account Settings</span></a></li>
            <li><a href="../model/logout.php" id="account"><i class="fa fa-power-off fa-lg"></i><span>Log out</span></a></li>
        </ul>
    </div>
    <!-- END MENU -->
</div>



<button class="btn btn-lg" id="toTop">Top <span class="glyphicon glyphicon-chevron-up"> </span>
</button>

<div class="footer" >

    <div class="footer_img" align="center">
        <a href="#"><img src="../viewer/images/Logo_01.png" height ="30" width="140"></a><em style = "vertical-align: top;
color:darkblue;">&copy;<?php echo date("Y");?></em></div>
</div>
<div class="modal fade" id="myModal" role="dialog">

        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <textarea id="message_body"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info send" id="34" data-dismiss="modal">Send</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
</div>
<div id="edit" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Personal details </h4>
            </div>
            <div class="modal-body">
                <label>Name:</label>
                <input type="text" placeholder="Please enter your name" id="name_input">

                <p hidden id="required">* This field is required</p>
                <label>Surname:</label>
                <input type="text" placeholder="Please enter your name" id="surname_input">

                <p hidden id="required">* This field is required</p>

                <p hidden id="required">* This field is required</p>
                <label>Email:</label>
                <input type="text" placeholder="Please enter your email" id="email_input">


                <p hidden id="required">* This field is required</p>

                <label>Job:</label>
                <input type="text" placeholder="Please enter your job" id="job">
                <p hidden id="required">* This field is required</p>
                <label>educational level:</label>
                <select>
                    <option>Primary/Elementary school</option>
                    <option>High school</option>
                    <option>College</option>
                    <option>University</option>
                </select><br>
                <a data-toggle="modal" class="btn btn-primary" data-target='#manage' id="manage_interest"><i class="fa fa-cogs fa-lg"></i><span>Manage our interests</span></a>
            </div>
            <div class="modal-footer">
                <button class="btn-primary btn" id="edit" ><span class="glyphicon glyphicon-ok"></span> Sumbit</button>
                <button class="btn-danger btn" data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span> Cancel</button>

            </div>

        </div>
    </div>
</div>

</body>

</html>