<?php
include('../db_connection.php');

// File upload path
$targetDir = "../../images/team-member/";
$imageName = rand(1000,100000).basename($_FILES["image"]["name"]);

$targetFilePath = $targetDir . $imageName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

$description = $_POST['description'];
$name = $_POST['name'];

if (isset($_POST['submit_member'])) {

  if(empty($name)){
    header('location: ../team.php?id=empty name');
  } else {
    
    $image = basename($_FILES["image"]["name"]);
   
    if(empty($image)){
       echo "hkkjhhjkhj";
       //Insert data
    }else{
        $allowTypes = array('jpg','png','jpeg');
        if (in_array($fileType,$allowTypes)) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
            $insert = $conn->query("INSERT into team (name, description,image) VALUES ('".$name."','".$description."','".$targetFilePath."')");
            if ( $insert) {
                header('location: ../team.php?id=inserted');
            } else {
                header('location: ../team.php?id=not inserted');
            }
            
        } else {
            header('location: ../team.php?id=not image type');
        }
      //Insert data..
    }
    
    
  }
  

}