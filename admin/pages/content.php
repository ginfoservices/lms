<div class="col-md-9">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Content</li>
        </ol>


    </nav>

    <div class="row">
        <div class="col-md-12">
            <!-- block -->

            <form action="delete_content.php" method="post">
                <a href="index.php?page=add_content" class="btn btn-info">Add Content </a>
                <button type="submit" id="delete" name="form_name" value="content" class="btn btn-danger float-right"
                    onClick="return confirm('Are you sure you want to delete this item?');">Delete</button>

                <table cellpadding="0" cellspacing="0" class="table mt-3" id="dataTables">

                    <thead>
                        <tr>

                            <th></th>
                            <th>Title</th>
                            <th></th>

                        </tr>

                    </thead>
                    <tbody>

                        <?php
                        $content_query = mysqli_query($conn, "select * from content") or die(mysqli_error());
                        while ($row = mysqli_fetch_array($content_query)) {
                            $id = $row['content_id'];
                            ?>

                        <tr>
                            <td width="30">
                                <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox"
                                    value="<?php echo $id; ?>">
                            </td>
                            <td><?php echo $row['title']; ?></td>
                            <td width="30"><a href="index.php?page=edit_content&id=<?= $id; ?>"
                                    class="btn btn-success">Edit</a></td>


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