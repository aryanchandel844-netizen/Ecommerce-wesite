<?php
session_start();
include("includes/config.php");

if(!isset($_SESSION['admin']))
{
    header("Location: admin_login.php");
    exit();
}

$query = "SELECT * FROM orders";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
<title>View Orders</title>
</head>

<body>

<h2>All Orders</h2>

<a href="admin_dashboard.php">Back</a><br><br>

<table border="1" cellpadding="10">
<tr>
    <th>Order ID</th>
    <th>Product ID</th>
    <th>Quantity</th>
    <th>Date</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)) { ?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['product_id']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td><?php echo $row['order_date']; ?></td>
</tr>

<?php } ?>

</table>

</body>
</html>