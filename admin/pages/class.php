<!--/span-->
<div class="col-md-9">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Classes</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-3" id="adduser">
            <h4>Add Class</h4>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = mysqli_query($conn, "select * from $page where {$page}_id = '$id'") or die(mysql_error());
                $row = mysqli_fetch_array($query);

            }

            ?>

            <form method="post">

                <div class="form-group">
                    <input name="class_name" class="form-control"
                        value="<?= (isset($_GET['id'])) ? $row['class_name'] : ''; ?>" id="focusedInput" type="text"
                        placeholder="Class Name" required>
                </div>




                <button name="save" class="btn btn-info btn-block">Save</button>



            </form>
        </div>

<?php
    if (isset($_POST['update'])) {
        $class_name = $_POST['class_name'];

        mysqli_query($conn, "update class set class_name = '$class_name' where class_id = '$id' ") or die(mysql_error());
        ?>

        <?php

}

if (isset($_POST['save'])) {
    $class_name = $_POST['class_name'];


    $query = mysqli_query($conn, "select * from class where class_name  =  '$class_name' ") or die(mysqli_error());
    $count = mysqli_num_rows($query);

    if ($count > 0) { ?>
        <script>
        alert('Date Already Exist');
        </script>
        <?php

} else {
    mysqli_query($conn, "insert into class (class_name) values('$class_name')") or die(mysqli_error());
    ?>
        <script>
        window.location = "dashboard.php?page=class";
        </script>
        <?php

}
}
?>

        <div class="col-md-9" id="">
            <h4>Class list</h4>

            <form action="delete.php" method="post">
                <table cellpadding="0" cellspacing="0" class="table" id="dataTables">
                    <button type="submit" id="delete" name="form_name" value="class" class="btn btn-danger"
                        onClick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Course Year And Section</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                    $class_query = mysqli_query($conn, "select * from class") or die(mysqli_error());
                                    while ($class_row = mysqli_fetch_array($class_query)) {
                                        $id = $class_row['class_id'];
                                        ?>

                        <tr>
                            <td width="30">
                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox"
                                    value="<?php echo $id; ?>">
                            </td>
                            <td><?php echo $class_row['class_name']; ?></td>
                            <td width="40"><a href="index.php?page=class&id=<?= $id; ?>" class="btn btn-success">Edit
                                </a></td>


                        </tr>
                        <?php 
                                } ?>


                    </tbody>
                </table>
            </form>
        </div>



    </div>

</div>