<?php
session_start();
include("includes/config.php");
?>

<h2>Your Cart</h2>

<?php

if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)
{

$total = 0;

foreach($_SESSION['cart'] as $id)
{

$query = "SELECT * FROM products WHERE id=$id";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

?>

<div style="border:1px solid black; padding:10px; margin:10px; width:300px;">

<?php
// image check
if(!empty($row['image_path']) && file_exists("uploads/".$row['image_path']))
{
?>
<img src="uploads/<?php echo $row['image_path']; ?>" width="100">
<?php
}
else
{
?>
<img src="uploads/default.png" width="100">
<?php
}
?>

<h3><?php echo htmlspecialchars($row['name']); ?></h3>

<p>Price: ₹<?php echo $row['price']; ?></p>

<a href="remove_cart.php?id=<?php echo $row['id']; ?>">Remove</a>

</div>

<?php

$total += $row['price'];

}

?>

<h3>Total Price: ₹<?php echo $total; ?></h3>

<a href="checkout.php">Proceed to Checkout</a>

<?php
}
else
{
echo "<h3>Cart is Empty</h3>";
}
?>