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
            header('Content-Type: application/json');

            echo $this->{'action' . $action}();
            die;
        }
    }

    public function actionCreate()
    {
        if ($_POST) {
            try {
                $this->db->createRow($_POST);

                return json_encode(['status' => 'ok']);
            } catch (PDOException $e) {
                return json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }

    public function actionGetAll()
    {
        return json_encode($this->db->getAll());
    }
}