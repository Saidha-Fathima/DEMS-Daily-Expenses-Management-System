<?php
session_start();
include('../config/db.php');

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$q1=mysqli_query($conn,"SELECT SUM(ecost) as total FROM table1 WHERE user_id='$user_id' AND edate=CURDATE()");
$r1=mysqli_fetch_assoc($q1);

$q2=mysqli_query($conn,"SELECT SUM(ecost) as total FROM table1 WHERE user_id='$user_id'");
$r2=mysqli_fetch_assoc($q2);

$q3=mysqli_query($conn,"SELECT COUNT(*) as total FROM table1 WHERE user_id='$user_id'");
$r3=mysqli_fetch_assoc($q3);

$q4=mysqli_query($conn,"SELECT COUNT(*) as total FROM table1 WHERE user_id='$user_id' AND edate=CURDATE()");
$r4=mysqli_fetch_assoc($q4);
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="http://localhost/dems/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<?php include('../includes/sidebar.php'); ?>

<div class="main">
<?php include('../includes/header.php'); ?>

<div class="cards">

<div class="card">
<h3>Today's Expense</h3>
<p><?php echo $r1['total'] ? $r1['total'] : 0; ?></p>
</div>

<div class="card">
<h3>Total Expense</h3>
<p><?php echo $r2['total'] ? $r2['total'] : 0; ?></p>
</div>

<div class="card">
<h3>Total Entries</h3>
<p><?php echo $r3['total']; ?></p>
</div>

<div class="card">
<h3>Today Entries</h3>
<p><?php echo $r4['total']; ?></p>
</div>

</div>

</div>

</body>
</html>