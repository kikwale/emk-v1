<?php
include('../db_connection.php');

// File upload path



if (isset($_POST['submit_main_project_category'])) {
  $name = $_POST['name'];
  if(empty($name)){
    header('location: ../project_main.php?id=empty name');
  } else {
    
    
            $insert = $conn->query("INSERT into  main_project_title (name) VALUES ('".$name."')");
            if ( $insert) {
                header('location: ../project_main.php?id=inserted');
            } else {
                header('location: ../project_main.php?id=not inserted');
            }
  }
}

if (isset($_POST['submit_project_sub'])) {
  $name = $_POST['name'];
$main_project_title_id = $_POST['main_project_title_id'];
  if(empty($name)){
    header('location: ../project_sub.php?id=empty name');
  } else {
    
    
            $insert = $conn->query("INSERT into  sub_project_title (main_project_title_id,name) VALUES ('".$main_project_title_id."', '".$name."')");
            if ( $insert) {
                header('location: ../project_sub.php?id=inserted');
            } else {
                header('location: ../project_sub.php?id=not inserted');
            }
  }
}


if (isset($_POST['edit_main_project_btn'])) {
  $name = $_POST['name'];
  if(empty($name)){
    header('location: ../project_main.php?id=empty name');
  } else {
    
    $sql = "UPDATE main_project_title SET name='$name' WHERE id='".$_POST['id']."'";

  if (mysqli_query($conn, $sql)) {
    header('location: ../project_main.php?id=updated');
  } else {
    header('location: ../project_main.php?id=not updated');
  }
  }
}

if (isset($_POST['delete_main_project_btn'])) {

    
    $sql = "DELETE FROM main_project_title WHERE id='".$_POST['id']."'";

  if (mysqli_query($conn, $sql)) {
    header('location: ../project_main.php?id=deleted');
  } else {
    header('location: ../project_main.php?id=not deleted');
  }

}

if (isset($_POST['edit_sub_project_btn'])) {
  $name = $_POST['name'];
  if(empty($name)){
    header('location: ../project_sub.php?id=empty name');
  } else {
    
    $sql = "UPDATE sub_project_title SET main_project_title_id='".$_POST['main_project_title_id']."', name='$name' WHERE id='".$_POST['id']."'";

  if (mysqli_query($conn, $sql)) {
    header('location: ../project_sub.php?id=updated');
  } else {
    header('location: ../project_sub.php?id=not updated');
  }
  }
}

if (isset($_POST['delete_sub_project_btn'])) {

    
    $sql = "DELETE FROM sub_project_title WHERE id='".$_POST['id']."'";

  if (mysqli_query($conn, $sql)) {
    header('location: ../project_sub.php?id=deleted');
  } else {
    header('location: ../project_sub.php?id=not deleted');
  }

}

      