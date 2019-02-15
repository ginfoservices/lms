<div class="col-md-9" id="content">
    <div class="row">
        <a href="dashboard.php?page=add_subject" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add
            Subject</a>
        <!-- block -->
        <div id="block_bg" class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Subject List</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form action="delete.php" method="post">
                        <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                            <button type="submit" id="delete" name="form_name" value="subject" class="btn btn-danger"
                                onClick="return confirm('Are you sure you want to delete this item?');"><i
                                    class="icon-trash icon-large"></i></a>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Subject Code</th>
                                        <th>Subject Title</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $subject_query = mysqli_query($conn, "select * from subject") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($subject_query)) {
                                        $id = $row['subject_id'];
                                        ?>

                                    <tr>
                                        <td width="30">
                                            <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                type="checkbox" value="<?php echo $id; ?>">
                                        </td>
                                        <td><?php echo $row['subject_code']; ?></td>
                                        <td><?php echo $row['subject_title']; ?></td>

                                        <td width="30"><a href="dashboard.php?page=edit_subject&id=<?= $id; ?>"
                                                class="btn btn-success"><i class="icon-pencil"></i> </a></td>
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