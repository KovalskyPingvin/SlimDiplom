<?php
// app/Controllers/User/Models/Auth.php
namespace App\Controllers\User\Models;

class Auth
{
    public function __construct(private UserModel $userModel) {} // ✅ Добавь конструктор

    public function login(string $login, string $password): bool
    {
        $user = $this->userModel->findByLoginAndPassword($login, $password);
        if (!$user) return false;

        $_SESSION['user'] = $user['log'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['id_user'] = $user['id_user'];
        return true;
    }

    public function logout(): void
    {
        session_destroy();
    }

    public function isLoggedIn(): bool
    {
        return isset($_SESSION['id_user']);
    }

    public function isCurrentUserAdmin(): bool
    {
        return $this->isLoggedIn() && ($_SESSION['id_user'] <= 2);
    }

    public function getUser(): ?array
    {
        return $this->isLoggedIn() ? [
            'id' => $_SESSION['id_user'],
            'login' => $_SESSION['user'],
            'username' => $_SESSION['username'],
        ] : null;
    }
}