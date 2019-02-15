
<div class="col-md-3" id="adduser">
<div class="row">
       <!-- block -->
       <div class="block">
           <div class="navbar navbar-inner block-header">
               <div class="muted pull-left">Add Teacher</div>
           </div>
           <div class="block-content collapse in">
               <div class="span12">
               <form method="post">
                       <!--
										<label>Photo:</label>
										<div class="control-group">
                                          <div class="controls">
                                               <input class="input-file uniform_on" id="fileInput" type="file" required>
                                          </div>
                                        </div>
									-->
                       <?php
                        $query = mysqli_query($conn, "select * from teacher where teacher_id = '$id' ") or die(mysqli_error());
                        $row = mysqli_fetch_array($query);
                        ?>

                       <div class="control-group">
                           <label>Department:</label>
                           <div class="controls">
                               <select name="department" class="chzn-select" required>
                                   

                                   <?php
                                    $department = mysqli_query($conn, "select * from department order by department_name");
                                    while ($department_row = mysqli_fetch_array($department)) {

                                        ?>
                                   <option value="<?php echo $department_row['department_id']; ?>" <?= ($row['department_id'] == $department_row['department_id']) ? 'selected' : ''; ?>>
                                       <?php echo $department_row['department_name']; ?></option>
                                   <?php 
                                } ?>
                               </select>
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <input class="input focused" value="<?php echo $row['firstname']; ?>" name="firstname"
                                   id="focusedInput" type="text" placeholder="Firstname">
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <input class="input focused" value="<?php echo $row['lastname']; ?>" name="lastname"
                                   id="focusedInput" type="text" placeholder="Lastname">
                           </div>
                       </div>



                       <div class="control-group">
                           <div class="controls">
                               <button name="<?= isset($_GET['id']) ? 'update' : 'save'; ?>" class="btn btn-success"><i
                                       class="icon-save icon-large"></i></button>

                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
       <!-- /block -->
   </div>

   <?php
    if (isset($_POST['update'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $department_id = $_POST['department'];


        $query = mysqli_query($conn, "select * from teacher where firstname = '$firstname' and lastname = '$lastname' ") or die(mysqli_error());
        $count = mysqli_num_rows($query);

        if ($count > 1) { ?>
   <script>
alert('Data Already Exist');
   </script>
   <?php

} else {

    mysqli_query($conn, "update teacher set firstname = '$firstname' , lastname = '$lastname' , department_id = '$department_id' where teacher_id = '$id' ") or die(mysqli_error());

    ?>
   <script>
window.location = $_SERVER['HTTP_REFERER'];
   </script>
   <?php 
}
} ?>
   <?php

    if (isset($_POST['save'])) {
        var_dump($_POST);
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $department_id = $_POST['department'];


        $query = mysqli_query($conn, "select * from teacher where firstname = '$firstname' and lastname = '$lastname' ") or die(mysqli_error());
        $count = mysqli_num_rows($query);

        if ($count > 0) { ?>
   <script>
alert('Data Already Exist');
   </script>
   <?php

} else {

    mysqli_query($conn, "insert into teacher (firstname,lastname,location,department_id)
								values ('$firstname','$lastname','uploads/NO-IMAGE-AVAILABLE.jpg','$department_id')         
								") or die(mysqli_error()); ?>
   <script>
window.location = $_SERVER['HTTP_REFERER'];
   </script>
   <?php 
}
} ?></div>
<div class="span6" id="">
    <div class="row">
        <!-- block -->
        <div id="block_bg" class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Teacher List</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form action="delete.php" method="post">
                        <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                        <button type="submit" id="delete" name="form_name" value="teacher" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this item?');"><i class="icon-trash icon-large"></i></a>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Username</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $teacher_query = mysqli_query($conn, "select * from teacher") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($teacher_query)) {
                                    $id = $row['teacher_id'];
                                    $teacher_stat = $row['teacher_stat'];
                                    ?>
                                <tr>
                                    <td width="30">
                                        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox"
                                            value="<?php echo $id; ?>">
                                    </td>
                                    <td width="40"><img class="img-circle" src="<?php echo $row['location']; ?>"
                                            height="50" width="50">
                                    </td>
                                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                    <td><?php echo $row['username']; ?></td>

                                    <td width="50"><a href="dashboard.php?page=teachers&id=<?= $id; ?>"
                                            class="btn btn-success"><i class="icon-pencil"></i></a></td>
                                    <?php if ($teacher_stat == 'Activated') { ?>
                                    <td width="120"><a href="de_activate.php<?php echo '?id=' . $id; ?>"
                                            class="btn btn-danger"><i class="icon-remove"></i>
                                            Deactivate</a></td>
                                    <?php 
                                } else { ?>
                                    <td width="120"><a href="dashboard.php?page=teachers&id=<?= $id; ?>"
                                            class="btn btn-success"><i class="icon-check"></i> Activated</a>
                                    </td>
                                    <?php 
                                } ?>
                                </tr>
                                <?php 
                            } ?>

                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>


</div>