<?php

namespace App\Models;

use App\Core\Database;

class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function filter($search, $category, $limit, $offset)
    {
        $sql = "
            SELECT products.*, categories.name AS category_name
            FROM products
            LEFT JOIN categories ON categories.id = products.category_id
            WHERE 1
        ";

        $params = [];

        if ($search) {
            $sql .= " AND products.name LIKE ?";
            $params[] = "%$search%";
        }

        if ($category) {
            $sql .= " AND products.category_id = ?";
            $params[] = $category;
        }

        $sql .= " ORDER BY products.id DESC LIMIT $limit OFFSET $offset";

        return $this->db->query($sql, $params)->fetchAll();
    }

    public function countFiltered($search, $category)
    {
        $sql = "SELECT COUNT(*) FROM products WHERE 1";
        $params = [];

        if ($search) {
            $sql .= " AND name LIKE ?";
            $params[] = "%$search%";
        }

        if ($category) {
            $sql .= " AND category_id = ?";
            $params[] = $category;
        }

        return (int) $this->db->query($sql, $params)->fetchColumn();
    }

    public function create(array $data)
    {
        $sql = "INSERT INTO products (name, price, category_id, description, image)
                VALUES (:name, :price, :category_id, :description, :image)";
        $this->db->query($sql, [
            ':name' => $data['name'],
            ':category_id' => $data['category_id'],
            ':description' => $data['description'],
            ':price' => $data['price'],
            ':image' => $data['image']
        ]);
        return $this->db->lastInsertId();
    }
    public function find($id)
    {
        return $this->db->fetch("SELECT * FROM products WHERE id = ?", [$id]);
    }

    public function update($id, array $data)
    {
        $sql = "UPDATE products 
            SET name = :name, price = :price, category_id = :category_id, 
            description = :description, image = :image
            WHERE id = :id";
        return $this->db->query($sql, [
            ':name' => $data['name'],
            ':category_id' => $data['category_id'],
            ':description' => $data['description'],
            ':price' => $data['price'],
            ':image' => $data['image'],
            ':id' => $id
        ]);
    }

    public function delete($id)
    {
        return $this->db->query("DELETE FROM products WHERE id = ?", [$id]);
    }
}
