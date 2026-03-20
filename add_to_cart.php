<?php
session_start();
include("includes/config.php");

$id=$_GET['id'];

if(!isset($_SESSION['cart'])){
$_SESSION['cart']=array();
}

$_SESSION['cart'][]=$id;

header("Location:cart.php");
?>