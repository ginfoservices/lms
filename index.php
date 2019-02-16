<?php 
include('admin/includes/header.php');
include('admin/dbcon.php');
?>
<body id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form id="login_form1" class="form-signin" method="post" action="login.php">
                    <h3 class="form-signin-heading"><i class="icon-lock"></i> Sign in</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="susername" name="susername" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="spassword" name="spassword" placeholder="Password" required>
                    </div>
                    <button id="signin" name="login" class="btn btn-info" type="submit">Sign in</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form id="signin_student" class="form-signin" method="post">
                    <h3 class="form-signin-heading"><i class="icon-lock"></i> Sign up as Student</h3>
                    <div class="form-group">
                        <label>Class</label>
                        <select name="class_id" class="form-control span5">
                            <?php $query = mysqli_query($conn, "select * from class order by class_name ") or die(mysqli_error()); while ($row = mysqli_fetch_array($query)) { ?>
                                <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="ID Number" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Re-type Password" required>
                    </div>
                    <button id="ssignin" name="ssignup" class="btn btn-info btn-block" type="submit">Sign Up</button>
                </form>
            </div>
            <div class="col-md-6">
                <form id="signin_teacher" class="form-signin" method="post">
                    <h3 class="form-signin-heading"><i class="icon-lock"></i> Sign up as Teacher</h3>
                    <div class="form-group">
                        <label>Department</label>
                        <select name="department_id" class="form-control span12">
                            <?php $query = mysqli_query($conn, "select * from department order by department_name ") or die(mysql_error()); while ($row = mysqli_fetch_array($query)) { ?>
                                <option value="<?php echo $row['department_id'] ?>"><?php echo $row['department_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tfirstname" placeholder="Firstname" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tlastname" placeholder="Lastname" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tusername" name="tusername" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="tpassword" name="tpassword" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="tcpassword" name="tcpassword" placeholder="Re-type Password" required>
                    </div>
                    <div class="form-group">
                        <button id="tsignin" name="tsignup" class="btn btn-info btn-block" type="submit">Sign Up</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about" data-toggle="modal">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calendar_of_events.php">Calendar of Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#directories" data-toggle="modal">Directories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#campuses" data-toggle="modal">Campuses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#developers" data-toggle="modal">Developers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#history" data-toggle="modal">History</a>
                    </li>                 
                </ul>
            </div>
        </div>
    </div>
    <!--/.nav-collapse -->
    <script>
    $(document).ready(function() {
        $("#signin_student").submit(function(e) {
            e.preventDefault();

            var password = jQuery('#password').val();
            var cpassword = jQuery('#cpassword').val();


            if (password == cpassword) {
                var formData = jQuery(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "student_signup.php",
                    data: formData,
                    success: function(html) {
                        if (html == 'true') {
                            $.jGrowl(
                                "Welcome to CHMSC Learning Management System", {
                                    header: 'Sign up Success'
                                });
                            var delay = 2000;
                            setTimeout(function() {
                                window.location =
                                    'dashboard_student.php'
                            }, delay);
                        } else if (html == 'false') {
                            $.jGrowl(
                                "student does not found in the database Please Sure to Check Your ID Number or Firstname, Lastname and the Section You Belong. ", {
                                    header: 'Sign Up Failed'
                                });
                        }
                    }


                });

            } else {
                $.jGrowl("student does not found in the database", {
                    header: 'Sign Up Failed'
                });
            }
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $("#login_form1").submit(function(e) {
            e.preventDefault();
            var formData = jQuery(this).serialize();
            $.ajax({
                type: "POST",
                url: "login.php",
                data: formData,
                success: function(html) {
                    if (html == 'teacher_success') {

                        var delay = 1000;
                        setTimeout(function() {
                            window.location = 'dasboard_teacher.php'
                        }, delay);
                    } else if (html == 'student_success') {

                        var delay = 1000;
                        setTimeout(function() {
                            window.location = 'student_notification.php'
                        }, delay);
                    } else {
                        window.location = 'index.php'
                    }
                }
            });
            return false;
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $("#signin_teacher").submit(function(e) {
            e.preventDefault();
            var password = jQuery('#password').val();
            var cpassword = jQuery('#cpassword').val();
            if (password == cpassword) {
                var formData = jQuery(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "teacher_signup.php",
                    data: formData,
                    success: function(html) {
                        if (html == 'true') {
                            $.jGrowl(
                                "Welcome to CHMSC Learning Management System", {
                                    header: 'Sign up Success'
                                });
                            var delay = 1000;
                            setTimeout(function() {
                                window.location =
                                    'dasboard_teacher.php'
                            }, delay);
                        } else {
                            $.jGrowl(
                                "Your data is not found in the database", {
                                    header: 'Sign Up Failed'
                                });
                        }
                    }
                });

            } else {
                $.jGrowl("Your data is not found in the database", {
                    header: 'Sign Up Failed'
                });
            }
        });
    });
    </script>
    <!-- Modal -->
    <div class="modal fade" id="developers" tabindex="-1" role="dialog" aria-labelledby="modelTitleId2" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Developers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <img class="card-img-top" src="holder.js/100x180/" alt="">
                                <div class="card-body">
                                    <h4 class="card-title">John Kevin Lorayna </h4>
                                    <p class="card-text">
                                        Address: Bago City<br />
                                        Email: jkevlorayna@gmail.com<br />
                                        Position: Programmer
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <img class="card-img-top" src="holder.js/100x180/" alt="">
                                <div class="card-body">
                                    <h4 class="card-title">John Kevin Lorayna </h4>
                                    <p class="card-text">
                                        Address: Bago City<br />
                                        Email: jkevlorayna@gmail.com<br />
                                        Position: Programmer
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <img class="card-img-top" src="holder.js/100x180/" alt="">
                                <div class="card-body">
                                    <h4 class="card-title">John Kevin Lorayna </h4>
                                    <p class="card-text">
                                        Address: Bago City<br />
                                        Email: jkevlorayna@gmail.com<br />
                                        Position: Programmer
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <img class="card-img-top" src="holder.js/100x180/" alt="">
                                <div class="card-body">
                                    <h4 class="card-title">John Kevin Lorayna </h4>
                                    <p class="card-text">
                                        Address: Bago City<br />
                                        Email: jkevlorayna@gmail.com<br />
                                        Position: Programmer
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="directories" tabindex="-1" role="dialog" aria-labelledby="modelTitleId3" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Directories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                        $mission_query = mysqli_query($conn, "select * from content where title  = 'Directories' ") or die(mysql_error());
                        $mission_row = mysqli_fetch_array($mission_query);
                        echo $mission_row['content'];
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="modelTitleId3" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">About</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                        $mission_query = mysqli_query($conn,"select * from content where title  = 'mission' ")or die(mysqli_error($mysqli));
                        $mission_row = mysqli_fetch_array($mission_query);
                        echo $mission_row['content'];
                    ?>
                    <hr />
                    <?php
                        $mission_query = mysqli_query($conn,"select * from content where title  = 'vision' ")or die(mysqli_error($mysqli));
                        $mission_row = mysqli_fetch_array($mission_query);
                        echo $mission_row['content'];
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="campuses" tabindex="-1" role="dialog" aria-labelledby="modelTitleId4" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Campuses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                        $mission_query = mysqli_query($conn, "select * from content where title  = 'Campuses' ") or die(mysql_error());
                        $mission_row = mysqli_fetch_array($mission_query);
                        echo $mission_row['content'];
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">History</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                        $mission_query = mysqli_query($conn, "select * from content where title  = 'History' ") or die(mysql_error());
                        $mission_row = mysqli_fetch_array($mission_query);
                        echo $mission_row['content'];
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php include('admin/includes/footer.php'); ?>
</body>
</html>