<div class="col-md-9">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Student</li>
        </ol>
    </nav>
<?php 
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = mysqli_query($conn, "select * from student LEFT JOIN class ON class.class_id = student.class_id where student_id = '$id'") or die(mysqli_error());
    $row = mysqli_fetch_array($query);
}
?>
<div class="row">
    <div class="col-md-3">
        <legend>Add Student</legend>
        <div class="muted pull-left"></div>

    <form method="post">
        
        <div class="form-group">

            <select name="cys" class="form-control" required>

                <?php
                $cys_query = mysqli_query($conn, "select * from class order by class_name");
                while ($cys_row = mysqli_fetch_array($cys_query)) {

                    ?>
                <option value="<?php echo $cys_row['class_id']; ?>"
                    <?= (isset($_GET['id']) ? ($row['class_id'] == $cys_row['class_id'] ? 'selected' : '') : '') ?>>
                    <?php echo $cys_row['class_name']; ?></option>
                <?php 
            } ?>
            </select>
        </div>
        <div class="form-group">

            <input name="un" value="<?php echo $row['username']; ?>" class="form-control" id="focusedInput" type="text"
                placeholder="ID Number" required>

        </div>
        <div class="form-group">

            <input name="fn" value="<?php echo $row['firstname']; ?>" class="form-control" id="focusedInput"
                type="text" placeholder="Firstname" required>

        </div>

        <div class="form-group">

            <input name="ln" value="<?php echo $row['lastname']; ?>" class="form-control" id="focusedInput" type="text"
                placeholder="Lastname" required>

        </div>



        <button name="<?= isset($_GET['id']) ? 'update' : 'save'; ?>" class="btn btn-success">Submit</button>


</div>
</form>
</div>
</div>
</div>
<!-- /block -->
</div>
<?php
if (isset($_POST['update'])) {

    $un = $_POST['un'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $cys = $_POST['cys'];


    mysqli_query($conn, "update student set username = '$un' , firstname ='$fn' , lastname = '$ln' , class_id = '$cys' where student_id = '$id' ") or die(mysqli_error());



    ?>

<script>
window.location = $_SERVER['HTTP_REFERER'];
</script>

<?php 
} ?>

<?php

if (isset($_POST['save'])) {
    $un = $_POST['un'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $class_id = $_POST['cys'];

    mysqli_query($conn, "insert into student (username,firstname,lastname,location,class_id,status)
    values ('$un','$fn','$ln','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','Unregistered')                                    
    ") or die(mysqli_error()); ?>
<script>
window.location = $_SERVER['HTTP_REFERER'];
</script>

<?php

}
?>
<!-- <script>
    jQuery(document).ready(function($) {
        $("#add_student").submit(function(e) {
            e.preventDefault();
            var _this = $(e.target);
            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "save_student.php",
                data: formData,
                success: function(html) {
                    $.jGrowl("Student Successfully  Added", {
                        header: 'Student Added'
                    });
                    $('#studentTableDiv').load('student_table.php', function(response) {
                        $("#studentTableDiv").html(response);
                        $('#example').dataTable({
                            "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
                            "sPaginationType": "bootstrap",
                            "oLanguage": {
                                "sLengthMenu": "_MENU_ records per page"
                            }
                        });
                        $(_this).find(":input").val('');
                        $(_this).find('select option').attr('selected', false);
                        $(_this).find('select option:first').attr('selected', true);
                    });
                }
            });
        });
    });
    </script> -->
</div>
<div class="span6" id="">
    <div class="row">
        <!-- block -->
        <div id="block_bg" class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Student List</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12" id="studentTableDiv">
                    <form action="delete.php" method="post">
                        <table cellpadding="0" cellspacing="0" class="table" id="example">
                            <div class="pull-left"><button type="submit" id="delete" name="form_name" value="student"
                                    class="btn btn-danger"
                                    onClick="return confirm('Are you sure you want to delete this item?');"><i
                                        class="icon-trash icon-large"></i></a></div>



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
	<td width="
                                            30"><input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                type="checkbox" value="<?php echo $id; ?>"></td>

                                            <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                            <td><?php echo $row['username']; ?></td>

                                            <td width="100"><?php echo $row['class_name']; ?></td>

                                            <td width="30"><a href="dashboard.php?page=students&id=<?= $id; ?>"
                                                    class="btn btn-success"><i class="icon-pencil"></i> </a></td>

                                            </tr>
                                            <?php 
                                        } ?>

                                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>


</div>