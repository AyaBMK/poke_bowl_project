<?php
require_once 'layout/header.php';
require_once '../functions/getErrorMessage.php';
?>



<h1 class="pl-24 pt-24 mb-10 text-4xl tracking-tight font-extrabold text-gray-900">Nouveau produit</h1>
<div class="pl-24 grid md:grid-cols-2 md:gap-6">
    <form method="POST" action="form_create_process.php" enctype="multipart/form-data">
        <?php if (isset($_GET['error'])) { ?>
            <div class="mb-10">
                <span class="text-red-500 bg-red-100 py-1 px-2">
                    <?php echo getErrorMessage(intval($_GET['error'])); ?>
                </span>
            </div>
        <?php } ?>
        <div class="mb-6">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Nom du produit : </label>
            <input type="text" id="base-input"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5"
                name="product_name">
        </div>
        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="large_size">Large file input</label>
        <input
            class="mb-6 block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
            id="large_size" type="file" name="image_product">
        <div class="mb-6">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Prix</label>
            <input type="text" id="base-input"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5"
                name="price">
        </div>
        <div class="mb-10">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
            <input type="text" id="base-input"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2.5"
                name="product_description">
        </div>
        <button type="submit" name="submit"
            class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-700 dark:hover:bg-green-700 dark:focus:ring-green-800">Envoyer</button>
    </form>
</div>