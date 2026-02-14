<?php
namespace app\models;

use PDO;

class ObjectModel
{

    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllObjects()
    {
        $stmt = $this->db->query("SELECT * FROM produit_takalo");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getObjectById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM produit_takalo WHERE id = :id");
        $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getMyObjects($id_proprietaire)
    {
        $stmt = $this->db->prepare('SELECT * FROM produit_takalo WHERE id_proprietaire = :id_proprietaire');
        $stmt->bindValue(':id_proprietaire', (int)$id_proprietaire, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getNumberMyObjects($id_proprietaire)
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) as count FROM produit_takalo WHERE id_proprietaire = :id_proprietaire');
        $stmt->bindValue(':id_proprietaire', (int)$id_proprietaire, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] ?? 0;
    }
}
