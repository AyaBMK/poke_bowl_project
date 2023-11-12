<?php
$title = 'Panier';

require_once 'layout/header.php';
require_once 'classes/Product.php';
require_once 'functions/getSuccesMessage.php';


$pdo = getConnection();



$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

?>

<h1 class="ml-20 pt-32 mb-8 text-4xl tracking-tight font-extrabold text-gray-900">Le Panier</h1>
<?php
if (isset($_GET['succes'])) { ?>
    <div class="mx-20 flex items-center p-4 mb-4 text-sm text-green-900 border border-green-400 rounded-lg bg-green-50 dark:text-green-400"
        role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <?php echo getSuccesMessage(intval($_GET['succes'])); ?>
        </div>
    </div>
<?php } 
if (empty($_SESSION['cart'])) { ?>
    <p class="ml-20 mb-8 text-xl tracking-tight font-bold text-gray-900">Votre panier est vide</p>
<?php } else {
    ?>
    <div class="mx-20 mb-10 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-16 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Produit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantité
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prix
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $totalPrice = 0;
                foreach ($cart as $productId => $quantity) {

                    $product = new Product($pdo);
                    $productDetails = $product->getProduct($productId);
                    
                    $totalPrice += $productDetails['price'] * $quantity;
                    if ($productDetails) {
                        ?>
                        <tr class="bg-white border-b hover:bg-gray-50 dark:hover:bg-gray-200">
                            <td class="p-4">
                                <img src="uploads/profile_pictures/<?php
                                echo $productDetails['image_product']; ?>"
                                    class="w-16 md:w-25 max-w-full max-h-full" alt="<?php
                                    echo $productDetails['product_name']; ?>">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                <?php
                                echo $productDetails['product_name']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php
                                echo $quantity; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                <?php echo $productDetails['price'] * $quantity; ?>€
                            </td>
                            <td class="px-6 py-4">
                            <a href="delete.php?action=remove&product_id=<?php echo $productId; ?>" class="font-medium text-red-600 dark:text-red-500 hover:underline"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }
                } ?>
                <tr>
                <td colspan="2">
                </td>
                <td class="p-5">Prix Total</td>
                <td >
                    <?php echo $totalPrice; ?>€
                </td>
                <td>
                <a href="delete.php?action=clear" class="font-medium text-red-600 dark:text-red-500 hover:underline">Vider le panier</a>
                </td>
            </tr> <?php
}
?>
            
        </tbody>
    </table>
</div>

<?php

require_once 'layout/footer.php';
?>