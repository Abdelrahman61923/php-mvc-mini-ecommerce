<?php

namespace App\Models;

use App\Core\Database;

class Category
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function all()
    {
        return $this->db->fetchAll(
            "SELECT * FROM categories ORDER BY created_at DESC");
    }

    public function count()
    {
        return $this->db->fetchColumn("SELECT COUNT(*) FROM categories");
    }

    public function filter($search, $limit, $offset)
    {
        $sql = "SELECT * FROM categories WHERE 1";
        $params = [];

        if ($search) {
            $sql .= " AND name LIKE ?";
            $params[] = "%$search%";
        }

        $sql .= " ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
        return $this->db->query($sql, $params)->fetchAll();
    }

    public function countFiltered($search)
    {
        $sql = "SELECT COUNT(*) FROM categories WHERE 1";
        $params = [];

        if ($search) {
            $sql .= " AND name LIKE ?";
            $params[] = "%$search%";
        }
        return (int) $this->db->query($sql, $params)->fetchColumn();
    }

    public function create(array $data)
    {
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $this->db->query($sql, [
            ':name' => $data['name'],
        ]);
        return $this->db->lastInsertId();
    }

    public function find($id)
    {
        return $this->db->fetch("SELECT * FROM categories WHERE id = ?", [$id]);
    }

    public function update($id, array $data)
    {
        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        return $this->db->query($sql, [
            ':name' => $data['name'],
            ':id' => $id
        ]);
    }

    public function delete($id)
    {
        return $this->db->query("DELETE FROM categories WHERE id = ?", [$id]);
    }
}