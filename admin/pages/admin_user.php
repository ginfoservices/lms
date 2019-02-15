<div class="col-md-9">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Admin Users</li>
        </ol>
    </nav>
    <?php
    if (isset($_GET['id'])) {
        $query = mysqli_query($conn, "select * from user where user_id = '$id'") or die(mysqli_error());
        $row = mysqli_fetch_array($query);
    }

    ?>

    <div class="row">


        <div class="col-md-3">




            <legend>Add User</legend>

            <form method="post">
                <div class="form-group">
                    <label for="" class="sr-only"></label>
                    <input class="form-control" name="firstname" id="focusedInput" type="text"
                        value="<?= (isset($_GET['id'])) ? $row['firstname'] : ''; ?>" placeholder="Firstname" required>

                </div>

                <div class="form-group">
                    <label for="" class="sr-only"></label>
                    <input class="form-control" name="lastname" id="focusedInput" type="text"
                        value="<?= (isset($_GET['id'])) ? $row['lastname'] : ''; ?>" placeholder="Lastname" required>

                </div>

                <div class="form-group">
                    <label for="" class="sr-only"></label>
                    <input class="form-control" name="username" id="focusedInput" type="text"
                        value="<?= (isset($_GET['id'])) ? $row['username'] : ''; ?>" placeholder="Username" required>

                </div>

                <div class="form-group">
                    <label for="" class="sr-only"></label>
                    <input class="form-control" name="password" id="focusedInput" type="password"
                        value="<?= (isset($_GET['id'])) ? $row['password'] : ''; ?>" placeholder="Password" required>

                </div>

                <div class="form-group">
                    <label for="" class="sr-only"></label>
                    <button name="save" class="btn btn-info btn-block">Add</button>


                </div>
            </form>
        </div>

        <div class="col-md-9">


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
   

   <form action="delete.php" method="post">
            <!-- block -->
            <legend>Admin User list  <button type="submit" id="delete" name="form_name" class="btn btn-danger float-right" value="user" class="btn btn-danger"
                                    onClick="return confirm('Are you sure you want to delete this item?');">Delete</button></legend>
                      
                       
                            <table cellpadding="0" cellspacing="0" class="table" id="dataTables">
                               

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
                                                <a href="dashboard.php?page=admin_user&id=<?= $id; ?>"
                                                    class="btn btn-success">Edit</a>
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