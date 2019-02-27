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
$page_title .= " - " . ucfirst($page);

require_once 'includes/header.php';
if (isset($_SESSION['id'])) { include('includes/navbar.php'); ?>

<div class="container-fluid">
    <div class="row">
        <?php 
        
        include ('includes/sidebar_dashboard.php'); 
        
        include 'pages/' . $page . '.php'; ?>
    </div>
</div>
<?php } else { ?>
<style>
.login {
    height: 100%;
    width: 100%;
    margin: 0;
  }

.login-form {
    left: 50%;
    top: 50%;
    position: absolute;
    -webkit-transform: translate3d(-50%, -50%, 0);
    -moz-transform: translate3d(-50%, -50%, 0);
    transform: translate3d(-50%, -50%, 0);
}
</style>
<div class="login">
    <div class="login-form col-md-4 text-center">
        <h1 class="mb-5" >Learning <small>Management System</small></h1>
        <form id="login_form" method="post">
            <div class="form-group">
                <label class="sr-only" for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label class="sr-only" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button name="form_name" value="user" type="submit" class="btn btn-primary">Sign In</button>
        </form>
    </div>
</div>
<!-- /container -->
<?php } include('includes/footer.php'); ?>