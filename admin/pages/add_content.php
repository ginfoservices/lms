<div class="col-md-9">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Add Content</li>
        </ol>
    </nav>
    <a href="index.php?page=content" class="btn btn-danger mb-3">Back</a>
    <form id="content_add">
        <input type="hidden" name="form_name" value="content">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="text-content">Content</label>
            <textarea name="content" class="form-control" id="text-content"></textarea>
        </div>
        <button type="submit" class="btn btn-info">Save</button>
    </form>

    <script>
$(document).ready(function() {

    $("#content_add").submit(function(e) {
                e.preventDefault();

        var formData = $('#content_add').serialize();
        $.ajax({
            type: "post",
            url: "process.php",
            data: formData,
            dataType: "text",
            success: function(response) {
                console.log(response);
            }
        });


    });
});
</script>

</div>