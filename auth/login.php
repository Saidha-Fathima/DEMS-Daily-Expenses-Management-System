<?php
session_start();
include('../config/db.php');

if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = md5($_POST['password']);

    $query = mysqli_query($conn,"SELECT * FROM user WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($query)>0){
        $row=mysqli_fetch_assoc($query);
        $_SESSION['user_id']=$row['id'];
        $_SESSION['username']=$row['username'];
        header("Location: ../dashboard/index.php");
        exit();
    } else {
        $error="Invalid Username or Password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="/dems/css/style.css">
</head>
<body class="auth-body">

<div class="auth-card">
<h2>DEMS</h2>
<p class="subtitle">Daily Expense Manager</p>

<?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>

<form method="post">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button name="login" class="btn-primary">Login</button>
</form>

<p class="switch">Don't have account? <a href="register.php">Register</a></p>
</div>

</body>
</html>