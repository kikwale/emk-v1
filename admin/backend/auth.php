<?php

session_start();
include("../db_connection.php");
// Create connection

$message = "";
if (isset($_POST['auth'])) {
    $isSuccess = 0;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users where email='$email' AND password='$password'";
    
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        if($row = mysqli_fetch_assoc($result)) {
          
          $_SESSION['userName'] = $row['fullName'];
          $_SESSION['userId'] = $row['id'];
          header('location: ../home.php');
          }
    } else {
        header('location: ../index.php?error=invaliduser');
      }
}
