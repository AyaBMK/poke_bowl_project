<?php

session_start();

require_once 'classes/Utils.php';


if (isset($_POST['add_to_cart'])) {


    if (isset($_POST['product_id'], $_POST['quantity'], $_POST['product_name'], $_POST['price'], $_POST['image_product'])) {
        
        $product_id = intval($_POST['product_id']);
        $quantity = intval($_POST['quantity']);
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $image_product = $_POST['image_product'];


        $_SESSION['cart'][$product_id] = isset($_SESSION['cart'][$product_id]) ? $_SESSION['cart'][$product_id] + $quantity : $quantity;



        Utils::redirect("cart_shopping.php?id=$product_id");
        exit();
    }

}

