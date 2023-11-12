<?php 

require_once __DIR__ .'/../classes/ProductController.php';
require_once __DIR__ .'/../functions/db.php';



$pdo = getConnection();



$products = ProductController::listProducts();

?>
<div class="container mx-auto">
    <h2 class="ml-40 mt-16 mb-16 p-2 border-l-4 border-black-indigo-500 text-5xl tracking-tight font-bold text-gray-900">Nos Plat</h2>
    <div class="owl-carousel owl-theme px-40">  
        <?php foreach($products as $product) { ?>
            <div class="max-w-sm bg-white rounded-lg shadow dark:border-gray-700 mb-4">
                <a href="#">
                    <img class="rounded-t-lg" src="../uploads/profile_pictures/<?php 
                    echo $product['image_product'];
                     ?>" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-center font-bold tracking-tight text-gray-900"><?php 
                        echo $product['product_name']; ?></h5>
                   
                    </a>
                    <p class="mb-3 font-normal text-center text-gray-700 dark:text-gray-400"><?php
                    echo $product['price']; ?> €</p>
                    <div class="text-center pb-4">
                        <a href="plat.php?id=<?php echo $product['product_id']; ?>" class="focus:outline-none text-white bg-green-700 hover-bg-green-800 focus-ring-4 focus-ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark-bg-green-600 dark-hover-bg-green-700 dark-focus-ring-green-800">
                            Read more
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>  
    </div>
    <div class="text-center my-5">
        <a href="../menu.php" class="p-20 focus:outline-none text-white bg-green-700 hover-bg-green-800 focus-ring-4 focus-ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark-bg-green-600 dark-hover-bg-green-700 dark-focus-ring-green-800">
            Read more
        </a>
    </div>
</div>
<script>
    var owl = $('.owl-carousel');
owl.owlCarousel({
    items:4,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:1800,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        800:{
            items:2,
            nav:false
        },
        1100:{
            items:3,
            nav:false
        },
        1400:{
            items:4,
            nav:true,
            loop:false
        }
    }
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
</script>

