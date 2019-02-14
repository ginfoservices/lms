<div class="span3" id="sidebar">
    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        <li class="<?= ($page == 'dashboard') ? 'active' : ''; ?>"> <a href="dashboard.php?page=dashboard"><i
                    class="icon-chevron-right"></i><i class="icon-home"></i>&nbsp;Dashboard</a> </li>
        <li class="<?= ($page == 'subjects' || $page == 'add_subject') ? 'active' : ''; ?>">
            <a href="dashboard.php?page=subjects"><i class="icon-chevron-right"></i><i class="icon-list-alt"></i>
                Subject</a>
        </li>
        <li class="<?= ($page == 'class') ? 'active' : ''; ?>">
            <a href="dashboard.php?page=class"><i class="icon-chevron-right"></i><i class="icon-group"></i> Class</a>
        </li>
        <li class="<?= ($page == 'admin_user') ? 'active' : ''; ?>">
            <a href="dashboard.php?page=admin_user"><i class="icon-chevron-right"></i><i class="icon-user"></i> Admin
                Users</a>
        </li>
        <li class="<?= ($page == 'department') ? 'active' : ''; ?>">
            <a href="dashboard.php?page=department"><i class="icon-chevron-right"></i><i class="icon-building"></i>
                Department</a>
        </li>
        <li class="<?= ($page == 'students') ? 'active' : ''; ?>">
            <a href="dashboard.php?page=students"><i class="icon-chevron-right"></i><i class="icon-group"></i>
                Students</a>
        </li>
        <li class="<?= ($page == 'teachers') ? 'active' : ''; ?>">
            <a href="dashboard.php?page=teachers"><i class="icon-chevron-right"></i><i class="icon-group"></i>
                Teachers</a>
        </li>
        <li class="<?= ($page == 'downloadable') ? 'active' : ''; ?>">
            <a href="dashboard.php?page=downloadable"><i class="icon-chevron-right"></i><i class="icon-download"></i>
                Downloadable
                Materials</a>
        </li>
        <li class="<?= ($page == 'assignment') ? 'active' : ''; ?>">
            <a href="dashboard.php?page=assignment"><i class="icon-chevron-right"></i><i class="icon-upload"></i>
                Uploaded
                Assignments</a>
        </li>
        <li class="<?= ($page == 'content') ? 'active' : ''; ?>">
            <a href="dashboard.php?page=content"><i class="icon-chevron-right"></i><i class="icon-file"></i> Content</a>
        </li>
        <li class="<?= ($page == 'user_log') ? 'active' : ''; ?>">
            <a href="dashboard.php?page=user_log"><i class="icon-chevron-right"></i><i class="icon-file"></i> User
                Log</a>
        </li>
        <li class="<?= ($page == 'activity_log') ? 'active' : ''; ?>">
            <a href="dashboard.php?page=activity_log"><i class="icon-chevron-right"></i><i class="icon-file"></i>
                Activity Log</a>
        </li>
        <li class="<?= ($page == 'school_year') ? 'active' : ''; ?>">
            <a href="dashboard.php?page=school_year"><i class="icon-chevron-right"></i><i class="icon-calendar"></i>
                School
                Year</a>
        </li>
        <li class="<?= ($page == 'calendar_of_events') ? 'active' : ''; ?>">
            <a href="dashboard.php?page=calendar_of_events"><i class="icon-chevron-right"></i><i
                    class="icon-calendar"></i>Calendar of
                Events</a>
        </li>
    </ul>
</div>