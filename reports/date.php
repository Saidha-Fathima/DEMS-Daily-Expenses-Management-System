<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Date Report</title>
<link rel="stylesheet" href="http://localhost/dems/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<?php include('../includes/sidebar.php'); ?>

<div class="main">
<?php include('../includes/header.php'); ?>

<div class="form-box">
<h2>Date Report</h2>

<form method="POST" action="date-report.php">
From: <input type="date" name="fromdate"><br><br>
To: <input type="date" name="todate"><br><br>

<button class="btn-primary">Search</button>
</form>

</div>
</div>

</body>
</html>