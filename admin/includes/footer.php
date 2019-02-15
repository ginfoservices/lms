<script src="js/jquery.js"></script>
<script src="js/popper.js"></script>

<script src="js/bootstrap.js"></script>

<script src="js/sweetalert.min.js"></script>
<script src="js/feather.min.js"></script>
<script src="js/jquery.knob.js"></script>
<script type="text/javascript" src="js/datatables.min.js"></script>

<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.js'></script>
<script src="js/trumbowyg.js"></script>
<script>
$(document).ready(function() {
    $.trumbowyg.svgPath = 'css/icons.svg';
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