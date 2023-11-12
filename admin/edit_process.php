<?php

require_once '../classes/ProductController.php';

if (isset($_POST['update'])) {
    $id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $image_product = $_FILES['image_product'];
    $price = $_POST['price'];
    $product_description = $_POST['product_description'];
    $keep_image = isset($_POST['keep_image']) && $_POST['keep_image'] == 1;

    if ($keep_image) { 
        // Si l'utilisateur a choisi de garder l'image actuelle
        ProductController::updateProductWithoutImage($id, $product_name, $price, $product_description);
    } else {
        // Si l'utilisateur a choisi de télécharger une nouvelle image
        ProductController::updateProductWithImage($id, $product_name, $image_product, $price, $product_description);
    }
} 