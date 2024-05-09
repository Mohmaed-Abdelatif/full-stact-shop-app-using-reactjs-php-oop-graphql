<?php

namespace App\Repository;

require_once '../Database/Connection.php'; 
require_once '../Model/Category.php'; 


use App\Database\Connection;
use App\Model\Category;
use PDO;

class CategoryRepository
{
    protected $connection;

    public function __construct()
    {
        $this->connection = Connection::getConnection();
    }

    public function getAllCategories(): array
    {
        $query = "SELECT * FROM categories";
        $statement = $this->connection->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryById($id): ?Category
    {
        $query = "SELECT * FROM categories WHERE id = :id";
        $statement = $this->connection->prepare($query);
        $statement->execute(['id' => $id]);
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        return $data ? new Category($data['id'], $data['name']) : null;
    }



    public function createCategory(Category $category)
    {

    }

    public function updateCategory(Category $category)
    {
    }

    public function deleteCategory($id)
    {
    }
}