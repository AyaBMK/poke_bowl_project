<?php
require_once 'layout/header.php';
require_once '../classes/Product.php';
require_once '../functions/db.php';
require_once '../functions/getSuccesMessage.php';


$pdo = getConnection();


$id = $_GET['updated_id'];
$product = new Product($pdo);
$product = $product->getProduct($id);


?>


<h1 class="pl-24 pt-24 mb-10 text-4xl tracking-tight font-extrabold text-gray-900">Mettre à jour le produit</h1>
<div class="pl-24 grid md:grid-cols-2 md:gap-6">
    <form method="POST" action="edit_process.php" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
        <div class="mb-6">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Nom du produit : </label>
            <input type="text" id="base-input"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5"
                name="product_name" value="<?php echo $product['product_name']; ?>">
        </div>  
        <div class="mb-6">
            <?php if (!empty($product['image_product'])) { ?>
                <label for="keep_image" class="block text-sm font-medium text-gray-900 mb-2">
                    <input type="checkbox" id="keep_image" name="keep_image" value="1"> Garder l'image actuelle
                </label>
                <label for="large_size" class="block text-sm font-medium text-gray-900 text-white">Image actuelle</label>
                <img src="../uploads/product_images/<?php echo $product['image_product']; ?>" alt="Image actuelle" class="mb-10 max-w-full">
            <?php } else { ?>
                <label for="large_size" class="block text-sm font-medium text-gray-900">Nouvelle image</label>
            <?php } ?>
            <input class="mb-6 block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                id="large_size" type="file" name="image_product">
        </div>
        <div class="mb-6">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Prix : </label>
            <input type="text" id="base-input"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5"
                name="price" value="<?php echo $product['price']; ?>">
        </div>
        <div class="mb-6">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Description : </label>
            <input type="text" id="base-input"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5"
                name="product_description" value="<?php echo $product['product_description']; ?>">
        </div>
        <button type="submit" name="update"
            class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-700 dark:hover:bg-green-700 dark:focus:ring-green-800 mb-20">Envoyer</button>
    </form>
</div>