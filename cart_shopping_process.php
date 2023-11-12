<?php
    
session_start();

require_once 'classes/Utils.php';
require_once 'classes/AppError.php';

if (!isset($_SESSION['userInfos']) || !$_SESSION['userInfos']) {
    Utils::redirect('login.php?error=' . AppError::LOGIN_REQUIRED);
}

if (!isset($_POST['add_to_cart'])) {
    Utils::redirect('plat.php');
}

if (!isset($_POST['product_id'], $_POST['quantity'], $_POST['product_name'], $_POST['price'], $_POST['image_product'])) {
    Utils::redirect('plat.php');
}

$product_id = intval($_POST['product_id']);
$quantity = intval($_POST['quantity']);
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$image_product = $_POST['image_product'];


$productDetails = [
    'product_id' => $product_id,
    'product_name' => $product_name,
    'price' => $price,
    'image_product' => $image_product
];


if (!isset($_SESSION['product_details'])) {
    $_SESSION['product_details'] = [];
}


$_SESSION['product_details'][$product_id] = $productDetails;

if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id] += $quantity;
} else {
    $_SESSION['cart'][$product_id] = $quantity;
}

Utils::redirect("cart_shopping.php?id=$product_id");
exit();



