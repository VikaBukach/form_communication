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

        return $this->db->getAll();
    }

    public function actionCreate()
    {
        if ($_POST) {
            try {
                $this->db->createRow($_POST);
            } catch (PDOException $e) {
                echo "Помилка вставки: " . $e->getMessage();
            }
        }

        header("Location: /");
    }
}