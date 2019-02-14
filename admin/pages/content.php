<div class="span9" id="content">
    <div class="row-fluid">
        <a href="dashboard.php?page=add_content" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add
            Content</a>
        <!-- block -->
        <div id="block_bg" class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Content</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form action="delete_content.php" method="post">
                        <table cellpadding="0" cellspacing="0" class="table" id="example">
                        <button type="submit" id="delete" name="form_name" value="content" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this item?');"><i class="icon-trash icon-large"></i></a>

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
                                    <td width="30"><a href="dashboard.php?page=edit_content&id=<?= $id; ?>"
                                            class="btn btn-success"><i class="icon-pencil icon-large"></i></a></td>


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