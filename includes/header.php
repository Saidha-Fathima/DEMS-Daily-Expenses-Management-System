<?php
if(!isset($_SESSION)) session_start();
?>

<div class="header">
    <h3>Daily Expense Management System</h3>
    <div>Welcome <?php echo $_SESSION['username']; ?></div>
</div>