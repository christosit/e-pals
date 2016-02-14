<?php
include '../model/connect.php';
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location:login.php");//
}
?>

<html>
<head>

    <link rel="shortcut icon" href="images/favicon.ico"/>   <!-- Browser Icon -->

    <meta charset="UTF-8">
    <title>E-pals - Administrator Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--JQUERY LIBRARIES-->
    <script src="../controler/js/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!--END-->
    <!--BOOSTRAP LIBRARIES-->
    <script src="../controler/js/bootstrap/bootstrap.min.js"></script>
    <link href="../viewer/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.css" rel="stylesheet">


    <!--END-->

    <!--TAG IT-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-tokenfield.css">
    <script src="../controler/js/bootstrap/bootstrap-tokenfield.js"></script>
    <!-- END TAG-IT-->


    <link href="../viewer/css/profile_admin.css" rel="stylesheet">
    <link href="../viewer/css/admin.css" rel="stylesheet">
    <link href="../viewer/css/style.css" rel="stylesheet">


    <!--chart-->
    <script src="../controler/js/chart/Chart.js"></script>
    <script src="../controler/js/admin.js"></script>
    <script src="../controler/js/make_chart.js"></script>

    <script src="../controler/js/toggles.min.js"></script>
    <link href="css/toggles-full.css" rel="stylesheet">

    <!-- This is what you need -->
    <script src="../controler/js/sweet-alert.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css">

    <link rel="stylesheet" href="css/bootstrap-table.min.css">
    <script src="../controler/js/bootstrap-table.min.js"></script>




    <!--AUTOCOMPLETE-->

</head>
    <!--TAB-->
<script src="../controler/js/bootstrap-tabcollapse.js"></script>

<body>
<p class="username" hidden><?php echo $_SESSION['user_id'] ?></p>

<div class="container-fluid">

    <div class="header">
        <a href="home.php" id="menu-action">
            <img src="images/user.png"  class="user img-circle">
        </a>
        <div class="logo">
            <h4 id="name">User's Name    </h4>


        </div>
    </div>
    <div class="sidebar">
        <ul>
            <li><a id="interests"><i class="fa fa-check"></i><span>Interests</span></a></li>
            <li><a href="#" id="statistics"><i class="fa fa-area-chart"></i><span>Statistics<span></a></li>
            <li><a href="#" id="account"><i class="fa fa-user"></i><span>Account</span></a></li>
            <li><a href="../model/logout.php" id="account"><i class="fa fa-power-off"></i><span>Log out</span></a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="main">
        <div class="col-sm-offset-4" id="cat"><h1>TOP 10 CATEGORIES</h1><ol id="category" type="1"></ol></div>

        <div class="hipsum">
            <!-- Wrap all page content here -->

            <div class="jumbotron" id ="div_interests">
<br><br><br>



<div class="row"><div class="col-md-9">
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
                        <th data-field="counter" >A/A</th>
                        <th data-field="title">Title</th>
                        <th data-field="category">Category</th>
                        <th data-field="edit">Edit</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>

    </div> </div>

<br>
                <br>
              <div id="nav">
                    <div class=" navbar navbar-static-top">
                            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->

                                <h2>Interests</h2>
                                <button class="btn btn-warning" id="save_changes">Save Changes</button>



                    </div><!-- /.navbar -->
                </div>

            </div>

            <div class="jumbotron" id="div_statistics">
                <div class="row"><div class="col-md-9">
                        <table
                            id="table_account"
                            data-toggle="table"
                            data-click-to-select="true"
                            data-show-columns="true"
                            data-search="true"
                            data-pagination="true"
                            data-unique-id="uniqueId">
                            <thead>
                            <tr>
                                <th data-field="uniqueId" data-visible="false"></th>
                                <th data-field="counter" >User id</th>
                                <th data-field="name">Name</th>
                                <th data-field="surname">Surname</th>
                                <th data-field="email">Email</th>
                                <th data-field="admin">Administrator</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>

                    </div> </div>

            </div>

            <div class="jumbotron" id="div_account">
                <h1>Statistics</h1>
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Users</a></li>
                    <li><a href="#profile" data-toggle="tab">Interests</a></li>

                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="home">


                        <label for = "idOfCanvas" id="user_chart_tile">
                            User Subscription<br />



                        <canvas class="myChart"  width="400" height="400" ></canvas>
                        </label>

                        <div id="legend"></div>

                        <button class="btn make_chart btn-primary ">Create </button>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <div id="legend"></div>
                        <canvas class="myChart2" id="myid"  width="400" height="400"></canvas>


                        <button  class="btn make_chart2 btn-primary ">Create </button>
                    </div>
                </div>
            </div>

        </div>
        </div>

    <div class="footer" >

        <div class="footer_img" align="center">
            <a href="#"><img src="../viewer/images/Logo_01.png" height ="30" width="140"></a><em style = "vertical-align: top;
color:darkblue;">&copy;<?php echo date("Y");?></em></div>
    </div>
</div>

<script src="../controler/js/autocomplete_admin.js"></script>
</body>
</html>
