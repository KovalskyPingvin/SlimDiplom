<?php
// app/Controllers/User/Models/RequestUserModel.php

namespace App\Controllers\User\Models;

use PDO;

class RequestUserModel
{
    public function __construct(private PDO $pdo) {}

    public function getUserRequests(int $userId, int $limit, int $offset): array
    {
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
                DATE_FORMAT(submission_date, '%Y-%m-%d') as submission_date,  -- ← Только дата (это комментарий SQL)
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
                DATE_FORMAT(submission_date, '%Y-%m-%d') as submission_date,  -- ← Только дата (это комментарий SQL)
                status
            FROM tech_requests
            WHERE user_id = ?
            ORDER BY submission_date DESC, id_request DESC
            LIMIT ? OFFSET ?
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $userId, PDO::PARAM_INT);
        $stmt->bindValue(2, $userId, PDO::PARAM_INT);
        $stmt->bindValue(3, $limit, PDO::PARAM_INT);
        $stmt->bindValue(4, $offset, PDO::PARAM_INT);
        $stmt->execute();
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