<?php
include('../db_connection.php');
if(!empty($_POST['id'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM gallery WHERE project_id = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="gallery_responsive"><div class="gallery">';
            echo '
            <a target="_blank" href="images/gallery/'.$row['gallery'].'">
            <img class="img-fluid img-thumbnail" src="images/gallery/'.$row['gallery'].'" alt="Cinque Terre">
            </a>';
            echo ' </a></div></div>';
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
            echo '<div class="gallery_responsive"><div class="gallery">';
            echo '
            <a target="_blank" href="images/gallery/'.$row['gallery'].'">
            <img class="img-fluid img-thumbnail" src="images/gallery/'.$row['gallery'].'" alt="Cinque Terre">
            </a>';
            echo ' </a></div></div>';
        }
    }
}

?>