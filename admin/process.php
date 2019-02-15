<?php
include('dbcon.php');
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$table = $_POST['form_name'];
$data = $_POST;
$exclude = 'form_name';
$fields = $values = array();
if (!is_array($exclude)) $exclude = array($exclude);
foreach (array_keys($data) as $key) {
	if (!in_array($key, $exclude)) {
		$fields[] = "`$key`";
		$values[] = "'" . mysqli_real_escape_string($conn, $data[$key]) . "'";
	}
}
$fields = implode(",", $fields);
$values = implode(",", $values);
$query = "INSERT INTO `$table` ($fields) VALUES ($values)";
//echo $query;
if (mysqli_query($conn, $query)) {
	echo 'true';
} else {
	echo 'false';
}
?>