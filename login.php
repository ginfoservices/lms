<?php

if (!session_start()) {

	session_start();
}

include('admin/dbcon.php');
var_dump($_POST);
var_dump($_SESSION);
$username = $_POST['username'];
$password = $_POST['password'];
/* student */
$query_student = "SELECT * FROM student WHERE username='$username' AND password='$password'";

/* teacher */
$query_teacher = "SELECT * FROM teacher WHERE username='$username' AND password='$password'";

if($row_student  = mysqli_fetch_array(mysqli_query($conn, $query_student), MYSQLI_ASSOC)){

	$_SESSION['id'] = $row_student['student_id'];
	header("Location: student_notification.php");

	// $row_teach = mysqli_query($conn, $query_teacher);
	// $row = mysqli_fetch_array($row_teach, MYSQLI_ASSOC);
} else if( $row_teacher = mysqli_fetch_array(mysqli_query($conn, $query_teacher), MYSQLI_ASSOC)){
	$_SESSION['id'] = $row_teacher['teacher_id'];
	header("Location: dasboard_teacher.php");
} else {
	header("Location: index.php?login=failed");
}







?>