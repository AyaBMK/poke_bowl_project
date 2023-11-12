<?php

require_once '../functions/getSuccesMessage.php';

?>

<section class="bg-gray-50 p-10">
    <h1 class="pt-24 mb-4 text-4xl tracking-tight font-extrabold text-gray-900">Liste des produits</h1>
    <div class="pt-5">
        <a href="form_create.php"
            class="focus:outline-none text-white bg-green-700 hover-bg-green-800 focus-ring-4 focus-ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark-bg-green-600 dark-hover-bg-green-700 dark-focus-ring-green-800">
            Nouveau produit
        </a>
    </div>
    <?php if (isset($_GET['succes'])) { ?>
    <div class="my-10">
        <span class="text-green-500 bg-green-100 py-1 px-2">
            <?php echo getSuccesMessage(intval($_GET['succes'])); ?>
        </span>
    </div>
    <?php } ?>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Produit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prix
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) { ?>
                    <tr class="bg-white border-b hover:bg-gray-10 dark:hover-bg-gray-100">
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                            <img class="w-24 h-24"
                                src="../uploads/product_images/<?php echo $product['image_product']; ?>"
                                alt="<?php echo $product['product_name']; ?> image">
                            <div class="pl-3">
                                <div class="text-base font-semibold">
                                    <?php echo $product['product_name']; ?>
                                </div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <?php echo $product['price']; ?>€
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="mr-2"></div>
                                <?php echo $product['product_description'] ?>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <a href="edit.php?updated_id=<?php echo $product['product_id']; ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="delete.php?deleted_id=<?php echo $product['product_id']; ?>"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</section>