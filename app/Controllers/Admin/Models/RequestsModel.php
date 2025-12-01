<?php
// app/Controllers/Admin/Models/RequestsModel.php

namespace App\Controllers\Admin\Models;

use PDO;

class RequestsModel
{
    public function __construct(private PDO $pdo) {}

    public function getAllRequests(int $limit, int $offset): array
    {
        $stmt = $this->pdo->prepare("
            SELECT
                'Картридж' as type,
                cr.id_request,
                cr.department_name,
                cr.head_full_name,
                cr.phone,
                cr.inventory_number,
                cr.printer_name as device_name,
                cr.building_number,
                cr.room_number,
                cr.reason,
                cr.submission_date,
                cr.status
            FROM cartridge_requests cr
            UNION ALL
            SELECT
                'Техника' as type,
                tr.id_request,
                tr.department_name,
                tr.head_full_name,
                tr.phone,
                tr.inventory_number,
                tr.tech_name as device_name,
                tr.building_number,
                tr.room_number,
                tr.reason,
                tr.submission_date,
                tr.status
            FROM tech_requests tr
            ORDER BY submission_date DESC
            LIMIT :limit OFFSET :offset
        ");

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalRequestsCount(): int
    {
        $stmt = $this->pdo->query("
            SELECT COUNT(*) FROM (
                SELECT id_request FROM cartridge_requests
                UNION ALL
                SELECT id_request FROM tech_requests
            ) AS combined
        ");
        return (int)$stmt->fetchColumn();
    }

    public function getRequestByIdAndType(int $id, string $type): ?array
    {
        $table = $type === 'Картридж' ? 'cartridge_requests' : 'tech_requests';
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE id_request = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function updateRequestStatus(int $id, string $type, string $status): void
    {
        $table = $type === 'Картридж' ? 'cartridge_requests' : 'tech_requests';
        $stmt = $this->pdo->prepare("UPDATE $table SET status = ? WHERE id_request = ?");
        $stmt->execute([$status, $id]);
    }

    // === НОВОЕ: получить имя получателя из БД ===
    public function getRecipientName(): string
    {
        $stmt = $this->pdo->prepare("SELECT setting_value FROM settings WHERE setting_key = 'recipient_name' LIMIT 1");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['setting_value'] : 'М.Г. Беликову'; // значение по умолчанию
    }
}