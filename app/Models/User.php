<?php

namespace App\Models;

use App\Core\Database;

class User {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function findByEmail(string $email)
    {
        return $this->db->fetch("SELECT * FROM users WHERE email = ?", [$email]);
    }

    public function create(array $data)
    {
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $this->db->query($sql, [
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':password' => $data['password'],
        ]);
        return $this->db->lastInsertId();
    }
}