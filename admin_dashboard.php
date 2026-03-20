<?php
session_start();

if(!isset($_SESSION['admin']))
{
header("Location: admin_login.php");
exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
</head>

<body>

<h2>Welcome Admin</h2>

<a href="add_product.php">Add Product</a><br><br>
<a href="view_products.php">View Products</a><br><br>
<a href="view_orders.php">View Orders</a><br><br>
<a href="logout.php">Logout</a>

</body>
</html>