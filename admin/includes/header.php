<?php
if (!session_start()) {
    session_start();
}
include('dbcon.php');

//Check whether the session variable SESS_MEMBER_ID is present or not
if (isset($_SESSION['id'])) {

    $session_id = $_SESSION['id'];

    $user_query = mysqli_query($conn, "select * from user where user_id = '$session_id'") or die(mysqli_error());
    $user_row = mysqli_fetch_array($user_query);
    $user_username = $user_row['username'];

    $page = (isset($_GET['page'])) ? $_GET['page'] : 'dashboard';
    ?>



<?php

} else {



    ?>
    <script>
    window.location = "dashboard.php?page=dashboard";
    </script>
<?php } ?>
<!DOCTYPE html>
<html class="no-js">

<head>
    <title>Learning Management System</title>
    <!-- Bootstrap -->
    <!-- <link href="images/logo.png" rel="icon" type="image"> -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/my_style.css" rel="stylesheet" media="screen">
    <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <!-- calendar css -->
    <link href="vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- data table -->
    <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
    <!-- notification  -->
    <link href="vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
    <!-- wysiwug  -->
    <link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css">

    <script src="vendors/jGrowl/jquery.jgrowl.js"></script>
</head>