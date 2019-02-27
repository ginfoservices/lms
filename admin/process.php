<?php
include('dbcon.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $table = $_POST['form_name'];
    unset($_POST['form_name']);
    if(!isset($_POST['id'])){
    $data = $_POST;
    $fields = $values = array();
    foreach (array_keys($data) as $key) {
        $fields[] = "`$key`";
        $values[] = "'" . mysqli_real_escape_string($conn, $data[$key]) . "'";
    }


    $fields = implode(",", $fields);
    $values = implode(",", $values);


    $query = "INSERT INTO `$table` ($fields) VALUES ($values)";
    echo  $query;
    } 
    else 
    {
        $id = $_POST['id'];
        unset($_POST['id']);

        

        $data = implode(",",$_POST);
        $query = "UPDATE `$table` SET $data where {$table}_id = $id";
echo $query;
    }
    // if (mysqli_query($conn, $query)) {
    //     echo 'true';
    //     exit;
    // } else {
    //     echo 'false';
    //     exit;
    // }
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['page'])) {
        $table = $_GET['page'];

        if (!isset($_GET['delete'])) {
            $query = "select * from $table";
            $rsResult = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($rsResult) > 0) {
                //We start with header. >>>Here we retrieve the field names<<<
                echo "<table class='table table-bordered'>";
                $i = 0;
                while ($i < mysqli_num_fields($rsResult)) {
                    $field = mysqli_fetch_field_direct($rsResult, $i);
                    $fieldName = $field->name;
                    echo "<th>$fieldName</th>";
                    $i = $i + 1;
                }
                echo "<th colspan='2'></th></tr>";
                //>>>Field names retrieved<<<

                //We dump info
                $bolWhite = true;
                while ($row = mysqli_fetch_assoc($rsResult)) {
                    echo $bolWhite ? "<tr bgcolor=\"#CCCCCC\">" : "<tr bgcolor=\"#FFF\">";
                    $bolWhite = !$bolWhite;
                    foreach ($row as $data) {
                        echo "<td>$data</td>";
                    }
                        ?>
                    <td><a href="index.php?page=<?php echo $table; ?>&edit=<?php echo $row[$table . '_id']; ?>" class="btn btn-info">Edit</a></td>
                    <td><a href="process1.php?page=<?php echo $table; ?>&delete=<?php echo $row[$table . '_id']; ?>" id="delete" class="btn btn-danger"> Delete</a></td>

                    <?php echo "</tr>";
                }
                echo "</table>";
            }
        } else {

            $id = $_GET['delete'];
            $query = 'delete from ' . $table . ' where ' . $table . '_id =' . $id . '';
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo 'deleted';
                exit;
                //header("location: index.php?page=subjects&del=delete");
            } else {
                echo 'undeleted';
                exit;
                //header("location: index.php?page=subjects&del=delete Error");
            }
        }
    }
}



?> 