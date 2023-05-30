<?php
include('../db_connection.php');

// File upload path
$targetDir = "../../images/services/";
$imageName = rand(1000,100000).basename($_FILES["image"]["name"]);

$targetFilePath = $targetDir . $imageName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

$description = $_POST['description'];
$details = $_POST['details'];
$name = $_POST['name'];

if (isset($_POST['submit_service'])) {

  if(empty($name)){
    header('location: ../services.php?id=empty name');
  } else {
    
    $image = basename($_FILES["image"]["name"]);
   
    if(empty($image)){
       $insert = $conn->query("INSERT into service (name, description,details) VALUES ('".$name."','".$description."','".$details."')");
       if ( $insert) {
           header('location: ../team.php?id=inserted');
       } else {
           header('location: ../team.php?id=not inserted');
       }
    }else{
        $allowTypes = array('jpg','png','jpeg');
        if (in_array($fileType,$allowTypes)) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
            $insert = $conn->query("INSERT into service (name, description,details,image) VALUES ('".$name."','".$description."','".$details."','".$imageName."')");
            if ( $insert) {
                header('location: ../services.php?id=inserted');
            } else {
                header('location: ../services.php?id=not inserted');
            }
            
        } else {
            header('location: ../services.php?id=not image type');
        }
      //Insert data..
    }
    
    
  }
  

}