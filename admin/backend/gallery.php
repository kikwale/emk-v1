<?php
include('../db_connection.php');

// File upload path
$targetDir = "../../images/gallery/";
$imageName = rand(1000,100000).basename($_FILES["image"]["name"]);

$targetFilePath = $targetDir . $imageName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

$project = $_POST['project'];

if (isset($_POST['submit_gallery'])) {

  if(empty($project)){
    header('location: ../gallery.php?id=empty name');
  } else {
    
    $image = basename($_FILES["image"]["name"]);
   
    if(empty($image)){
       $insert = $conn->query("INSERT into gallery (project_id) VALUES ('".$project."')");
       if ( $insert) {
           header('location: ../gallery.php?id=inserted');
       } else {
           header('location: ../gallery.php?id=not inserted');
       }
    }else{
        $allowTypes = array('jpg','png','jpeg');
        if (in_array($fileType,$allowTypes)) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
            $insert = $conn->query("INSERT into gallery (project_id,gallery) VALUES ('".$project."','".$imageName."')");
            if ( $insert) {
                header('location: ../gallery.php?id=inserted');
            } else {
                header('location: ../gallery.php?id=not inserted');
            }
            
        } else {
            header('location: ../gallery.php?id=not image type');
        }
      //Insert data..
    }
    
    
  }
  

}

if (isset($_POST['edit_gallery_btn'])) {
  // $project = $_POST['project'];
  if(empty($project)){
    header('location: ../gallery.php?id=empty name');
  } else {
    
    $image = basename($_FILES["image"]["name"]);
   
    if(empty($image)){
       $insert = $conn->query("UPDATE gallery SET project_id='$project' WHERE gallery_id='".$_POST['id']."' ");
       if ( $insert) {
           header('location: ../gallery.php?id=updated');
       } else {
           header('location: ../gallery.php?id=not updated');
       }
    }else{
        $allowTypes = array('jpg','png','jpeg');
        if (in_array($fileType,$allowTypes)) {

          $sql = "SELECT * FROM gallery WHERE gallery_id='".$_POST['id']."'";
          $result = mysqli_query($conn, $sql);
          
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            if($row = mysqli_fetch_assoc($result)) {
             
              unlink("../../images/gallery/'".$row['image']."'");
              move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
              $insert = $conn->query("UPDATE gallery SET project_id='$project',gallery='$imageName' WHERE gallery_id='".$_POST['id']."' ");
              if ( $insert) {
                  header('location: ../gallery.php?id=updated');
              } else {
                  header('location: ../gallery.php?id=not updated');
              }
            }
          } else {
            echo "0 results";
          }
  
            
        } else {
            header('location: ../gallery.php?id=not image type');
        }
      //Insert data..
    }
    
    
  }
  

}

if (isset($_POST['delete_gallery_btn'])) {

          $sql = "SELECT * FROM gallery WHERE gallery_id='".$_POST['id']."'";
          $result = mysqli_query($conn, $sql);
          
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            if($row = mysqli_fetch_assoc($result)) {
             
              unlink("../../images/gallery/'".$row['image']."'");
          
              $sql1 = "DELETE FROM gallery WHERE gallery_id='".$_POST['id']."'";

              if (mysqli_query($conn, $sql1)) {
                header('location: ../gallery.php?id=deleted');
              } else {
                header('location: ../gallery.php?id=not deleted');
              }

            }
          } else {
            echo "0 results";
          }
  
     
}