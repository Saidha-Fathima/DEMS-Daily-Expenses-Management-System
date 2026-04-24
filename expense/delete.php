<?php
session_start();
include('../config/db.php');

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$id = $_POST['id'];

mysqli_query($conn,"DELETE FROM table1 WHERE id='$id' AND user_id='$user_id'");

header("Location: report.php");
exit();
?>