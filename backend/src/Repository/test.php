<?php

require_once 'CategoryRepository.php';
require_once 'ProductRepository.php';
require_once 'AttributeRepository.php';

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\AttributeRepository;

// Test CategoryRepository
$categoryRepository = new CategoryRepository();

// // Fetch all categories
// $categories = $categoryRepository->getAllCategories();
// echo "All Categories:\n";
// echo "<pre>";
// print_r($categories);
// echo "<pre>";

// echo "------------------------";

// // Fetch a category by ID
// $category = $categoryRepository->getCategoryById(2);
// echo "Category with ID 2:\n";
// echo "<pre>";
// print_r($category);
// echo "<pre>";

// echo "------------------------";

// Test ProductRepository
$productRepository = new ProductRepository();

// // Fetch all products
// $products = $productRepository->getAllProducts();
// echo "All Products:\n";
// echo "<pre>";
// print_r($products);
// echo "------------------------";
// echo "<pre>";

// // Fetch all products with details******************************************************
// $productsd = $productRepository->getAllProductsWithDetails();
// echo "All Products:\n";
// echo "<pre>";
// print_r($productsd);
// echo "------------------------";
// echo "<pre>";

// // Fetch products by category ID
// $categoryProducts = $productRepository->getProductsByCategoryId(2);
// echo "Products in Category 2:\n";
// echo "<pre>";
// print_r($categoryProducts);
// echo "------------------------";
// echo "<pre>";

// Fetch all products with details******************************************************
$productscd = $productRepository->getProductsByCategoryIdWithDetails(2);
echo "Products in Category 2 with details:\n";
echo "<pre>";
print_r($productscd);
echo "------------------------";
echo "<pre>";

// // Fetch productswith ditels by category ID
// $categoryProductsalld = $productRepository->getProductsByCategoryIdWithDetails(2);
// echo "Products in Category 2:\n";
// echo "<pre>";
// print_r($categoryProductsalld);
// echo "------------------------";
// echo "<pre>";

// // Fetch a product by ID
// $product = $productRepository->getProductById("apple-airtag");
// echo "Product with ID apple-airtag:\n";
// echo "<pre>";
// print_r($product);
// echo "------------------------";
// echo "<pre>";


// // Fetch a product by ID with details******************************************************
// $productcd = $productRepository->getProductByIdWithDetails("ps-5");
// echo "Product with id ps-5:\n";
// echo "<pre>";
// print_r($productcd);
// echo "------------------------";
// echo "<pre>";

// Test AttributeRepository
$attributeRepository = new AttributeRepository();

// // Fetch all attributes
// $attributes = $attributeRepository->getAllAttributes();
// echo "All Attributes:\n";
// echo "<pre>";
// print_r($attributes);
// echo "------------------------";
// echo "<pre>";

// // Fetch attributes by product ID
// $productAttributes = $attributeRepository->getAttributesByProductId("apple-airtag");
// echo "Attributes for Product apple-airtag:\n";
// echo "<pre>";
// print_r($productAttributes);
// echo "------------------------";
// echo "<pre>";
// $productAttributes = $attributeRepository->getAttributesByProductId("ps-5");
// echo "Attributes for Product ps-5:\n";
// echo "<pre>";
// print_r($productAttributes);
// echo "------------------------";
// echo "<pre>";
