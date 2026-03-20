
<?php
include("includes/config.php");

if(isset($_POST['submit'])){

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

$image = $_FILES['image']['name'];
$temp_name = $_FILES['image']['tmp_name'];

move_uploaded_file($temp_name,"uploads/".$image);

$query = "INSERT INTO products(name,description,price,image_path)
VALUES('$name','$description','$price','$image')";

if(mysqli_query($conn,$query)){
echo "Product Added Successfully";
}else{
echo "Error: ".mysqli_error($conn);
}

}
?>

<h2>Add Product</h2>

<form method="POST" enctype="multipart/form-data">

Product Name <br>
<input type="text" name="name"><br><br>

Description <br>
<textarea name="description"></textarea><br><br>

Price <br>
<input type="text" name="price"><br><br>

Image <br>
<input type="file" name="image"><br><br>

<input type="submit" name="submit" value="Add Product">

</form>