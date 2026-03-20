<?php

$conn = mysqli_connect("localhost","root","","ecommerce");

if($conn){
    echo "Database Connected Successfully";
}
else{
    echo "Database Not Connected";
}

?>