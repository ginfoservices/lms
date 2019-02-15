<?php 
if (!session_start()) {
	session_start();
}


require_once 'dbcon.php'; 
$page_title = "LMS";
$directory = '';

if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];

} else {
    $page = 'dashboard';
}
$page_title .= " - ".ucfirst($page);

require_once 'includes/header.php'; 
if(isset($_SESSION['id'])){ 
 include('includes/navbar.php'); ?>
   
   
    <div class="container-fluid">
        <div class="row">
            <?php include('includes/sidebar_dashboard.php'); ?>
            <!--/span-->
            <?php include 'pages/' . $page . '.php'; ?>
        </div>
        
</div>

        
   

 <?php  } else { ?>
   
    <div class="container">
<form id="login_form" method="post">
       <div class="form-group">
           <label class="sr-only" for="username">Username</label>
           <input type="text" class="form-control" id="username" name="username" placeholder="username">
          
       </div>
       <div class="form-group">
          <label class="sr-only" for="password">Email address</label>
           <input type="password" class="form-control" id="password" name="password" placeholder="username">
       </div>
     
       <button name="form_name" value="user" type="submit" class="btn btn-primary">Sign In</button>
   </form>

     
    </div> <!-- /container -->
 <?php } include('includes/footer.php'); ?>