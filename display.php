<?php
include("includes/config.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Products</title>

<style>
.product{
    border:1px solid #ccc;
    width:220px;
    padding:10px;
    margin:10px;
    float:left;
    text-align:center;
}
.product img{
    width:150px;
    height:150px;
}
</style>

</head>

<body>

<h2>Products</h2>

<?php

$query = "SELECT * FROM products";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($result))
{
?>

<div class="product">

<img src="uploads/<?php echo $row['image_path']; ?>" alt="Product Image">

<h3><?php echo $row['name']; ?></h3>

<p><?php echo $row['description']; ?></p>

<p>Price: ₹<?php echo $row['price']; ?></p>

<a href="add_to_cart.php?id=<?php echo $row['id']; ?>">Add to Cart</a>

</div>

<?php } ?>

</body>
</html>