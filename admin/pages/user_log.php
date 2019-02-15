<div class="col-md-9">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Users Log</li>
        </ol>
    </nav>

    <div class="row">
    <div class="col-md-12">
                 <table cellpadding="0" cellspacing="0"  class="table" id="dataTables">

                        <thead>
                            <tr>
                                <th>Date Login</th>
                                <th>Date logout</th>
                                <th>Username</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_query = mysqli_query($conn, "select * from user_log order by user_log_id ASC") or die(mysqli_error());
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