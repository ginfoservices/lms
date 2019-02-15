<div class="col-md-9">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Edit Content</li>
        </ol>
    </nav>
    <a href="" class="btn btn-info" btn btn-info mb-3>Add Content</a>

        <a href="dashboard.php?page=content" class="btn btn-danger">Back</a>
       
        <!-- block -->
        
                <?php
                if (isset($_GET['id'])) {

                    $id = $_GET['id'];

                    $query = mysqli_query($conn, "select * from content where content_id = '$id'") or die(mysqli_error());
                    $row = mysqli_fetch_array($query);
                }
                ?>

                <form class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label for="title">Title</label>
                        
                            <input type="text" name="title" id="title" placeholder="Title"
                                value="<?php echo $row['title']; ?>">
                      
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                      
                            <textarea name="content" id="text-content" class="form-control">
												<?php echo $row['content']; ?>
												</textarea>
                     
                    </div>



                    <div class="form-group">
                        <div class="forms">

                            <button name="update" type="submit" class="btn btn-info"><i
                                    class="icon-save icon-large"></i> Update</button>
                        </div>
                    </div>
                </form>

                <?php
                if (isset($_POST['update'])) {
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    mysqli_query($conn, "update content set title = '$title' , content = '$content' where content_id = '$id'") or die(mysqli_error());
                    ?>
                <script>
                window.location = 'content.php';
                </script>
                <?php

            }
            ?>


            </div>
        </div>
        <!-- /block -->
    </div>


</div>