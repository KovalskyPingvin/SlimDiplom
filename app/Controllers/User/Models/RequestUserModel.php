<?php
// app/Controllers/User/Models/RequestUserModel.php

namespace App\Controllers\User\Models;

use PDO;

class RequestUserModel
{
    public function __construct(private PDO $pdo) {}

    public function getUserRequests(int $userId, int $limit, int $offset): array
    {
        // Преобразуем параметры в строки для LIMIT/OFFSET (без кавычек!)
        $limit = (int)$limit;
        $offset = (int)$offset;

        // Используем только позиционные параметры для WHERE
        $sql = "
            SELECT 
                'Картридж' AS request_type,
                id_request,
                department_name,
                head_full_name,
                phone,
                inventory_number,
                printer_name AS device_name,
                building_number,
                room_number,
                reason,
                submission_date,
                status
            FROM cartridge_requests
            WHERE user_id = ?

            UNION ALL

            SELECT 
                'Техника' AS request_type,
                id_request,
                department_name,
                head_full_name,
                phone,
                inventory_number,
                tech_name AS device_name,
                building_number,
                room_number,
                reason,
                submission_date,
                status
            FROM tech_requests
            WHERE user_id = ?
            ORDER BY submission_date DESC, id_request DESC
            LIMIT $limit OFFSET $offset
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId, $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserRequestsCount(int $userId): int
    {
        $sql = "
            SELECT COUNT(*) as total FROM (
                SELECT id_request FROM cartridge_requests WHERE user_id = ?
                UNION ALL
                SELECT id_request FROM tech_requests WHERE user_id = ?
            ) as all_requests
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId, $userId]);
        return (int)$stmt->fetchColumn();
    }

    public function getRecipientName(): string
    {
        $stmt = $this->pdo->prepare("SELECT setting_value FROM settings WHERE setting_key = 'recipient_name' LIMIT 1");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['setting_value'] : 'М.Г. Беликову';
    }
}