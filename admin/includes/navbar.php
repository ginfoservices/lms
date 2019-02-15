<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Learning Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03"
        aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample03">
        <?php $query = mysqli_query($conn, "select * from user where user_id = '$_SESSION[id]'") or die(mysqli_error());
        $row = mysqli_fetch_array($query);
        ?>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown03" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><?php echo $row['firstname'] . " " . $row['lastname']; ?>
                    <i class="caret"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdown03">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>


                </div>
            </li>
        </ul>   
    </div>
</nav>