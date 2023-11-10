<?php
require_once 'Product.php';
require_once __DIR__ . '/../classes/AppError.php';
require_once __DIR__ . '/../classes/Utils.php';
require_once __DIR__ . '/../classes/AppSucces.php';

class ProductController
{

    public static function listProducts()
    {
        $pdo = getConnection();
        $product = new Product($pdo);
        $products = $product->getAllProducts();

        if ($products === false) {
            Utils::redirect('index.php?error=' . AppError::DB_CONNECTION);
        }

        return $products;
    }


    public static function addProduct($product_name, $image_product, $price, $product_description)
    {
        $pdo = getConnection();

        $product = new Product($pdo); 
        

        if (empty($product_name) || empty($price) || empty($product_description)) {
            Utils::redirect('form_create.php?error=' . AppError::REQUIRED_FIELDS);
        }

        if (!is_string($product_name) || !is_string($product_description) || !is_numeric($price) || floatval($price) <= 0) {
            Utils::redirect('form_create.php?error=' . AppError::FORMAT_NOT_CORRECT);
        }

        $bytes = random_bytes(10);

        $filename = bin2hex($bytes);

        $imageProductExt = pathinfo($image_product['name'], PATHINFO_EXTENSION);


        $filename .= '.' . $imageProductExt;

        $destination = __DIR__ . '/../uploads/profile_pictures/' . $filename;

        if (!is_uploaded_file($image_product['tmp_name']) || $image_product['error'] !== UPLOAD_ERR_OK) {
            Utils::redirect('form_create.php?error=' . AppError::REGISTER_FILE_UPLOAD);
        }

        if (!move_uploaded_file($image_product['tmp_name'], $destination)) {
            Utils::redirect('form_create.php?error=' . AppError::REGISTER_FILE_UPLOAD);
        }

        $product->insertProduct($product_name, $filename, $price, $product_description);

        Utils::redirect('index.php?succes=' . AppSucces::PRODUCT_ADDED);
    }

    public static function updateProduct($id, $product_name, $image_product, $price, $product_description) {
        $pdo = getConnection();
        $product = new Product($pdo);

        if ($product->updateProduct($id, $product_name, $image_product, $price, $product_description)) {
            Utils::redirect('index.php?succes=' . AppSucces::PRODUCT_UPDATED);
        } else {
            Utils::redirect('index.php?error=' . AppError::UPDATE_PRODUCT_ERROR); 
        }
    }


    public static function deleteProduct($id) {
        if (!is_numeric($id)) {
            Utils::redirect('index.php');
        }

        $pdo = getConnection();
        $product = new Product($pdo);

        if ($product->deleteProduct($id)) {
            Utils::redirect('index.php?succes=' . AppSucces::PRODUCT_DELETED);
        } else {
            Utils::redirect('index.php?error='. AppError::ERROR_OCCURRED);
        }
    }
}