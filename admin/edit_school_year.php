<div class="row-fluid">
       <!-- block -->
       <div class="block">
           <div class="navbar navbar-inner block-header">
               <div class="muted pull-left">Add School Year</div>
           </div>
           <div class="block-content collapse in">

           <?php
							$query = mysqli_query($conn, "select * from school_year LEFT JOIN class ON class.class_id = student.class_id where student_id = '$get_id'")or die(mysqli_error());
							$row = mysqli_fetch_array($query);
							?>
               <div class="span12">
                   <form method="post">
                       <div class="control-group">
                           <div class="controls">
                               <input class="input focused" name="school_year" id="focusedInput" type="text"
                                   placeholder="School Year" required value=<?php $row['school_year'] ?>>
                           </div>
                       </div>


                       <div class="control-group">
                           <div class="controls">
                               <button name="save" class="btn btn-info"><i
                                       class="icon-plus-sign icon-large"></i></button>

                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
       <!-- /block -->
   </div>

   <?php
if (isset($_POST['save'])){
$school_year = $_POST['school_year'];



$query = mysqli_query($conn, "select * from school_year where school_year = '$school_year'")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
   <script>
alert('Data Already Exist');
   </script>
   <?php
}else{
mysqli_query($conn, "insert into school_year (school_year) values('$school_year')")or die(mysqli_error());

mysqli_query($conn, "insert into activity_log (date,username,action) values(NOW(),'$user_username','Add School Year $school_year')")or die(mysqli_error());
?>
   <script>
window.location = "school_year.php";
   </script>
   <?php
}
}
?>