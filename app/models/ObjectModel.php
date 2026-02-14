<?php
namespace app\models;

use PDO;

class ObjectModel {

    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllObjects(){
     $stmt = $this->db->query("SELECT * FROM produit_takalo");
     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    
}
