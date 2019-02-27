<?php 

require_once('dbcon.php');
$username = $_GET['username'];
$query = mysqli_query($conn, "select * from user where username = '$username'") or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0) {
    echo 'true';
} else {
    echo 'false';
}
 