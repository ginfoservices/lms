<div class="span3" id="adduser">
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Add Department</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form method="post">
                        <div class="control-group">
                            <div class="controls">
                                <input class="input focused" id="focusedInput" name="d" type="text"
                                    placeholder="Deparment">
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <input class="input focused" id="focusedInput" name="pi" type="text"
                                    placeholder="Person Incharge">
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
    if (isset($_POST['save'])) {
        $pi = $_POST['pi'];
        $d = $_POST['d'];


        $query = mysql_query("select * from department where department_name = '$d' and dean = '$pi' ") or die(mysql_error());
        $count = mysql_num_rows($query);

        if ($count > 0) { ?>
    <script>
    alert('Data Already Exist');
    </script>
    <?php

} else {
    mysql_query("insert into department (department_name,dean) values('$d','$pi')") or die(mysql_error());
    ?>
    <script>
    window.location = "department.php";
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
                <div class="muted pull-left">Department List</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form action="delete_department.php" method="post">
                        <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                            <a data-toggle="modal" href="#department_delete" id="delete" class="btn btn-danger"
                                name=""><i class="icon-trash icon-large"></i></a>
                            <?php include('modal_delete.php'); ?>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Department</th>
                                    <th>Person In-charge</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $user_query = mysqli_query($conn, "select * from department") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($user_query)) {
                                    $id = $row['department_id'];
                                    ?>

                                <tr>
                                    <td width="30">
                                        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox"
                                            value="<?php echo $id; ?>">
                                    </td>
                                    <td><?php echo $row['department_name']; ?></td>
                                    <td><?php echo $row['dean']; ?></td>

                                    <td width="30"><a href="edit_department.php<?php echo '?id=' . $id; ?>"
                                            class="btn btn-success"><i class="icon-pencil icon-large"></i></a></td>


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