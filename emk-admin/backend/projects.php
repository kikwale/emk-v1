<?php
include('../db_connection.php');

// File upload path
$targetDir = "../../images/portfolio/";
$imageName = rand(1000,100000).basename($_FILES["image"]["name"]);

$targetFilePath = $targetDir . $imageName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

$description = $_POST['description'];
$details = $_POST['details'];
$title = $_POST['title'];
$sub_project_title_id = $_POST['sub_project_title_id'];

if (isset($_POST['submit_project'])) {

  if(empty($title)){
    header('location: ../projects.php?id=empty name');
  } else {
    
    $image = basename($_FILES["image"]["name"]);
   
    if(empty($image)){
       $insert = $conn->query("INSERT into projects (title,sub_project_title_id, description,details) VALUES ('".$title."','".$sub_project_title_id."','".$description."','".$details."')");
       if ( $insert) {
           header('location: ../projects.php?id=inserted');
       } else {
           header('location: ../projects.php?id=not inserted');
       }
    }else{
        $allowTypes = array('jpg','png','jpeg');
        if (in_array($fileType,$allowTypes)) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
            $insert = $conn->query("INSERT into projects (title,sub_project_title_id, description,details,image) VALUES ('".$title."','".$sub_project_title_id."','".$description."','".$details."','".$imageName."')");
            if ( $insert) {
                header('location: ../projects.php?id=inserted');
            } else {
                header('location: ../projects.php?id=not inserted');
            }
            
        } else {
            header('location: ../projects.php?id=not image type');
        }
      //Insert data..
    }
    
    
  }
  

}