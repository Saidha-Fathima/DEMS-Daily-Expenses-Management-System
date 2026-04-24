<?php
include("../config/db.php");

if(isset($_POST['register'])){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $user=mysqli_real_escape_string($conn,$_POST['username']);
    $pass=md5($_POST['password']);

    mysqli_query($conn,"INSERT INTO user(full_name,email,username,password)
    VALUES('$name','$email','$user','$pass')");

    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="/dems/css/style.css">
</head>
<body class="auth-body">

<div class="auth-card">
<h2>Create Account</h2>

<form method="POST">
<input type="text" name="name" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>

<button name="register" class="btn-primary">Register</button>
</form>

<p class="switch">Already have account? <a href="login.php">Login</a></p>
</div>

</body>
</html>