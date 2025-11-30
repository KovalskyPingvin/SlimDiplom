<?php
// app/Controllers/Admin/Models/CompatibilityModel.php

namespace App\Controllers\Admin\Models;

use PDO;

class CompatibilityModel
{
    public function __construct(private PDO $pdo) {}

    public function getAll(): array
    {
        $stmt = $this->pdo->query("
            SELECT printer_name, cartridge_name
            FROM printer_cartridge_compatibility
            ORDER BY printer_name, cartridge_name
        ");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];
        foreach ($rows as $row) {
            $result[$row['printer_name']][] = $row['cartridge_name'];
        }
        return $result;
    }

    public function add(string $printer, array $cartridges): void
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO printer_cartridge_compatibility (printer_name, cartridge_name) VALUES (?, ?)"
        );
        foreach ($cartridges as $cartridge) {
            $cartridge = trim($cartridge);
            if ($cartridge !== '') {
                $stmt->execute([$printer, $cartridge]);
            }
        }
    }

    public function deleteByPrinter(string $printer): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM printer_cartridge_compatibility WHERE printer_name = ?");
        $stmt->execute([$printer]);
    }

    public function update(string $oldPrinter, string $newPrinter, array $cartridges): void
    {
        $this->deleteByPrinter($oldPrinter);
        if ($newPrinter !== '') {
            $this->add($newPrinter, $cartridges);
        }
    }
}