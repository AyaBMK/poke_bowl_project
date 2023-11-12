<?php

session_start(); 

require_once 'classes/AppSucces.php'; 
require_once 'classes/Utils.php';




$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];



if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['product_id'])) {
    $productIdToRemove = $_GET['product_id'];
    if (isset($cart[$productIdToRemove])) {
        unset($cart[$productIdToRemove]);
        $_SESSION['cart'] = $cart;
        Utils::redirect("cart_shopping.php?succes=" . AppSucces::PRODUCT_DELETED);
        exit();
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'clear') {
        unset($_SESSION['cart']);
        Utils::redirect("cart_shopping.php");
        exit();
}