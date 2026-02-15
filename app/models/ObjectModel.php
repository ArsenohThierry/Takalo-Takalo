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
        $stmt = $this->db->query("SELECT * FROM v_produit_takalo");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getObjectById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM v_produit_takalo WHERE id = :id");
        $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getMyObjects($id_proprietaire)
    {
        $stmt = $this->db->prepare('SELECT * FROM v_produit_takalo WHERE id_proprietaire = :id_proprietaire');
        $stmt->bindValue(':id_proprietaire', (int)$id_proprietaire, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getNumberMyObjects($id_proprietaire)
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) as count FROM v_produit_takalo WHERE id_proprietaire = :id_proprietaire');
        $stmt->bindValue(':id_proprietaire', (int)$id_proprietaire, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] ?? 0;
    }

    public function updateStatut($id_objet)
    {
        $stmt = $this->db->prepare('UPDATE produit_takalo SET id_statut = 1 WHERE id = :id_objet');
        $stmt->bindValue(':id_objet', (int)$id_objet, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
