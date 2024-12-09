<?php

require_once 'Db.php';

class Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function runAction(string $action)
    {
        if (method_exists($this, 'action' . $action)) {
            return $this->{'action' . $action}();
        }
    }

    public function actionCreate()
    {
        if ($_POST) {
            try {
                // SQL-запит із плейсхолдерами
                $sql = "INSERT INTO messages (name, phone, email, message) VALUES (:name, :phone, :email, :message)";

                // Підготовка запиту
                $stmt = $this->db->connection->prepare($sql);

                // Дані для вставки
                $data = [
                    ':name' => $_POST['name'] ?? 'not set',
                    ':phone' => $_POST['phone'] ?? 'not set',
                    ':email' => $_POST['email'] ?? 'not set',
                    ':message' => $_POST['message'] ?? 'not set',
                ];

                // Виконання запиту
                $stmt->execute($data);
            } catch (PDOException $e) {
                echo "Помилка вставки: " . $e->getMessage();
            }
        }
    }
}