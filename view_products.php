<?php
session_start();
include("includes/config.php");

if(!isset($_SESSION['admin']))
{
    header("Location: admin_login.php");
    exit();
}

$query = "SELECT * FROM products";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
<title>View Products</title>
</head>

<body>

<h2>All Products</h2>

<a href="admin_dashboard.php">Back to Dashboard</a><br><br>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Image</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)) { ?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo htmlspecialchars($row['name']); ?></td>
    <td><?php echo $row['price']; ?></td>
    <td>

    <?php
    if(!empty($row['image_path']) && file_exists("uploads/".$row['image_path']))
    {
    ?>
        <img src="uploads/<?php echo $row['image_path']; ?>" width="80">
    <?php
    }
    else
    {
    ?>
        <img src="uploads/default.png" width="80">
    <?php
    }
    ?>

    </td>
</tr>

<?php } ?>

</table>

</body>
</html>