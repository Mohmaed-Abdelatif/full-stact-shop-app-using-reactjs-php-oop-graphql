<?php

namespace App\Repository;

require_once '../Database/Connection.php';
require_once '../Model/Product.php';

use App\Database\Connection;
use App\Model\Product;
use PDO;

class ProductRepository
{
    protected $connection;

    public function __construct()
    {
        $this->connection = Connection::getConnection();
    }

    // Method to fetch all products with details including name, price, and one image
public function getAllProductsWithDetails(): array
{
    $query = "
        SELECT 
            p.id,
            p.name,
            p.description,
            pr.amount AS price,
            (
                SELECT image_url
                FROM gallery
                WHERE product_id = p.id
                LIMIT 1
            ) AS image_url
        FROM 
            products p
        LEFT JOIN 
            prices pr ON p.id = pr.product_id
    ";

    $statement = $this->connection->query($query);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}


// Method to fetch products by category ID with details including name, price, and one image
public function getProductsByCategoryIdWithDetails($categoryId): array
{
    $query = "
        SELECT DISTINCT
            p.id,
            p.name,
            p.description,
            pr.amount AS price,
            (
                SELECT image_url
                FROM gallery
                WHERE product_id = p.id
                LIMIT 1
            ) AS image_url
        FROM 
            products p
        LEFT JOIN 
            prices pr ON p.id = pr.product_id
        WHERE 
            p.category_id = :categoryId
    ";

    $statement = $this->connection->prepare($query);
    $statement->execute(['categoryId' => $categoryId]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// Method to fetch all info for one product by ID
public function getProductByIdWithDetails($productId): ?array
{
    $query = "
        SELECT 
            p.id,
            p.name,
            p.description,
            pr.amount AS price,
            p.inStock,
            p.category_id,
            p.brand,
            g.image_url AS gallery
        FROM 
            products p
        LEFT JOIN 
            prices pr ON p.id = pr.product_id
        LEFT JOIN 
            gallery g ON p.id = g.product_id
        WHERE 
            p.id = :productId
    ";

    $statement = $this->connection->prepare($query);
    $statement->execute(['productId' => $productId]);
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (!$data) {
        return null;
    }

    // Process gallery images to build an array
    $gallery = [];
    foreach ($data as $row) {
        $gallery[] = $row['gallery'];
    }

    // Return product data with gallery images as an array
    return [
        'id' => $data[0]['id'],
        'name' => $data[0]['name'],
        'description' => $data[0]['description'],
        'price' => $data[0]['price'],
        'inStock' => $data[0]['inStock'],
        'category_id' => $data[0]['category_id'],
        'brand' => $data[0]['brand'],
        'gallery' => $gallery,
    ];
}



    //// Method to fetch products by category ID with their prices and attributes
    // public function getProductsByCategoryIdWithDetails($categoryId): array
    // {
    //     $query = "SELECT p.*, 
    //                      GROUP_CONCAT(DISTINCT pr.amount) AS prices, 
    //                      GROUP_CONCAT(DISTINCT g.image_url) AS gallery,
    //                      GROUP_CONCAT(DISTINCT CONCAT(a.attribute_name, ':', a.attribute_value) SEPARATOR ',') AS attributes
    //               FROM products p 
    //               LEFT JOIN prices pr ON p.id = pr.product_id
    //               LEFT JOIN gallery g ON p.id = g.product_id
    //               LEFT JOIN attributes a ON p.id = a.product_id
    //               WHERE p.category_id = :categoryId
    //               GROUP BY p.id";
    //     $statement = $this->connection->prepare($query);
    //     $statement->execute(['categoryId' => $categoryId]);
    //     $products = [];
    //     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    //         // Separate prices and gallery
    //         $prices = explode(',', $row['prices']);
    //         $gallery = explode(',', $row['gallery']);
    //         $attributes = [];
    //         $attrPairs = explode(',', $row['attributes']);
    //         foreach ($attrPairs as $pair) {
    //             list($name, $value) = explode(':', $pair);
    //             $attributes[$name] = $value;
    //         }
    //         // Construct Product object with prices, gallery, and attributes
    //         $product = new Product(
    //             $row['id'],
    //             $row['name'],
    //             $row['description'],
    //             $row['inStock'],
    //             $row['category_id'],
    //             $row['brand'],
    //             $gallery, // Gallery
    //             $attributes, // Attributes
    //             $prices // Prices
    //         );
    //         $products[] = $product;
    //     }
    //     return $products;
    // }



    // Method to fetch all products from the database
    public function getAllProducts(): array
    {
        $query = "SELECT * FROM products";
        $statement = $this->connection->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to fetch products by category ID from the database
    public function getProductsByCategoryId($categoryId): array
    {
        $query = "SELECT * FROM products WHERE category_id = :categoryId";
        $statement = $this->connection->prepare($query);
        $statement->execute(['categoryId' => $categoryId]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to fetch a product by ID from the database
    public function getProductById($id): ?array
    {
        $query = "SELECT * FROM products WHERE id = :id";
        $statement = $this->connection->prepare($query);
        $statement->execute(['id' => $id]);
        // $data = $statement->fetch(PDO::FETCH_ASSOC);
        // return $data ? new Product($data['id'], $data['name'], $data['description'], $data['in_stock'], $data['category'], $data['brand'], $data['gallery'], $data['attributes'], $data['prices']) : null;
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct(Product $product)
    {
    }

    public function updateProduct(Product $product)
    {
    }

    public function deleteProduct($id)
    {
    }
}
