<?php
session_start();
include("includes/config.php");

if(isset($_POST['login']))
{

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0)
{

$row = mysqli_fetch_assoc($result);

$_SESSION['user_id'] = $row['id'];
$_SESSION['username'] = $row['username'];

header("Location: index.php");
exit();

}
else
{
echo "<script>alert('Invalid Email or Password');</script>";
}

}
?>

<!DOCTYPE html>
<html>
<head>

<title>User Login</title>

<style>

body{
font-family:Arial;
background:#f2f2f2;
}

.box{
width:350px;
margin:100px auto;
background:white;
padding:30px;
border-radius:8px;
box-shadow:0 0 10px #ccc;
}

input{
width:100%;
padding:10px;
margin:10px 0;
border:1px solid #ccc;
border-radius:5px;
}

button{
width:100%;
padding:10px;
background:#007bff;
color:white;
border:none;
border-radius:5px;
}

button:hover{
background:#0056b3;
}

</style>

</head>

<body>

<div class="box">

<h2>User Login</h2>

<form method="POST">

<input type="email" name="email" placeholder="Enter Email" required>

<input type="password" name="password" placeholder="Enter Password" required>

<button type="submit" name="login">Login</button>

</form>

<br>

<a href="register.php">New User? Register Here</a>

</div>

</body>
</html>