<?php
// app/Controllers/Admin/Models/SettingModel.php

namespace App\Controllers\Admin\Models;

use PDO;

class SettingModel
{
    public function __construct(private PDO $pdo) {}

    public function getRecipientName(): string
    {
        $stmt = $this->pdo->prepare("SELECT setting_value FROM settings WHERE setting_key = ?");
        $stmt->execute(['recipient_name']);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['setting_value'] : '';
    }

    public function saveRecipientName(string $name): void
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO settings (setting_key, setting_value)
            VALUES (?, ?)
            ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value)
        ");
        $stmt->execute(['recipient_name', $name]);
    }
}