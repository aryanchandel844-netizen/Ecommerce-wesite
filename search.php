<?php
include("includes/config.php");

?>

<form method="GET">

<input type="text" name="search" placeholder="Search product">

<button type="submit">Search</button>

</form>

<?php

if(isset($_GET['search'])){

$search=$_GET['search'];

$query="SELECT * FROM products WHERE name LIKE '%$search%'";

$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result)){

echo "<h3>".$row['name']."</h3>";
echo "<p>Price: ₹".$row['price']."</p>";

}

}
?>