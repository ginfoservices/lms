<div class="col-md-9">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Activity Log</li>
        </ol>
    </nav>

    <div class="row">
    <div class="col-md-12">
                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="dataTables">

                        <thead>
                            <tr>

                                <th>Date</th>
                                <th>User</th>
                                <th>Action</th>

                            </tr>

                        </thead>
                        <tbody>

                            <?php
                            $query = mysqli_query($conn, "select * from  activity_log") or die(mysqli_error());
                            while ($row = mysqli_fetch_array($query)) {
                                ?>




                            <tr>

                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['action']; ?></td>


                            </tr>

                            <?php 
                        } ?>


                        </tbody>
                    </table>
                </div>
            </>
        </div>
        <!-- /block -->


</div>