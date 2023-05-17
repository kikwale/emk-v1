<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$database = "ds";
$conn = mysqli_connect($hostname,$username,$password,$database);
if(!$conn){
    die("failed to connect to database".mysqli_connect_error());
}
$query = "SELECT * FROM services";
$services = mysqli_query($conn,$query);
foreach ($services as $service){
    echo $service['service_title'];
}
?>

