<?php

require_once '../classes/ProductController.php';

if (isset($_POST['update'])) {

    $id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $image_product = $_FILES['image_product'];
    $price = $_POST['price'];
    $product_description = $_POST['product_description'];

    ProductController::updateProduct($id, $product_name, $image_product, $price, $product_description);
    
}