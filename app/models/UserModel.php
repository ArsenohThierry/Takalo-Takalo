<?php
namespace app\models;

use PDO;

class UserModel {

    private PDO $db;
    private string $salt = "popol";

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM test');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUser($username, $email, $password) {
        $initial = strtoupper(substr($username, 0, 1));
        $stmt = $this->db->prepare('INSERT INTO user_takalo (nom, email, password,id_role,initial) VALUES (?, ?, ?,2,?)');
        $stmt->execute([$username, $email, password_hash($this->salt.$password, PASSWORD_DEFAULT),$initial]);
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        } 
    }

    public function verifyUser($email, $password) {
        $stmt = $this->db->prepare('SELECT * FROM user_takalo WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($this->salt.$password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

    public function getIdByUsername($username) {
        $stmt = $this->db->prepare('SELECT id FROM user_takalo WHERE nom = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            return $user['id'];
        } else {
            return null;
        }
    }
}
