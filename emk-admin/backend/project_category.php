<?php
include('../db_connection.php');

// File upload path

$name = $_POST['name'];

if (isset($_POST['submit_main_project_category'])) {

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

      