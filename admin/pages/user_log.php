<div class="span9" id="content">
    <div class="row-fluid">
        <!-- block -->
        <div id="block_bg" class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Users Log List</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    $conn, <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

                        <thead>
                            <tr>
                                <th>Date Login</th>
                                <th>Date logout</th>
                                <th>Username</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                        $user_query = mysqli_query($conn, "select * from user_log order by user_log_id ") or die(mysqli_error());
                                        while ($row = mysqli_fetch_array($user_query)) {
                                            $id = $row['user_log_id'];
                                            ?>

                            <tr>

                                <td><?php echo $row['login_date']; ?></td>
                                <td><?php echo $row['logout_date']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                            </tr>
                            <?php 
                                    } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>


</div>