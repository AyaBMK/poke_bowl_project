<?php

$title = 'Mon Produit';

require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/functions/db.php';
require_once __DIR__ . '/classes/Utils.php';
require_once __DIR__ . '/classes/AppError.php';
require_once __DIR__ . '/functions/getErrorMessage.php';
require_once __DIR__ . '/classes/Product.php';

?>

<section class="mt-14 bg-white">

    <?php

    try {
        $pdo = getConnection();
    } catch (PDOException) {
        Utils::redirect('index.php?error=' . AppError::DB_CONNECTION);
    }

    if (!isset($_GET['id'])) {
        Utils::redirect('plat.php?error=' . AppError::USER_NOT_FOUND);
        exit;
    }
    if (!is_numeric($_GET['id'])) {
        Utils::redirect('plat.php?error=' . AppError::FORMAT_NOT_CORRECT);
        exit;
    }
    ['id' => $id] = $_GET;

    $id = intval($id);


    $row = new Product($pdo);
    $row = $row->getProduct($id);

    ?>

    <div class="gap-8 py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
        <?php  if ($row['product_id'] == $id) {
                ?>
                <img class="w-full hidden dark:block" src="uploads/profile_pictures/<?php echo $row['image_product']; ?>"
                    alt="<?php echo $row['product_name']; ?> image">
                <div class="mt-4 md:mt-0">
                    <h2 class="mb-6 text-5xl tracking-tight font-bold text-gray-900">
                        <?php echo mb_strtoupper($row['product_name']); ?>
                    </h2>
                    <p class="text-3xl text-green-700 mb-6">
                        <?php echo $row['price']; ?>€
                    </p>
                    <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">
                        <?php echo $row['product_description']; ?>
                    </p>
                    <a href="basket.php?id=<?php echo $row['product_id']; ?>"
                        class="inline-flex focus:outline-none text-white bg-green-700 hover:bg-green-900 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-green-700 dark:hover:bg-green-900 dark:focus:ring-green-800 items-center mb-10">
                        Ajouter au panier
                        <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <hr>
                </div>
            <?php } ?>
    </div>
</section>

<?php require_once('layout/footer.php');