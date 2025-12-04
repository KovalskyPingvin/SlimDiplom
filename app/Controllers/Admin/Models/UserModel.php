<?php
// app/Controllers/Admin/Models/UserModel.php

namespace App\Controllers\Admin\Models;

use PDO;

class UserModel
{
    public function __construct(private PDO $pdo) {}

    public function getAllUsers(): array
    {
        $stmt = $this->pdo->query("
            SELECT id_user, log, username, role FROM users ORDER BY id_user ASC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id_user = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function createUser(array $data): void
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO users (log, pass, username, role) VALUES (?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['log'],
            $data['pass'],
            $data['username'],
            $data['role'],
        ]);
    }

    public function updateUser(int $id, array $data): void
    {
        if ($data['pass']) {
            $stmt = $this->pdo->prepare("
                UPDATE users SET log = ?, pass = ?, username = ?, role = ? WHERE id_user = ?
            ");
            $stmt->execute([
                $data['log'],
                $data['pass'],
                $data['username'],
                $data['role'],
                $id,
            ]);
        } else {
            $stmt = $this->pdo->prepare("
                UPDATE users SET log = ?, username = ?, role = ? WHERE id_user = ?
            ");
            $stmt->execute([
                $data['log'],
                $data['username'],
                $data['role'],
                $id,
            ]);
        }
    }

    public function deleteUser(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id_user = ?");
        $stmt->execute([$id]);
    }
}