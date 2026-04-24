<?php
session_start();
include('../config/db.php');

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$disc = $_POST['edisc'];

$result = mysqli_query($conn,"SELECT * FROM table1 WHERE edisc='$disc' AND user_id='$user_id'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Category Result</title>
<link rel="stylesheet" href="http://localhost/dems/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<?php include('../includes/sidebar.php'); ?>

<div class="main">
<?php include('../includes/header.php'); ?>

<div class="content">
<h2>Category: <?php echo $disc; ?></h2>

<table>
<tr>
<th>Name</th>
<th>Cost</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?php echo $row['ename']; ?></td>
<td><?php echo $row['ecost']; ?></td>
</tr>
<?php } ?>

</table>

</div>
</div>

</body>
</html>