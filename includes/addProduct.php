<?php
session_start();

if(isset($_POST['title']) && $_FILES['file']){
    $file = $_FILES['file'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    include '../classes/db.php';
    include '../classes/product.php';
 
    $username =  $_SESSION['user'];

    $newProduct =  new ProductController($title, $price, $description, $file, $username);
$newProduct->createNewProduct();
}