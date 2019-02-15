<!--/span-->
<div class="col-md-9">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Calendar</li>
        </ol>
    </nav>

    <div class="row">
    <div class="col-md-8">
           
                
                <div id='calendar'></div>
            </div>

            <div class="col-md-4">
                <form id="signin_student" class="form-signin" method="post">
               
<h4>Add Event</h4>
                    <div class="form-group">
                    <label for="date_start" class="sr-only">Start date</label>
                    <input type="text" class="form-control datepicker" name="date_start" id="date01"
                        placeholder="Date Start" required />
                        </div>
                        <div class="form-group">
                            <label for="end_start" class="sr-only">End date</label>
                        <input type="text" class="form-control datepicker" name="date_end" id="date01"
                            placeholder="Date End" required />
                        </div>
                        <div class="form-group">
                        <label for="title" class="sr-only">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                        required />
                         </div>
                    <button id="signin" name="add" class="btn btn-info btn-block mb-3" type="submit"><i class="icon-save"></i>
                        Save</button>
                  

                </form>



                <?php
                if (isset($_POST['add'])) {
                    $date_start = $_POST['date_start'];
                    $date_end = $_POST['date_end'];
                    $title = $_POST['title'];

                    $query = mysqli_query($conn, "insert into event (date_end,date_start,event_title) values('$date_end','$date_start','$title')") or die(mysqli_error());
                    ?>
                <script>
                window.location = "calendar_of_events.php";
                </script>
                <?php

            }
            ?>
 <form action="delete.php" method="post">
                <h4>Event list</h4>
                 <table cellpadding="0" cellspacing="0" class="table" id="dataTables">


                    <thead>
                        <tr>
                            <th></th>
                            <th>Event</th>
                            <th>Date</th>
                       

                        </tr>

                    </thead>
                    <tbody>


                        <?php $event_query = mysqli_query($conn, "select * from event where teacher_class_id = '' ") or die(mysqli_error());
                        while ($event_row = mysqli_fetch_array($event_query)) {
                            $id = $event_row['event_id'];
                            ?>
                        <tr id="del<?php echo $id; ?>">
                        <td>
                                                <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                    type="checkbox" value="<?php echo $id; ?>">
                                            </td>
                            <td><?php echo $event_row['event_title']; ?> </td>
                            <td><?php echo $event_row['date_start']; ?>
                                <br>To
                                <?php echo $event_row['date_end']; ?>
                            </td>
                        




                        </tr>

                        <?php 
                    } ?>


                    </tbody>
                </table>
                </form>
            </div>
            <!-- block -->
            </div>
        </div>
    </div>
</div>