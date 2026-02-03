<?php

namespace App\Core;

use PDO;
use PDOException;
class Database
{
    private $pdo;

    public function __construct()
    {
        $config = require __DIR__ . '/../config/database.php';

        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

        try {
            $this->pdo = new PDO($dsn, $config['user'], $config['pass']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("DB Connection Failed: " . $e->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetchAll($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetch(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->fetch();
    }
    
    public function fetchColumn($sql)
    {
        return $this->pdo->query($sql)->fetchColumn();
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
}
