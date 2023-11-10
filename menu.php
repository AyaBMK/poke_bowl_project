<?php

$title = 'Menu';
require_once 'layout/header.php';
require_once 'functions/db.php';
require_once 'functions/getSuccesMessage.php';
require_once 'classes/Utils.php';
require_once 'classes/productController.php';
require_once 'classes/productSearch.php';


try {
    $pdo = getConnection();
} catch (PDOException) {
    Utils::redirect('menu.php?error=' . AppError::DB_CONNECTION);
}

if (isset($_GET['price']) && $_GET['price'] != '') {
    $priceInterval = $_GET['price'];
    $price = explode("-", $priceInterval);
    
    $products = ProductSearch::getProductByPrice($pdo, $price[0], $price[1]);
}else{

$products = ProductController::listProducts();

}

?>

<div class="container mx-auto">
    <h1 class="ml-20 mt-28 mb-20 p-2 border-l-4 border-black-indigo-500 text-5xl tracking-tight font-bold text-gray-900">Nos Plat</h1>
    <form method="GET" action="">
        <div class="grid md:grid-cols-5 ml-20 pb-10">
            <select name="price" id="select_price"
                class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">
                <option value="0">Prix</option>
                <option value="0-10" <?php echo (isset($_GET['price']) && $_GET['price'] === '0-10') ? "selected" : ""; ?>>0€ - 10€</option>
                <option value="10-15" <?php echo (isset($_GET['price']) && $_GET['price'] === '10-15') ? "selected" : ""; ?>>10€ - 15€</option>
                <option value="15-20" <?php echo (isset($_GET['price']) && $_GET['price'] === '15-20') ? "selected" : ""; ?>>15€ - 20€</option>
                <option value="20-25" <?php echo (isset($_GET['price']) && $_GET['price'] === '20-25') ? "selected" : ""; ?>>20€ - 25€</option>
                <option value="25-30" <?php echo (isset($_GET['price']) && $_GET['price'] === '25-30') ? "selected" : ""; ?>>25€ - 30€</option>
                <option value="30-35" <?php echo (isset($_GET['price']) && $_GET['price'] === '30-35') ? "selected" : ""; ?>>30€ - 35€</option>
            </select>
            <span class="relative w-full">
                <button type="submit"
                    class="top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-green-700 rounded-r-lg border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </span>
        </div>
    </form>

</div>

<div class="grid md:grid-cols-4 gap-8 place-items-center px-20">
    <?php foreach ($products as  $product) { ?>
        <div class="max-w-sm bg-white rounded-lg shadow dark:border-gray-700 mb-5">
            <img class="rounded-t-lg" src="uploads/profile_pictures/<?php echo $product['image_product']; ?>"
                alt="<?php echo $product['product_name']; ?> image" />
            <div class="p-5">
                <h5 class="mb-2 text-center font-bold tracking-tight text-gray-900">
                    <?php echo $product['product_name']; ?>
                </h5>
                <p class="mb-3 font-normal text-center text-gray-700 dark:text-gray-400">
                    <?php echo $product['price']; ?> €
                </p>
            </div>
            <div class="text-center pb-4">
                <a href="plat.php?id=<?php echo $product['product_id']; ?>"
                    class="focus:outline-none text-white bg-green-700 hover-bg-green-800 focus-ring-4 focus-ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark-bg-green-600 dark-hover-bg-green-700 dark-focus-ring-green-800">
                    Read more
                </a>
            </div>
        </div>
    <?php } ?>
</div>
</div>
<?php require_once 'layout/footer.php';