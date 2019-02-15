<div class="col-md-9">
    <nav aria-label="breadcrumb" data-readOnly="true">
        <ol class="breadcrumb" data-readOnly="true">
            <li class="breadcrumb-item active" aria-current="page" data-readOnly="true">Home</li>
        </ol>
    </nav>

    <div class="row">
        <?php 
        $query_reg_teacher = mysqli_query($conn, "select * from teacher where teacher_status = 'Registered' ") or die(mysqli_error());
        $count_reg_teacher = mysqli_num_rows($query_reg_teacher);
        ?>
        <input type="text" value="<?php echo $count_reg_teacher; ?>" class="dial" data-readOnly="true">
        <small>Registered Teacher</small>
                <?php 
                $query_teacher = mysqli_query($conn, "select * from teacher") or die(mysqli_error());
                $count_teacher = mysqli_num_rows($query_teacher);
                ?>
        <input type="text" value="<?php echo $count_teacher; ?>" class="dial" data-readOnly="true">
        <label class="form-label">

        <small>Teachers</small>

        <?php 
        $query_student = mysqli_query($conn, "select * from student where status='Registered'") or die(mysqli_error());
        $count_student = mysqli_num_rows($query_student); ?>

        <input type="text" value="<?php echo $count_student; ?>" class="dial" data-readOnly="true">
        <small>Registered Students</small>

        <?php $query_student = mysqli_query($conn, "select * from student") or die(mysqli_error());
        $count_student = mysqli_num_rows($query_student);
        ?>
        <input type="text" value="<?php echo $count_student; ?>" class="dial" data-readOnly="true">
        <small>Students        </small>
        <?php 
        $query_class = mysqli_query($conn, "select * from class") or die(mysqli_error());
        $count_class = mysqli_num_rows($query_class);
        ?>
        <input type="text" value="<?php echo $count_class; ?>" class="dial" data-readOnly="true">
        <small>Classes        </small>
    </div>


    <?php 
    $query_file = mysqli_query($conn, "select * from files") or die(mysqli_error());
    $count_file = mysqli_num_rows($query_file);
    ?>

    <input type="text" value="<?php echo $count_file; ?>" class="dial" data-readOnly="true">
    <small>Downloadable File    </small>

    <?php 
    $query_subject = mysqli_query($conn, "select * from subject") or die(mysqli_error());
    $count_subject = mysqli_num_rows($query_subject);
    ?>
    <input type="text" value="<?php echo $count_subject; ?>" class="dial" data-readOnly="true">
    <small>Subjects    </small>
</div>
</div>