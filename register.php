<?php
include("includes/config.php");

if(isset($_POST['register']))
{
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = "INSERT INTO users(username,email,password) 
VALUES('$username','$email','$password')";

mysqli_query($conn,$query);

echo "Registration Successful";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>
</head>

<body>

<h2>User Registration</h2>

<form method="POST">

<input type="text" name="username" placeholder="Enter Username" required><br><br>

<input type="email" name="email" placeholder="Enter Email" required><br><br>

<input type="password" name="password" placeholder="Enter Password" required><br><br>

<button type="submit" name="register">Register</button>

</form>

<a href="login.php">Login Here</a>

</body>
</html>