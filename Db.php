<?php

class Db
{
    public $connection;

    public function __construct()
    {
        $dsn = 'mysql:host=mysql;dbname=test_china;charset=utf8mb4';
        $username = 'root';
        $password = 'root';

        try {
            $this->connection = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            echo "Помилка підключення: " . $e->getMessage();
        }
    }

    public function createRow($data)
    {
        // SQL-запит із плейсхолдерами
        $sql = "INSERT INTO messages (name, phone, email, message) VALUES (:name, :phone, :email, :message)";

        // Підготовка запиту
        $stmt = $this->connection->prepare($sql);

        // Дані для вставки
        $dataInsert = [
            ':name' => $data['name'] ?? 'not set',
            ':phone' => $data['phone'] ?? 'not set',
            ':email' => $data['email'] ?? 'not set',
            ':message' => $data['message'] ?? 'not set',
        ];

        // Виконання запиту
        $stmt->execute($dataInsert);
    }

    public function getAll()
    {
        // SQL-запит із плейсхолдерами
        $sql = "SELECT id, name, phone, email, message FROM messages";

        // Виконання запиту
        $stmt = $this->connection->query($sql);

        // Вибірка результатів
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}