<?php
session_start();
include("includes/config.php");

// login check
if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Ecommerce Website</title>

<style>

body{
    font-family: Arial;
    margin:0;
    background:#f4f4f4;
}

.navbar{
    background:#333;
    padding:15px;
}

.navbar a{
    color:white;
    margin-right:20px;
    text-decoration:none;
    font-weight:bold;
}

.navbar span{
    color:white;
    float:right;
}

.container{
    width:90%;
    margin:auto;
}

.product{
    border:1px solid #ccc;
    width:220px;
    padding:10px;
    margin:15px;
    float:left;
    text-align:center;
    background:white;
    border-radius:5px;
    box-shadow:0 0 5px #ccc;
}

.product img{
    width:150px;
    height:150px;
}

button{
    background:#28a745;
    color:white;
    border:none;
    padding:8px 15px;
    cursor:pointer;
    border-radius:4px;
}

button:hover{
    background:#218838;
}

.search-box{
    margin:20px 0;
}

</style>

</head>

<body>

<div class="navbar">

<a href="index.php">Home</a>
<a href="cart.php">Cart</a>
<a href="logout.php">Logout</a>

<span>Welcome <?php echo $_SESSION['username']; ?></span>

</div>

<div class="container">

<h2>Welcome to My Ecommerce Store</h2>

<hr>

<div class="search-box">
<form action="search.php" method="GET">
<input type="text" name="search" placeholder="Search product">
<button type="submit">Search</button>
</form>
</div>

<?php

$query = "SELECT * FROM products";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($result))
{
?>

<div class="product">

<?php
// image check (agar empty ho to default image dikhao)
if(!empty($row['image_path']) && file_exists("uploads/".$row['image_path']))
{
?>
    <img src="uploads/<?php echo $row['image_path']; ?>" alt="Product Image">
<?php
}
else
{
?>
    <img src="uploads/default.png" alt="No Image">
<?php
}
?>

<h3><?php echo htmlspecialchars($row['name']); ?></h3>

<p>Price: ₹<?php echo $row['price']; ?></p>

<p><?php echo htmlspecialchars($row['description']); ?></p>

<a href="add_to_cart.php?id=<?php echo $row['id']; ?>">
<button>Add To Cart</button>
</a>

</div>

<?php
}
?>

<div style="clear:both;"></div>

</div>

</body>
</html>