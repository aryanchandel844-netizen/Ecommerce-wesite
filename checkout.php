<?php
session_start();
include("includes/config.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
{
    echo "<h3>Cart is Empty</h3>";
    exit();
}

// total calculate
$total = 0;

foreach($_SESSION['cart'] as $id)
{
    $res = mysqli_query($conn,"SELECT * FROM products WHERE id=$id");
    $row = mysqli_fetch_assoc($res);
    $total += $row['price'];
}
?>

<h2>Checkout</h2>

<form action="place_order.php" method="POST">

<label>Name:</label><br>
<input type="text" name="name" required><br><br>

<label>Address:</label><br>
<textarea name="address" required></textarea><br><br>

<label>Phone:</label><br>
<input type="text" name="phone" required><br><br>

<h3>Total Amount: ₹<?php echo $total; ?></h3>

<input type="submit" value="Place Order">

</form>