<?php

class Db {
    public $connection;

    public function __construct() {
        $dsn = 'mysql:host=mysql;dbname=test_china;charset=utf8mb4';
        $username = 'root';
        $password = 'root';

        try {
            $this->connection = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            echo "Помилка підключення: " . $e->getMessage();
        }
    }
}