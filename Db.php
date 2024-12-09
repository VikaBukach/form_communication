<?php

require_once 'env.php';

class Db
{
    public $connection;

    public function __construct()
    {
        $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4';
        $username = DB_USER;
        $password = DB_PASS;

        try {
            $this->connection = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            echo "Помилка підключення: " . $e->getMessage();
        }
    }

    public function createRow($data)
    {
        $sql = "INSERT INTO messages (name, phone, email, message) VALUES (:name, :phone, :email, :message)";

        $stmt = $this->connection->prepare($sql);

        $dataInsert = [
            ':name' => $data['name'] ?? 'not set',
            ':phone' => $data['phone'] ?? 'not set',
            ':email' => $data['email'] ?? 'not set',
            ':message' => $data['message'] ?? 'not set',
        ];

        $stmt->execute($dataInsert);
    }

    public function getAll()
    {
        $sql = "SELECT id, name, phone, email, message FROM messages";

        $stmt = $this->connection->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}