<?php
session_start();
include("includes/config.php");

if(!isset($_SESSION['cart']))
{
    header("Location: index.php");
    exit();
}

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

$total = 0;

// total calculate
foreach($_SESSION['cart'] as $id)
{
    $res = mysqli_query($conn,"SELECT * FROM products WHERE id=$id");
    $row = mysqli_fetch_assoc($res);
    $total += $row['price'];
}

// insert order
$query = "INSERT INTO orders (name,address,phone,total) 
VALUES ('$name','$address','$phone','$total')";

mysqli_query($conn,$query);

// cart empty
unset($_SESSION['cart']);

echo "<h2>Order Placed Successfully ✅</h2>";
echo "<a href='index.php'>Go Back to Home</a>";
?>