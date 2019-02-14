<form action="delete_student.php" method="post">
    <table cellpadding="0" cellspacing="0"  class="table" id="example">
        <a data-toggle="modal" href="#student_delete" id="delete" class="btn btn-danger" name=""><i
                class="icon-trash icon-large"></i></a>
        <div class="pull-right">
            <ul class="nav nav-pills">
                <li class="active">
                    <a href="dashboard.php?page=students">All</a>
                </li>
                <li class="">
                    <a href="dashboard.php?page=students&type=registered">Unregistered</a>
                </li>
                <li class="">
                    <a href="dashboard.php?page=students&type=unregistered"">Registered</a>
</li>
</ul>
</div>
<?php include('modal_delete.php'); ?>
<thead>
<tr>
<th></th>

<th>Name</th>
<th>ID Number</th>

<th>Course Yr & Section</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
if (isset($_GET['type']) && $_GET['type'] == 'registered') {
	$query = mysqli_query($conn, "select * from student LEFT JOIN class ON student.class_id = class.class_id where status = 'Registered' ORDER BY student.student_id DESC") or die(mysqli_error());
} else if (isset($_GET['type']) && $_GET['type'] == 'unregistered') {
	$query = mysqli_query($conn, "select * from student LEFT JOIN class ON student.class_id = class.class_id where status = 'Unregistered' ORDER BY student.student_id DESC") or die(mysqli_error());
} else {
	$query = mysqli_query($conn, "select * from student LEFT JOIN class ON student.class_id = class.class_id ORDER BY student.student_id DESC") or die(mysqli_error());
}

while ($row = mysqli_fetch_array($query)) {
	$id = $row['student_id'];
	?>

<tr>
	<td width="30"><input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>"></td>

	<td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
	<td><?php echo $row['username']; ?></td>

	<td width="100"><?php echo $row['class_name']; ?></td>

	<td width="30"><a href="edit_student.php<?php echo '?id=' . $id; ?>" class="btn btn-success"><i	class="icon-pencil"></i> </a></td>

</tr>
<?php 
} ?>

                        </tbody>
    </table>
</form>