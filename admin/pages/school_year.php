
<div class="col-md-3" id="adduser">

    <div class="row">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Add School Year</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form method="post">
                        <?php 
                        if (isset($_GET['id'])) {
                            $query = mysqli_query($conn, "select * from school_year LEFT JOIN class ON class.class_id = student.class_id where student_id = '$id'") or die(mysqli_error());
                            $row = mysqli_fetch_array($query);

                        }

                        ?>
                        <div class="control-group">
                            <div class="controls">
                                <input class="input focused" name="school_year" id="focusedInput" type="text"
                                    placeholder="School Year" required
                                    value=<?= isset($_GET['id']) ? $row['school_year'] : ''; ?>>
                            </div>
                        </div>


                        <div class="control-group">
                            <div class="controls">
                                <button name="<?= isset($_GET['id']) ? 'update' : 'save'; ?>" class="btn btn-info"><i
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
        $school_year = $_POST['school_year'];



        $query = mysqli_query($conn, "select * from school_year where school_year = '$school_year'") or die(mysqli_error());
        $count = mysqli_num_rows($query);

        if ($count > 0) { ?>
    <script>
    alert('Data Already Exist');
    </script>
    <?php

} else {
    mysqli_query($conn, "insert into school_year (school_year) values('$school_year')") or die(mysqli_error());

    mysqli_query($conn, "insert into activity_log (date,username,action) values(NOW(),'$user_username','Add School Year $school_year')") or die(mysqli_error());
    ?>
    <script>
    window.location = "school_year.php";
    </script>
    <?php

}
}
?>
</div>
<div class="span6" id="">
    <div class="row">
        <!-- block -->
        <div id="block_bg" class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">School Year List</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form action="delete_sy.php" method="post">
                        <table cellpadding="0" cellspacing="0" class="table" id="example">
                            <a data-toggle="modal" href="#user_delete" id="delete" class="btn btn-danger" name=""><i
                                    class="icon-trash icon-large"></i></a>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>School Year</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $user_query = mysqli_query($conn, "select * from school_year") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($user_query)) {
                                    $id = $row['school_year_id'];
                                    ?>

                                <tr>
                                    <td width="30">
                                        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox"                                       value="<?php echo $id; ?>">
                                    </td>
                                    <td><?php echo $row['school_year']; ?></td>



                                    <td width="40">
                                        <a href="dashboard.php?page=school_year&id=<?= $id; ?>" data-toggle="modal"
                                            class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                    </td>


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