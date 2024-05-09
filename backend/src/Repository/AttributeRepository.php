<?php

namespace App\Repository;

require_once '../Database/Connection.php'; 
require_once '../Model/Attribute.php'; 


use App\Database\Connection;
use App\Model\Attribute;
use PDO;

class AttributeRepository
{
    protected $connection;

    public function __construct()
    {
        $this->connection = Connection::getConnection();
    }

    public function getAllAttributes(): array
    {
        $query = "SELECT * FROM attributes";
        $statement = $this->connection->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAttributesByProductId($productId): array
    {
        $query = "SELECT * FROM attributes WHERE product_id = :productId";
        $statement = $this->connection->prepare($query);
        $statement->execute(['productId' => $productId]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAttributeById($id): ?Attribute
    {
        $query = "SELECT * FROM attributes WHERE id = :id";
        $statement = $this->connection->prepare($query);
        $statement->execute(['id' => $id]);
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        return $data ? new Attribute($data['id'], $data['name'], $data['value']) : null;
    }

    public function createAttribute(Attribute $attribute)
    {
    }

    public function updateAttribute(Attribute $attribute)
    {
    }

    public function deleteAttribute($id)
    {
    }
}
