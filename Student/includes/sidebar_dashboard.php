<div class="col-md-3" id="sidebar">
    <style>
    .nav {
        background-color: #333;

    }

    a.nav-link {
        color: white;
    }

    .nav-link.active {
        background-color: #666;
        color: white;
    }
    </style>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link  <?= ($page == 'dashboard') ? 'active' : ''; ?>"
                href="index.php?page=dashboard">Dashboard</a> </li>

        <li class="nav-item">
            <a href="index.php?page=student_notification"
                class="nav-link  <?= ($page == 'student_notification') ? 'active' : ''; ?>">
                Notifications


            </a>
        </li>
        <li class="nav-item">
            <?php
											$message_query = mysqli_query($conn, "select * from message where reciever_id = '$session_id' and message_status != 'read' ") or die(mysql_error());
											$count_message = mysqli_num_rows($message_query);
											?>
            <a href="index.php?page=student_message"
                class="nav-link  <?= ($page == 'student_message') ? 'active' : ''; ?>">Messages

                <?php if ($count_message == '0') {
															} else { ?>
                <span class="badge badge-important"><?php echo $count_message; ?></span>
                <?php 
														} ?>
            </a>
        </li>
        <li class="nav-item">
            <a href="index.php?page=backpack" class="nav-link  <?= ($page == 'backpack') ? 'active' : ''; ?>">Files</a>
        </li>
        <li class="nav-item">
            <a href="index.php?page=class" class="nav-link  <?= ($page == 'class') ? 'active' : ''; ?>">Class</a>
        </li>
        <li class="nav-item">
            <a href="index.php?page=content"
                class="nav-link  <?= ($page == 'content' || $page == 'add_content') ? 'active' : ''; ?>"> Content</a>
        </li>

        <li class="nav-item">
            <a href="index.php?page=department" class="nav-link  <?= ($page == 'department') ? 'active' : ''; ?>">
                Department</a>
        </li>
        <li class="nav-item">
            <a href="index.php?page=downloadable" class="nav-link  <?= ($page == 'downloadable') ? 'active' : ''; ?>">
                Downloadable
                Materials</a>
        </li>
        <li class="nav-item">
            <a href="index.php?page=school_year" class="nav-link  <?= ($page == 'school_year') ? 'active' : ''; ?>">
                School
                Year</a>
        </li>
        <li class="nav-item">
            <a href="index.php?page=students" class="nav-link  <?= ($page == 'students') ? 'active' : ''; ?>">
                Students</a>
        </li>
        <li class="nav-item">
            <a href="index.php?page=subjects"
                class="nav-link  <?= ($page == 'subjects' || $page == 'add_subject') ? 'active' : ''; ?>">
                Subject</a>
        </li>



        <li class="nav-item">
            <a href="index.php?page=teachers" class="nav-link  <?= ($page == 'teachers') ? 'active' : ''; ?>">
                Teachers</a>
        </li>

        <li class="nav-item">
            <a href="index.php?page=assignment" class="nav-link  <?= ($page == 'assignment') ? 'active' : ''; ?>">
                Uploaded
                Assignments</a>
        </li>

        <li class="nav-item">
            <a href="index.php?page=user_log" class="nav-link  <?= ($page == 'user_log') ? 'active' : ''; ?>">User
                Log</a>
        </li>


    </ul>
</div>