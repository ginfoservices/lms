<div class="col-md-9">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Downloadable File List</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <table cellpadding="0" cellspacing="0" class="table" id="dataTables">

                <thead>
                    <tr>
                        <th>Date Upload</th>
                        <th>File Name</th>
                        <th>Description</th>
                        <th>Upload By</th>
                        <th>Class</th>

                    </tr>

                </thead>
                <tbody>

                    <?php
                    $query = mysqli_query($conn, "select * FROM files LEFT JOIN teacher ON teacher.teacher_id = files.teacher_id 
																				  LEFT JOIN teacher_class ON teacher_class.teacher_class_id = files.class_id 
																				  INNER JOIN class ON class.class_id = teacher_class.class_id  ") or die(mysqli_error());
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                    <tr>
                        <td><?php echo $row['fdatein']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['fdesc']; ?></td>
                        <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                        <td><?php echo $row['class_name']; ?></td>


                    </tr>

                    <?php 
                } ?>


                </tbody>
            </table>
        </div>
    </div>
</div>