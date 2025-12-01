<?php
// app/Controllers/Admin/Models/StorageModel.php

namespace App\Controllers\Admin\Models;

use PDO;

class StorageModel
{
    public function __construct(private PDO $pdo) {}

    public function getAllItems(): array
    {
        $items = [];

        $stmt = $this->pdo->query("
            SELECT id, tech_name as name, inventory_number, quantity, 'tech' as type
            FROM tech_stock
        ");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $items[] = $row;
        }

        $stmt = $this->pdo->query("
            SELECT id, cartridge_name as name, inventory_number, quantity, 'cartridge' as type
            FROM cartridge_stock
        ");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $items[] = $row;
        }

        return $items;
    }

    public function addItem(string $type, string $name, string $inventory, int $quantity): void
    {
        if ($type === 'tech') {
            $stmt = $this->pdo->prepare("INSERT INTO tech_stock (tech_name, inventory_number, quantity) VALUES (?, ?, ?)");
        } elseif ($type === 'cartridge') {
            $stmt = $this->pdo->prepare("INSERT INTO cartridge_stock (cartridge_name, inventory_number, quantity) VALUES (?, ?, ?)");
        } else {
            throw new \InvalidArgumentException("Invalid type: $type");
        }
        $stmt->execute([$name, $inventory, $quantity]);
    }

    public function updateItem(int $id, string $type, string $name, string $inventory, int $quantity): void
    {
        if ($type === 'tech') {
            $stmt = $this->pdo->prepare("UPDATE tech_stock SET tech_name = ?, inventory_number = ?, quantity = ? WHERE id = ?");
        } elseif ($type === 'cartridge') {
            $stmt = $this->pdo->prepare("UPDATE cartridge_stock SET cartridge_name = ?, inventory_number = ?, quantity = ? WHERE id = ?");
        } else {
            throw new \InvalidArgumentException("Invalid type: $type");
        }
        $stmt->execute([$name, $inventory, $quantity, $id]);
    }

    public function deleteItem(int $id, string $type): void
    {
        if ($type === 'tech') {
            $stmt = $this->pdo->prepare("DELETE FROM tech_stock WHERE id = ?");
        } elseif ($type === 'cartridge') {
            $stmt = $this->pdo->prepare("DELETE FROM cartridge_stock WHERE id = ?");
        } else {
            throw new \InvalidArgumentException("Invalid type: $type");
        }
        $stmt->execute([$id]);
    }

    // === НОВЫЕ МЕТОДЫ ДЛЯ ЭКСПОРТА ===
    public function getTechStock(): array
    {
        $stmt = $this->pdo->query("
            SELECT tech_name as name, inventory_number, quantity FROM tech_stock
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCartridgeStock(): array
    {
        $stmt = $this->pdo->query("
            SELECT cartridge_name as name, inventory_number, quantity FROM cartridge_stock
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}