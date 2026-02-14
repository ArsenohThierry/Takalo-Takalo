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

    public function getObjectById($id){
        $stmt = $this->db->prepare("SELECT * FROM produit_takalo WHERE id = :id");
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
