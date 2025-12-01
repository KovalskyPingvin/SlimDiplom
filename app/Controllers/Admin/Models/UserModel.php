<?php
// app/Controllers/Admin/Models/UserModel.php

namespace App\Controllers\Admin\Models;

use PDO;

class UserModel
{
    public function __construct(private PDO $pdo) {}

    public function getAllUsers(): array
    {
        $stmt = $this->pdo->query("SELECT id_user, log, pass, username FROM users ORDER BY id_user ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isLoginExists(string $log, ?int $excludeId = null): bool
    {
        if ($excludeId) {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE log = ? AND id_user != ?");
            $stmt->execute([$log, $excludeId]);
        } else {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE log = ?");
            $stmt->execute([$log]);
        }
        return $stmt->fetchColumn() > 0;
    }

    public function addUser(string $log, string $pass, string $username): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (log, pass, username) VALUES (?, ?, ?)");
        $stmt->execute([$log, $pass, $username]);
    }

    public function updateUser(int $id, string $log, string $pass, string $username): void
    {
        $stmt = $this->pdo->prepare("UPDATE users SET log = ?, pass = ?, username = ? WHERE id_user = ?");
        $stmt->execute([$log, $pass, $username, $id]);
    }

    public function deleteUser(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id_user = ?");
        $stmt->execute([$id]);
    }
}