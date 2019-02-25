<script src="http://<?= $_SERVER['HTTP_HOST']; ?>/js/popper.js"></script>

<script src="http://<?= $_SERVER['HTTP_HOST']; ?>/js/bootstrap.js"></script>

<script src="http://<?= $_SERVER['HTTP_HOST']; ?>/js/sweetalert.min.js"></script>
<script src="http://<?= $_SERVER['HTTP_HOST']; ?>/js/feather.min.js"></script>
<script src="http://<?= $_SERVER['HTTP_HOST']; ?>/js/jquery.knob.js"></script>
<script src="http://<?= $_SERVER['HTTP_HOST']; ?>/js/datatables.min.js"></script>

<script src="http://<?= $_SERVER['HTTP_HOST']; ?>/js/moment.min.js"></script>
<script src="http://<?= $_SERVER['HTTP_HOST']; ?>/js/fullcalendar.js"></script>
<script src="http://<?= $_SERVER['HTTP_HOST']; ?>/js/trumbowyg.js"></script>
<script>
$(document).ready(function() {
    $.trumbowyg.svgPath = 'http://www.lms.com/css/icons.svg';
    $('#text-content').trumbowyg();
    $(".dial").knob();
    $('#dataTables').DataTable({
        'searching': false,
        'lengthChange': false
    });

});
</script>

<script>
$(function() {

    // Easy pie charts
    var calendar = $('#calendar').fullCalendar({



        editable: false,
        // US Holidays
        events: [
            <?php $event_query = mysqli_query($conn, "select * from event where teacher_class_id = '' ") or die(mysqli_error());
            while ($event_row = mysqli_fetch_array($event_query)) {
                ?> {
                title: '<?php echo $event_row['event_title']; ?> ',
                start: '<?php echo $event_row['date_start']; ?>',
                end: '<?php echo $event_row['date_end']; ?>'
            },
            <?php 
        } ?>
        ]

    });
});
</script>





<script>
$(document).ready(function() {
    $("#login_form").submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "login.php",
            data: formData,
            success: function(response) {
                if (response == 'true') {
                    swal('Login', 'You have successfully logged in.', 'success', {
                        timer: 2000,
                        button: false
                    }).then(function() {
                        window.location.replace('index.php');
                    });
                } else {
                    swal('Login', 'Login failed try again', 'success', {
                        timer: 2000,
                        button: false
                    }).then(function() {
                        window.location.replace('index.php');
                    });
                }

            }
        });

    });
});
</script>
<script>
$(document).ready(function() {
    $("#signin_student").submit(function(e) {
        e.preventDefault();

        var password = $('#password').val();
        var cpassword = $('#cpassword').val();


        if (password == cpassword) {
            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "student_signup.php",
                data: formData,
                success: function(html) {
                    console.log(html);
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
    $("#user_login").submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "login.php",
            data: formData,
            success: function(html) {
                if (html == 'teacher_success') {
                    swal('Login', 'You have successfully logged in as a teacher.',
                        'success', {
                            timer: 2000,
                            button: false
                        }).then(function() {
                        window.location.replace('teacher/index.php.php');
                    });

                } else if (html == 'student_success') {
                    swal('Login', 'You have successfully logged in as a student.',
                        'success', {
                            timer: 2000,
                            button: false
                        }).then(function() {
                        window.location.replace('student/index.php');
                    });

                } else {
                    swal('Login', 'Failed to login, please try again',
                        'error', {
                            timer: 2000,
                            button: false
                        }).then(function() {
                        window.location.replace('index.php');
                    });
                }
            }
        });

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

<script>
$(document).ready(function() {
    $("#department").submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "process.php",
            data: formData,
            success: function(response) {
                if (response === 'true') {
                    swal('Department', 'You have successfully added the department.',
                        'success', {
                            timer: 2000,
                            button: false
                        }).then(function() {
                        window.location.replace('index.php?page=department');
                    });
                } else if (response === 'false') {
                    swal('Department', 'We could not add the department to the database',
                        'error', {
                            timer: 2000,
                            button: false
                        }).then(function() {
                        window.location.replace('index.php?page=department');
                    });
                } else {
                    alert(response);
                    // swal('Department', 'Something went wrong!', 'error', {
                    //     timer: 2000,
                    //     button: false
                    // }).then(function() {
                    //     window.location.replace('index.php?page=department');
                    // });
                }

            }
        });

    });
});
</script>

</body>

</html>