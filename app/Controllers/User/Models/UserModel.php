<?php
namespace App\Controllers\User\Models;

use PDO;

class UserModel
{
    public function __construct(private PDO $pdo) {}

    public function findByLoginAndPassword(string $login, string $password): ?array
    {
        $stmt = $this->pdo->prepare("SELECT id_user, log, username FROM users WHERE log = ? AND pass = ?");
        $stmt->execute([$login, $password]);
        return $stmt->fetch() ?: null;
    }
}