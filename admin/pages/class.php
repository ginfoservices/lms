<div class="span3" id="adduser">
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Add Class</div>
            </div>
            <?php
            if (isset($_GET['id'])) {

                $query = mysqli_query($conn, "select * from $page where {$page}_id = '$id'") or die(mysql_error());
                $row = mysqli_fetch_array($query);

            }

            ?>
            <div class="block-content collapse in">
                <div class="span12">
                    <form method="post">
                        <div class="control-group">
                            <div class="controls">
                                <input name="class_name" class="input focused"
                                    value="<?= (isset($_GET['id'])) ? $row['class_name'] : ''; ?>" id="focusedInput"
                                    type="text" placeholder="Class Name" required>
                            </div>
                        </div>


                        <div class="control-group">
                            <div class="controls">
                                <button name="save" class="btn btn-info"><i
                                        class="icon-plus-sign icon-large"></i></button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /block -->
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
</div>
<div class="span6" id="">
    <div class="row-fluid">
        <!-- block -->
        <div id="block_bg" class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Class List</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form action="delete.php" method="post">
                        <table cellpadding="0" cellspacing="0" class="table" id="example">
                            <button type="submit" id="delete" name="form_name" value="class" class="btn btn-danger"
                                onClick="return confirm('Are you sure you want to delete this item?');"><i
                                    class="icon-trash icon-large"></i></a>
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
                                            <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                type="checkbox" value="<?php echo $id; ?>">
                                        </td>
                                        <td><?php echo $class_row['class_name']; ?></td>
                                        <td width="40"><a href="dashboard.php?page=class&id=<?= $id; ?>"
                                                class="btn btn-success"><i class="icon-pencil icon-large"></i>
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
        <!-- /block -->
    </div>


</div>