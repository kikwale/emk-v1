<?php
include('../db_connection.php');
if(!empty($_POST['id'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM gallery WHERE project_id = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-md-3 col-lg-3 col-sm-3">';
            echo '<img class="img-fluid w-100 shadow-1-strong rounded" src="images/gallery/'.$row['gallery'].'" alt="">';
            echo '</div>';
        }
    }
    else {
        echo "No Photos for this project";
    }
}
else {
    $sql = "SELECT * FROM gallery";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-md-3 col-lg-3 col-sm-3">';
            echo '<img class="img-fluid w-100 shadow-1-strong rounded" src="images/gallery/'.$row['gallery'].'" alt="">';
            echo '</div>';
        }
    }
}

?>