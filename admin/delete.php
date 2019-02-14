<?php
include('dbcon.php');

if (isset($_POST['form_name'])) {
	$table = $_POST['form_name'];
	$id = $_POST['selector'];
	$N = count($id);

	for ($i = 0; $i < $N; $i++) {
		$query = "DELETE FROM $table where {$table}_id='$id[$i]'";
		$result = mysqli_query($conn, $query);
	}
	header("location: $_SERVER[HTTP_REFERER]");
}
?>