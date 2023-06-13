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
           header('location: ../services.php?id=inserted');
       } else {
           header('location: ../services.php?id=not inserted');
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

if (isset($_POST['edit_service_btn'])) {

  if(empty($name)){
    header('location: ../services.php?id=empty name');
  } else {
    
    $image = basename($_FILES["image"]["name"]);
   
    if(empty($image)){
       $insert = $conn->query("UPDATE service SET name='$name' ,description='$description', details='$details' WHERE id='".$_POST['id']."' ");
       if ( $insert) {
           header('location: ../services.php?id=updated');
       } else {
           header('location: ../services.php?id=not updated');
       }
    }else{
        $allowTypes = array('jpg','png','jpeg');
        if (in_array($fileType,$allowTypes)) {

          $sql = "SELECT * FROM service WHERE id='".$_POST['id']."'";
          $result = mysqli_query($conn, $sql);
          
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            if($row = mysqli_fetch_assoc($result)) {
             
              unlink("../../images/services/'".$row['image']."'");
              move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
              $insert = $conn->query("UPDATE service SET name='$name' ,description='$description', details='$details',image='$imageName' WHERE id='".$_POST['id']."' ");
              if ( $insert) {
                  header('location: ../services.php?id=updated');
              } else {
                  header('location: ../services.php?id=not updated');
              }
            }
          } else {
            echo "0 results";
          }
  
            
        } else {
            header('location: ../services.php?id=not image type');
        }
      //Insert data..
    }
    
    
  }
  

}

if (isset($_POST['delete_service_btn'])) {


          $sql = "SELECT * FROM service WHERE id='".$_POST['id']."'";
          $result = mysqli_query($conn, $sql);
          
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            if($row = mysqli_fetch_assoc($result)) {
             
              unlink("../../images/services/'".$row['image']."'");
          
              $sql1 = "DELETE FROM service WHERE id='".$_POST['id']."'";

              if (mysqli_query($conn, $sql1)) {
                header('location: ../services.php?id=deleted');
              } else {
                header('location: ../services.php?id=not deleted');
              }

            }
          } else {
            echo "0 results";
          }
  
     
}