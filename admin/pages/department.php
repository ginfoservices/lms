<div class="col-md-9">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Departments</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-3">
            <h4>Add Department</h4>

            <form method="post" id="department">
                <?php 
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = mysqli_query($conn, "select * from department where department_id = '$id'") or die(mysqli_error());
                    $row = mysqli_fetch_array($query);
                    ?>
                    <input type="hidden" value="<?= $_GET['id']; ?>">
                    <?php 
                } ?>
                 <input type="hidden" name="form_name" value="department">
                <div class="form-group">
                    <input class="form-control" value="<?= isset($_GET['id']) ? $row['department_name'] : ''; ?>"
                        id="focusedInput" name="department_name" type="text" placeholder="Deparment">
                </div>

                <div class="form-group">
                    <input class="form-control" value="<?= isset($_GET['id']) ? $row['dean'] : ''; ?>" id="focusedInput"
                        name="dean" type="text" placeholder="Person Incharge">
                </div>



                <button class="btn btn-success btn-block"><?= isset($_GET['id']) ? 'Update' : 'Save'; ?></button>


            </form>
        </div>

        <?php
    //     if (isset($_POST['update'])) {


    //         $dn = $_POST['dn'];
    //         $d = $_POST['d'];

    //         mysqli_query("update department set department_name = '$dn' , dean  = '$d' where department_id = '$id' ") or die(mysqli_error());

    //         echo "<script>
    //     window.location = 'department.php';
    //     </script>";

    //     }

    //     if (isset($_POST['save'])) {
    //         $pi = $_POST['pi'];
    //         $d = $_POST['d'];


    //         $query = mysqli_query($conn, "select * from department where department_name = '$d' and dean = '$pi' ") or die(mysql_error());
    //         $count = mysqli_num_rows($query);

    //         if ($count > 0) {
    //             echo "<script>
    //     alert('Data Already Exist');
    //     </script>";


    //         } else {
    //             mysqli_query($conn, "insert into department (department_name,dean) values('$d','$pi')") or die(mysql_error());
    //           
    //         echo "<script>
    //         window.location = 'index.php?page=department';
    //         </script>;
    //        

    //     }
    // }
        ?>

        <div class="col-md-9">
            <h4>Department List</h4>
            <form action="delete.php" method="post" >
                <table cellpadding="0" cellspacing="0" class="table" id="dataTables">
                    <button type="submit" id="delete" name="form_name" value="department" class="btn btn-danger"
                        onClick="return confirm('Are you sure you want to delete this item?');">Delete</button>

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

                            <td width="30"><a href="index.php?page=department&id=<?= $id; ?>"
                                    class="btn btn-success">Edit</a></td>


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