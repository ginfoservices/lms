<?php
if (!session_start()) {
	session_start();
}
include('dbcon.php');

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'") or die(mysql_error());
$count = mysqli_num_rows($query);
$row = mysqli_fetch_array($query);


if ($count > 0) {

	$_SESSION['id'] = $row['user_id'];
mysqli_query($conn, "insert into user_log (username,login_date,user_id)values('$username',NOW()," . $row['user_id'] . ")") or die(mysqli_error());
	echo 'true';

	
} else {
	echo 'false';
}

?>