<?php
// app/Controllers/Admin/Models/WriteoffModel.php

namespace App\Controllers\Admin\Models;

use PDO;

class WriteoffModel
{
    public function __construct(private PDO $pdo) {}

    public function getStockData(): array
    {
        $cartridges = $this->pdo->query("
            SELECT id, cartridge_name as name, inventory_number, quantity, 'cartridge' as type
            FROM cartridge_stock
        ")->fetchAll(PDO::FETCH_ASSOC);

        $tech = $this->pdo->query("
            SELECT id, tech_name as name, inventory_number, quantity, 'tech' as type
            FROM tech_stock
        ")->fetchAll(PDO::FETCH_ASSOC);

        return [
            'cartridges' => $cartridges,
            'tech' => $tech,
        ];
    }

    public function getWriteoffData(): array
    {
        $cartridges = $this->pdo->query("
            SELECT id, cartridge_name as name, inventory_number, quantity, 'cartridge' as type
            FROM cartridge_disposals
        ")->fetchAll(PDO::FETCH_ASSOC);

        $tech = $this->pdo->query("
            SELECT id, tech_name as name, inventory_number, quantity, 'tech' as type
            FROM tech_disposals
        ")->fetchAll(PDO::FETCH_ASSOC);

        return [
            'cartridges' => $cartridges,
            'tech' => $tech,
        ];
    }

    public function moveItemToWriteoff(string $type, int $id): void
    {
        if ($type === 'cartridge') {
            $stmt = $this->pdo->prepare("
                INSERT INTO cartridge_disposals (cartridge_name, inventory_number, quantity)
                SELECT cartridge_name, inventory_number, quantity FROM cartridge_stock WHERE id = ?
            ");
            $stmt->execute([$id]);

            $stmt = $this->pdo->prepare("DELETE FROM cartridge_stock WHERE id = ? LIMIT 1");
            $stmt->execute([$id]);
        } elseif ($type === 'tech') {
            $stmt = $this->pdo->prepare("
                INSERT INTO tech_disposals (tech_name, inventory_number, quantity)
                SELECT tech_name, inventory_number, quantity FROM tech_stock WHERE id = ?
            ");
            $stmt->execute([$id]);

            $stmt = $this->pdo->prepare("DELETE FROM tech_stock WHERE id = ? LIMIT 1");
            $stmt->execute([$id]);
        }
    }

    public function moveItemToStock(string $type, int $id): void
    {
        if ($type === 'cartridge') {
            $stmt = $this->pdo->prepare("
                INSERT INTO cartridge_stock (cartridge_name, inventory_number, quantity)
                SELECT cartridge_name, inventory_number, quantity FROM cartridge_disposals WHERE id = ?
            ");
            $stmt->execute([$id]);

            $stmt = $this->pdo->prepare("DELETE FROM cartridge_disposals WHERE id = ? LIMIT 1");
            $stmt->execute([$id]);
        } elseif ($type === 'tech') {
            $stmt = $this->pdo->prepare("
                INSERT INTO tech_stock (tech_name, inventory_number, quantity)
                SELECT tech_name, inventory_number, quantity FROM tech_disposals WHERE id = ?
            ");
            $stmt->execute([$id]);

            $stmt = $this->pdo->prepare("DELETE FROM tech_disposals WHERE id = ? LIMIT 1");
            $stmt->execute([$id]);
        }
    }

    public function deleteAllWriteoff(): void
    {
        $this->pdo->query("DELETE FROM cartridge_disposals");
        $this->pdo->query("DELETE FROM tech_disposals");
    }

    public function getWriteoffExportData(): array
    {
        $items = [];

        $stmt = $this->pdo->query("
            SELECT cartridge_name as name, inventory_number, quantity FROM cartridge_disposals
        ");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $items[] = ['Картридж', $row['name'], $row['inventory_number'], $row['quantity']];
        }

        $stmt = $this->pdo->query("
            SELECT tech_name as name, inventory_number, quantity FROM tech_disposals
        ");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $items[] = ['Техника', $row['name'], $row['inventory_number'], $row['quantity']];
        }

        return $items;
    }
}