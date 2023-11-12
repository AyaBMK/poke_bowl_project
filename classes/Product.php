    <?php
    require_once __DIR__ . '/../functions/db.php';

    class Product
    {
        private $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function getAllProducts()
        {
            try {
                $stmt = $this->pdo->query("SELECT * FROM product");
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException) {
                return false;
            }
        }

        public function getProduct($id) {
            $sql = "SELECT * FROM product WHERE product_id = ?";
            $productStmt = $this->pdo->prepare($sql);
            $productStmt->execute([$id]);
            return $productStmt->fetch();
        }
        
        public function insertProduct($product_name, $filename, $price, $product_description)
        {
            $stmt = $this->pdo->prepare("INSERT INTO product (product_name, image_product, price, product_description) VALUES (:product_name, :image_product, :price, :product_description)");

            $stmt->bindValue(':product_name', $product_name);
            $stmt->bindValue(':image_product', $filename);
            $stmt->bindValue(':price', $price);
            $stmt->bindValue(':product_description', $product_description);

            $stmt->execute();
        }

        public function updateProductWithoutImage($id, $product_name, $price, $product_description) {
            $sql = "UPDATE product SET product_name = :product_name, price = :price, product_description = :product_description WHERE product_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':product_name', $product_name);
            $stmt->bindValue(':price', $price);
            $stmt->bindValue(':product_description', $product_description);
            $stmt->bindValue(':id', $id);
        
            return $stmt->execute();
        }


        public function updateProductWithImage($id, $product_name, $image_product, $price, $product_description) {
            $bytes = random_bytes(10);
            $filename = bin2hex($bytes);
            $imageProductExt = pathinfo($image_product['name'], PATHINFO_EXTENSION);
            $filename .= '.' . $imageProductExt;
            $destination = __DIR__ . '/../uploads/product_images/' . $filename;

            if (!is_uploaded_file($image_product['tmp_name']) || $image_product['error'] !== UPLOAD_ERR_OK) {
                return false;
            }

            if (!move_uploaded_file($image_product['tmp_name'], $destination)) {
                return false;
            }

            $sql = "UPDATE product SET product_name = :product_name, image_product = :image_product, price = :price, product_description = :product_description WHERE product_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':product_name', $product_name);
            $stmt->bindValue(':image_product', $filename);
            $stmt->bindValue(':price', $price);
            $stmt->bindValue(':product_description', $product_description);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            return true;
        }

        public function deleteProduct($id) {
            $sql = "DELETE FROM product WHERE product_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            return $stmt->execute();
        }
    }
