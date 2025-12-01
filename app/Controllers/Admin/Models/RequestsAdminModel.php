<?php
// app/Controllers/Admin/Models/RequestsAdminModel.php

namespace App\Controllers\Admin\Models;

use PDO;

class RequestsAdminModel
{
    public function __construct(private PDO $pdo) {}

    public function getRequests(int $offset, int $limit): array
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
                submission_date,
                status
            FROM cartridge_requests
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
            ORDER BY submission_date DESC, id_request DESC
            LIMIT :limit OFFSET :offset
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalCount(): int
    {
        $sql = "
            SELECT COUNT(*) FROM (
                SELECT id_request FROM cartridge_requests
                UNION ALL
                SELECT id_request FROM tech_requests
            ) as all_requests
        ";
        $stmt = $this->pdo->query($sql);
        return (int)$stmt->fetchColumn();
    }

    public function getRequestByIdAndType(int $id, string $type): ?array
    {
        $table = $type === 'Картридж' ? 'cartridge_requests' : 'tech_requests';
        $sql = "SELECT * FROM $table WHERE id_request = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function updateRequestStatus(int $id, string $type, string $status): void
    {
        $table = $type === 'Картридж' ? 'cartridge_requests' : 'tech_requests';
        $sql = "UPDATE $table SET status = ? WHERE id_request = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$status, $id]);
    }
}