<div class="col-md-9">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Admin Users</li>
        </ol>
    </nav>
    <?php 
    if (isset($_GET['id'])) {

        $id = $_GET['id'];
        $query = mysqli_query($conn, "select * from school_year where school_year_id='$id'") or die(mysqli_error($conn));
        $row = mysqli_fetch_array($query);
    }
    ?>
    <div class="row">
        <div class="col-md-3">
            <legend>Add User</legend>
            <form id="year_form">
                <input type="hidden" name="form_name" value="school_year">
                <div class="form-group">
                    <input class="form-control" name="school_year" id="school_year" type="text"
                        placeholder="School Year" required value=<?= isset($_GET['id']) ? $row['school_year'] : ''; ?>>
                </div>

                <button name="<?= isset($_GET['id']) ? 'update' : 'save'; ?>" class="btn btn-info">Submit</button>



            </form>
            <script>
            $("#year_form").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();


                $.ajax({
                    type: "post",
                    url: "process.php",
                    data: formData,
                    dataType: "text",
                    success: function(response) {
                        if (response == "true") {
                            swal('School Year', 'School year was added successfully', 'success', {
                                timer: 2000,
                                button: false
                            }).then(function() {
                                window.location.replace('index.php?page=school_year');
                            });
                        }
                    }
                });
            });
            </script>
            <script>
            $("#school_year").keyup(function(e) {
                var username = $('#username').val();
                $.ajax({
                    type: "get",
                    url: "fetchData.php",
                    data: {
                        'username': username
                    },
                    dataType: "text",
                    success: function(response) {
                        if (response == 'false') {
                            $("#username").css('border', '2px solid green');

                        } else {
                            $("#username").css('border', '2px solid red');
                        }
                    }
                });
            });
            </script>
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

        <div class="col-md-9" id="">

            <form action="delete.php" method="post">
                <table cellpadding="0" cellspacing="0" class="table" id="dataTables">
                    <button type="submit" id="delete" name="form_name" class="btn btn-danger" value="school_year"                        class="btn btn-danger"
                        onClick="return confirm('Are you sure you want to delete this item?');">Delete</button></legend>

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
                            <td>
                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox"
                                    value="<?php echo $id; ?>">
                            </td>
                            <td><?php echo $row['school_year']; ?></td>



                            <td>
                                <a href="index.php?page=school_year&id=<?= $id; ?>" class="btn btn-success">Edit</a>
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