<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "emk";

// Create connection

$message = "";
if (isset($_POST['auth'])) {
    $isSuccess = 0;
    $conn = mysqli_connect($servername, $username, $password,$db);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users where email='$email' AND password='$password'";
    
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        if($row = mysqli_fetch_assoc($result)) {
          
          $_SESSION['name'] = $row['fullName'];
          header('location: ../home.php');
          }
    } else {
        header('location: ../index.php');
      }
}
