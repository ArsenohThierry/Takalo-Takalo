<?php
namespace app\models;

use PDO;

class ExempleModel {

    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM test');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
