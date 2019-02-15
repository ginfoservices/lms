<div class="col-md-9">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Add Content</li>
        </ol>
    </nav>


    <a href="dashboard.php?page=content" class="btn btn-danger mb-3">Back</a>
    <form class="form-horizontal" method="POST">
        <div class="form-group">
            <label for="title">Title</label>

            <input type="text" class="form-control" name="title" id="title" placeholder="Title">

        </div>

        <div class="form-group">
            <label for="text-content">Content</label>
            <textarea name="content" class="form-control" id="text-content"></textarea>

        </div>


        <button name="save" type="submit" class="btn btn-info"><i class="icon-save icon-large"></i>
            Save</button>

    </form>
    <?php
    if (isset($_POST['save'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        mysqli_query($conn, "insert into content (title,content) value('$title','$content')") or die(mysqli_error());
        ?>
    <script>
    window.location = 'content.php';
    </script>
    <?php

}
?>


</div>