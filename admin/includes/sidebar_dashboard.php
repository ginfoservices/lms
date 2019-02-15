<div class="col-md-3" id="sidebar">
   <style>
	   .nav{
		     background-color: #333;
		  
	   }
	   a.nav-link{
		   color: white;
	   }
.nav-link.active {
  background-color: #666;
  color: white;
}
	</style>
       <ul class="nav flex-column">
        <li class="nav-item"> 
        	<a class="nav-link  <?= ($page == 'dashboard') ? 'active' : ''; ?>" href="index.php?page=dashboard">Dashboard</a> </li>

        <li class="nav-item">
            <a href="index.php?page=activity_log" class="nav-link  <?= ($page == 'activity_log') ? 'active' : ''; ?>" >
                Activity Log</a>
        </li>
        <li  class="nav-item">
            <a href="index.php?page=admin_user" class="nav-link  <?= ($page == 'admin_user') ? 'active' : ''; ?>">Admin
                Users</a>
        </li>
        <li  class="nav-item">
            <a href="index.php?page=calendar_of_events" class="nav-link  <?= ($page == 'calendar_of_events') ? 'active' : ''; ?>">Calendar of
                Events</a>
        </li>
        <li  class="nav-item">
            <a href="index.php?page=class" class="nav-link  <?= ($page == 'class') ? 'active' : ''; ?>">Class</a>
        </li>
        <li class="nav-item">
            <a href="index.php?page=content" class="nav-link  <?= ($page == 'content' || $page == 'add_content') ? 'active' : ''; ?>"> Content</a>
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
        <li class="nav-item" >
            <a href="index.php?page=school_year" class="nav-link  <?= ($page == 'school_year') ? 'active' : ''; ?>">
                School
                Year</a>
        </li>
        <li class="nav-item">
            <a href="index.php?page=students" class="nav-link  <?= ($page == 'students') ? 'active' : ''; ?>">
                Students</a>
        </li>
        <li class="nav-item">
            <a href="index.php?page=subjects" class="nav-link  <?= ($page == 'subjects' || $page == 'add_subject') ? 'active' : ''; ?>">
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
       
        <li class="nav-item" >
            <a href="index.php?page=user_log" class="nav-link  <?= ($page == 'user_log') ? 'active' : ''; ?>">User
                Log</a>
        </li>

       
    </ul>
</div>