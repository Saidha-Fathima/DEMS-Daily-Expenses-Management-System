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
<title>Category Report</title>
<link rel="stylesheet" href="http://localhost/dems/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<?php include('../includes/sidebar.php'); ?>

<div class="main">
<?php include('../includes/header.php'); ?>

<form method="POST" action="category-report.php">
<select name="edisc">
<option>Food</option>
<option>Travel</option>
<option>Bills</option>
<option>Shopping</option>
</select><br><br>

<button class="btn-primary">Search</button>
</form>

</div>

</body>
</html>