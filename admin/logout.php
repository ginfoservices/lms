<?php
if (!session_start()) {
	session_start();
}
require_once 'dbcon.php';
mysqli_query($conn, "update user_log set logout_Date = NOW() where user_id = '$session_id' ") or die(mysqli_error());

session_destroy();
header('location:index.php');
?>