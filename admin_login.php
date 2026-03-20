<?php
session_start();
include("includes/config.php");

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
        exit();
    }
    else
    {
        echo "Invalid Admin Login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
</head>

<body>

<h2>Admin Login</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Enter Username" required><br><br>
    <input type="password" name="password" placeholder="Enter Password" required><br><br>
    <button type="submit" name="login">Login</button>
</form>

</body>
</html>