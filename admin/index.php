<?php
require_once 'layout/header.php';
require_once '../classes/ProductController.php';

$products = ProductController::listProducts();

require 'product_list.php';
?>

