<?php
// app/Controllers/Application/Models/CartridgeRequestModel.php

namespace App\Controllers\Application\Models;

use PDO;

class CartridgeRequestModel
{
    public function __construct(private PDO $pdo) {}

    public function createRequest(array $data, int $userId): bool
    {
        $sql = "
            INSERT INTO cartridge_requests 
            (department_name, head_full_name, phone, inventory_number, printer_name, building_number, room_number, reason, submission_date, user_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ";

        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute([
            $data['departmentName'],
            $data['chiefName'],
            $data['phone'],
            $data['inventoryNumber'],
            $data['printerName'],
            $data['buildingNumber'],
            $data['roomNumber'],
            $data['reason'],
            date('Y-m-d'), // дата
            $userId,
        ]);

        if ($result) {
            // Логируем
            $logDir = __DIR__ . '/../../../var/logs';
            if (!is_dir($logDir)) {
                mkdir($logDir, 0777, true);
            }
            $logText = "Заявка от пользователя {$userId} — " . date('Y-m-d H:i:s') . "\n";
            file_put_contents($logDir . '/requests.log', $logText, FILE_APPEND);
        }

        return $result;
    }
}