<?php

class ProductSearch {
    public static function getProductByPrice(PDO $pdo, $minPrice, $maxPrice) {
        $stmt = $pdo->prepare("SELECT * FROM product WHERE price BETWEEN :minPrice AND :maxPrice");
        $stmt->bindParam(':minPrice', $minPrice);
        $stmt->bindParam(':maxPrice', $maxPrice);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}