<?php

session_start();
if (isset($_GET['logout'])) {
    header('location: index.php');
    session_destroy();
}