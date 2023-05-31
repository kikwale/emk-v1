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
      $insert = $conn->query("INSERT into team (name, description) VALUES ('".$name."','".$description."'')");
      if ( $insert) {
          header('location: ../team.php?id=inserted');
      } else {
          header('location: ../team.php?id=not inserted');
      }
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


if (isset($_POST['edit_team_btn'])) {

  if(empty($name)){
    header('location: ../team.php?id=empty name');
  } else {
    
    $image = basename($_FILES["image"]["name"]);
   
    if(empty($image)){
      $insert = $conn->query("UPDATE team SET name='$name', description='$description' WHERE id='".$_POST['id']."'");
            if ( $insert) {
                header('location: ../team.php?id=updated');
            } else {
                header('location: ../team.php?id=not updated');
            }
    }else{
        $allowTypes = array('jpg','png','jpeg');
        if (in_array($fileType,$allowTypes)) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
            $insert = $conn->query("UPDATE team SET name='$name', description='$description',image='$targetFilePath' WHERE id='".$_POST['id']."'");
            if ( $insert) {
                header('location: ../team.php?id=updated');
            } else {
                header('location: ../team.php?id=not updated');
            }
            
        } else {
            header('location: ../team.php?id=not image type');
        }
      //Insert data..
    }
    
    
  }
  

}


if (isset($_POST['delete_team_btn'])) {


  $sql = "SELECT * FROM team WHERE id='".$_POST['id']."'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if($row = mysqli_fetch_assoc($result)) {
     
      unlink("../../images/team-member/'".$row['image']."'");
  
      $sql1 = "DELETE FROM team WHERE id='".$_POST['id']."'";

      if (mysqli_query($conn, $sql1)) {
        header('location: ../team.php?id=deleted');
      } else {
        header('location: ../team.php?id=not deleted');
      }

    }
  } else {
    echo "0 results";
  }
    
  

}