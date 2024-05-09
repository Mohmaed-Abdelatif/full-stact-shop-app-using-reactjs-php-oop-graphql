<?php

namespace App\Database;

use PDO;

class Connection
{
    private static $host = 'localhost';
    private static $username = 'root';
    private static $password = '';
    private static $database = 'e-commercetask';
    private static $charset = 'utf8mb4';

    // PDO connection instance
    private static $connection;

    // Prevent instantiation
    private function __construct()
    {
    }

    // Get PDO connection instance
    public static function getConnection(): PDO
    {
        if (!isset(self::$connection)) {
            $dsn = 'mysql:host=' . self::$host . ';dbname=' . self::$database . ';charset=' . self::$charset;
            self::$connection = new PDO($dsn, self::$username, self::$password);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$connection;
    }
}





// try {
//     // Get PDO instance
//     $pdo = Connection::getConnection();

//     // Example query: Select all products
//     $query = "SELECT * FROM products";

//     // Prepare and execute the query
//     $statement = $pdo->query($query);

//     // Fetch all results
//     $products = $statement->fetchAll(PDO::FETCH_ASSOC);

//     // Output the results
//     echo "<pre>";
//     print_r($products);
//     echo "</pre>";
// } catch (\PDOException $e) {
//     // Handle any database errors
//     echo "Connection failed: " . $e->getMessage();
// }
