<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location:../viewer/login.php");
    echo headers_sent();
}


?>

<html xmlns="http://www.w3.org/1999/html">
<head xmlns="http://www.w3.org/1999/html">
    <link rel="shortcut icon" href="images/favicon.ico"/>   <!-- Browser Icon -->

    <meta charset="UTF-8">
    <title>E-pals - Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--JQUERY LIBRARIES-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!--END-->
    <!--BOOSTRAP LIBRARIES-->
    <!-- This is what you need -->
    <script src="../controler/js/sweet-alert.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css">


    <!--END-->


    <!--TAG IT-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />


    <link href="../viewer/css/profile.css" rel="stylesheet">
    <link href="../viewer/css/style.css" rel="stylesheet">
    <!--script src="../controler/js/profile.js"></script-->
    <script src="../controler/js/profile.js"></script>
    <script src="../controler/js/common_functions.js"></script>

    <script src="../controler/js/photo/save.js"></script>
    <script src="../controler/js/photo/user_pic.js"></script>

    <!--animsition--->
    <script src="../controler/js/animsition.js"></script>
    <script src="../controler/js/style.js"></script>
    <link href="../viewer/css/animsition.css" rel="stylesheet">

    <script src="../controler/js/bootstrap-table.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap-table.min.css">

    <script src="../controler/js/jquery.ddslick.js "></script>
    <script src="../controler/js/bootstrap3-typeahead.js"></script>
    <script src="../controler/js/search.js"></script>
    <link href="../viewer/css/search.css" rel="stylesheet">

    <script src="../controler/js/autocomplete.js"></script>

</head>
<body>
<p class="username" hidden><?php echo $_SESSION['user_id'] ?></p>

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
                        <input type="search" class="search" id="inputSearch">
                        <div id="divResult"></div>
                    </div>
                </div>
            </form>
            <div class="collapse navbar-collapse">
                <div  id="not" align="right">
                    <script>

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
                <div class="profile-usertitle-name">
                    <h1 style="text-align: center;">Personal Details</h1>
                    <h4 class="name"> </h4>
                    <h4 class="surname"> </h4>

                    <h4 id="email"></h4>
                    <h4 id="address"></h4>
                    <h4 id="birthday"></h4>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button class="btn btn-primary">FOLLOW</button>
                </div>

            </div>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU 0-->
                <div class="sidebar">

                    <ul>

                        <li><a data-toggle="modal" data-target='#interest' id="interests"><i class="fa fa-check"></i><span>Interests</span></a></li>
                        <li id="account"><a  data-toggle="modal" data-target='#edit' id="account"><i class="fa fa-cogs fa-lg"></i><span>Account Settings</span></a></li>
                        <li><a href="../model/logout.php" id="account"><i class="fa fa-power-off fa-lg"></i><span>Log out</span></a></li>
                        </ul>

                </div>
                <!-- END MENU -->

</div>

<div class="footer" >

    <div class="footer_img" align="center">
        <a href="#"><img src="../viewer/images/Logo_01.png" height ="30" width="140"></a><em style = "vertical-align: top;
color:darkblue;">&copy;<?php echo date("Y");?></em></div>
</div>

<div id="interest" class="modal fade "  role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Choose your Interests?</h4>

            </div>
            <div class="modal-body">


                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle  interest_button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="category"> Category <span class="caret"></span></button>
                            <ul  class="dropdown-menu interests">

                            </ul>
                        </div><!-- /btn-group -->
                        <input type="text"    placeholder="Type your interests" id="keyword" >
                        <button class="btn  btn-danger" id="add" type="button">
                            <span class=" fa fa-plus"></span></button>
                        <div class="results"></div>
                    </div><!-- /input-group -->

                    <table
                        id="table"
                        data-toggle="table"
                        data-click-to-select="true"
                        data-show-columns="true"
                        data-search="true"
                        data-pagination="true"
                        data-unique-id="uniqueId">
                        <thead>
                        <tr>
                            <th data-field="uniqueId" data-visible="false"></th>
                            <th data-field="title">Title</th>
                            <th data-field="category">Category</th>
                        </tr>
                        </thead>
                    </table>

                </div>





            <div class="modal-footer">
                    <button class="btn-primary btn" id="save_interest" ><span class="glyphicon glyphicon-ok"></span> Save</button>
                    <button class="btn-danger btn" data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
</div>

</div>

<div id="photo" class="modal fade"  role="dialog">
    <div class="modal-dialog">

    <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Choose your photo?</h4>

                </div>
                    <div class="modal-body">
                        <div id="dragandrophandler">Drag & Drop Files Here</div><br><br>
                        <div id="status1"></div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn-primary btn" id="photo_save" ><span class="glyphicon glyphicon-ok"></span> Save</button>
                        <button class="btn-danger btn" data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span> Cancel</button>

                    </div>
                </div>
            </div>
</div>
    <div id="edit" class="modal fade">
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
    <div id="manage" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit your interests </h4>
                </div>
                <div class="modal-body">
                    <label>Interest:</label>

                    <div id="interest_containter">
                        <table class="table table-bordered table-condensed">
                            <thead >
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




                            </tbody>
                        </table>
                    </div>



                </div>
                <div class="modal-footer">
                    <button class="btn-primary btn" id="manage" ><span class="glyphicon glyphicon-ok"></span> Save</button>
                    <button class="btn-danger btn" data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span> Cancel</button>

                </div>

            </div>
        </div>
    </div>
<script src="../controler/js/autocomplete.js"></script>
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

</body>
</html>

