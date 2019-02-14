
<div class="span3" id="adduser">
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Add User</div>
            </div>

            <?php
            if (isset($_GET['id'])) {
                $query = mysqli_query($conn, "select * from user where user_id = '$id'") or die(mysqli_error());
                $row = mysqli_fetch_array($query);
            }

            ?>
            <div class="block-content collapse in">
                <div class="span12">
                    <form method="post">
                        <div class="control-group">
                            <div class="controls">
                                <input class="input focused" name="firstname" id="focusedInput" type="text" value="<?= (isset($_GET['id'])) ? $row['firstname'] : ''; ?>"
                                    placeholder="Firstname" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <input class="input focused" name="lastname" id="focusedInput" type="text" value="<?= (isset($_GET['id'])) ? $row['lastname'] : ''; ?>"
                                    placeholder="Lastname" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <input class="input focused" name="username" id="focusedInput" type="text" value="<?= (isset($_GET['id'])) ? $row['username'] : ''; ?>"
                                    placeholder="Username" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <input class="input focused" name="password" id="focusedInput" type="password" value="<?= (isset($_GET['id'])) ? $row['password'] : ''; ?>"
                                    placeholder="Password" required>
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
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];


        $query = mysqli_query($conn, "select * from user where username = '$username' and password = '$password' and firstname = '$firstname' and password = '$password' ") or die(mysqli_error());
        $count = mysqli_num_rows($query);

        if ($count > 0) { ?>
    <script>
    alert('Data Already Exist');
    </script>
    <?php

} else {
    mysqli_query($conn, "insert into user (username,password,firstname,lastname) values('$username','$password','$firstname','$lastname')") or die(mysqli_error());

    mysqli_query($conn, "insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $username')") or die(mysqli_error());
    ?>
    <script>
    window.location = $_SERVER['HTTP_REFERER'];
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
                <div class="muted pull-left">Admin Users List</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form action="delete.php" method="post">
                        <table cellpadding="0" cellspacing="0" class="table" id="example">
                            <button type="submit" id="delete" name="form_name" value="user" class="btn btn-danger"
                                onClick="return confirm('Are you sure you want to delete this item?');"><i
                                    class="icon-trash icon-large"></i></a>

                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Username</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $user_query = mysqli_query($conn, "select * from user") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($user_query)) {
                                        $id = $row['user_id'];
                                        ?>

                                    <tr>
                                        <td width="30">
                                            <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                type="checkbox" value="<?php echo $id; ?>">
                                        </td>
                                        <td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>

                                        <td><?php echo $row['username']; ?></td>

                                        <td width="40">
                                            <a href="dashboard.php?page=admin_user&id=<?= $id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
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