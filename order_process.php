<?php
session_start();
require_once 'classes/Utils.php';


if (!isset($_POST['submit_order'])) {
    Utils::redirect('cart_shopping.php');
    exit(); 
}




$_SESSION['cart'] = [];


Utils::redirect('thank_you.php');
exit(); 