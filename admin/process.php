<?php
include('dbcon.php');

$table = $_POST['form_name'];
unset($_POST['form_name']);

$data = $_POST;
$fields = $values = array();
foreach (array_keys($data) as $key) {
	$fields[] = "`$key`";
	$values[] = "'" . mysqli_real_escape_string($conn, $data[$key]) . "'";

}


$fields = implode(",", $fields);
$values = implode(",", $values);


$query = "INSERT INTO `$table` ($fields) VALUES ($values)";

if (mysqli_query($conn, $query)) {
	echo 'true';
} else {
	echo 'false';
}
?>