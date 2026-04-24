<?php
session_start();
include('../config/db.php');

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn,"SELECT * FROM table1 WHERE user_id='$user_id'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Report</title>
<link rel="stylesheet" href="http://localhost/dems/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<?php include('../includes/sidebar.php'); ?>

<div class="main">
<?php include('../includes/header.php'); ?>

<div class="table-box">
<h2 class="title">Your Expenses</h2>
<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Cost</th>
<th>Date</th>
<th>Category</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['ename']; ?></td>
<td><?php echo $row['ecost']; ?></td>
<td><?php echo $row['edate']; ?></td>
<td><?php echo $row['edisc']; ?></td>
<td>
<form method="post" action="delete.php">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<button class="btn-danger">Delete</button>
</form>
</td>
</tr>
<?php } ?>

</table>

</div>
</div>

</body>
</html>