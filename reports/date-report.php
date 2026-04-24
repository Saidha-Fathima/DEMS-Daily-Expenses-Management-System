<?php
session_start();
include('../config/db.php');

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$fdate = $_POST['fromdate'];
$tdate = $_POST['todate'];

$result = mysqli_query($conn,"
SELECT edate, SUM(ecost) as total 
FROM table1 
WHERE user_id='$user_id' 
AND edate BETWEEN '$fdate' AND '$tdate'
GROUP BY edate
");
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

<div class="content">
<h2>Date Report</h2>

<table>
<tr>
<th>Date</th>
<th>Total</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?php echo $row['edate']; ?></td>
<td><?php echo $row['total']; ?></td>
</tr>
<?php } ?>

</table>

</div>
</div>

</body>
</html>