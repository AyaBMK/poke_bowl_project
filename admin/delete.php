<?php

require_once '../classes/ProductController.php';


if (!isset($_GET['deleted_id'])) {
    Utils::redirect('index.php');
}

    $id = $_GET['deleted_id'];

    ProductController::deleteProduct($id);
