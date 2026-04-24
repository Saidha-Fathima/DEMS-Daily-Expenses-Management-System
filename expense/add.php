<?php
session_start();
include('../config/db.php');

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

if(isset($_POST['submit'])){
    $name=$_POST['ename'];
    $cost=$_POST['ecost'];
    $date=$_POST['edate'];
    $disc=$_POST['edisc'];
    $user_id=$_SESSION['user_id'];

    mysqli_query($conn,"INSERT INTO table1(ename,ecost,edate,edisc,user_id)
    VALUES('$name','$cost','$date','$disc','$user_id')");

    header("Location: report.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Expense</title>
<link rel="stylesheet" href="http://localhost/dems/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<?php include('../includes/sidebar.php'); ?>

<div class="main">
<?php include('../includes/header.php'); ?>

<div class="form-box">
<h2>Add Expense</h2>
<form method="post">
<input type="text" name="ename" placeholder="Expense Name" required><br><br>
<input type="number" name="ecost" placeholder="Amount" required><br><br>
<input type="date" name="edate" required><br><br>

<select name="edisc">
<option>Food</option>
<option>Travel</option>
<option>Shopping</option>
<option>Others</option>
</select><br><br>

<button name="submit" class="btn-primary">Add Expense</button>
</form>

</div>
</div>

</body>
</html>