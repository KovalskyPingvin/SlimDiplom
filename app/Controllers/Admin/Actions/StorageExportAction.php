<?php
// app/Controllers/Admin/Actions/StorageExportAction.php

namespace App\Controllers\Admin\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Admin\Models\StorageModel;

class StorageExportAction
{
    public function __construct(private StorageModel $model) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $params = $request->getParsedBody();
        $exportType = $params['export_type'] ?? '';
        $format = $params['format'] ?? '';

        if (!in_array($exportType, ['tech', 'cartridge', 'all']) || !in_array($format, ['excel', 'word'])) {
            return $response->withHeader('Location', '/admin/storage')->withStatus(302);
        }

        $items = [];

        if ($exportType === 'tech' || $exportType === 'all') {
            $rows = $this->model->getTechStock();
            foreach ($rows as $row) {
                $items[] = ['Техника', $row['name'], $row['inventory_number'], $row['quantity']];
            }
        }

        if ($exportType === 'cartridge' || $exportType === 'all') {
            $rows = $this->model->getCartridgeStock();
            foreach ($rows as $row) {
                $items[] = ['Картридж', $row['name'], $row['inventory_number'], $row['quantity']];
            }
        }

        // Добавим заголовки
        array_unshift($items, ['Тип', 'Название', 'Инвентарный номер', 'Количество']);

        if ($format === 'excel') {
            // Используем SimpleXLSXGen
            $xlsx = \Shuchkin\SimpleXLSXGen::fromArray($items);

            // Начинаем буферизацию вывода
            ob_start();
            $xlsx->downloadAs('storage_export_' . date('Y-m-d') . '.xlsx'); // Это напечатает файл в буфер
            $content = ob_get_contents();
            ob_end_clean(); // Очищаем буфер

            $response = $response->withHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            $response = $response->withHeader('Content-Disposition', 'attachment; filename="storage_export_' . date('Y-m-d') . '.xlsx"');
            $response->getBody()->write($content);
            return $response;
        }

        if ($format === 'word') {
            $content = "<html><head><meta charset='UTF-8'><title>Экспорт данных</title>";
            $content .= "<style>table, th, td {border:1px solid black; border-collapse: collapse; padding: 5px;} th {background-color: #ddd;}</style>";
            $content .= "</head><body>";
            $content .= "<h2>Экспорт данных со склада ({$exportType})</h2>";
            $content .= "<table>";
            $content .= "<tr><th>Тип</th><th>Название</th><th>Инвентарный номер</th><th>Количество</th></tr>";

            foreach (array_slice($items, 1) as $item) {
                $content .= "<tr>";
                foreach ($item as $cell) {
                    $content .= "<td>" . htmlspecialchars($cell, ENT_QUOTES, 'UTF-8') . "</td>";
                }
                $content .= "</tr>";
            }

            $content .= "</table></body></html>";

            $response = $response->withHeader('Content-Type', 'application/msword; charset=utf-8');
            $response = $response->withHeader('Content-Disposition', 'attachment; filename="storage_export_' . date('Y-m-d') . '.doc"');
            $response->getBody()->write($content);
            return $response;
        }

        return $response->withHeader('Location', '/admin/storage')->withStatus(302);
    }
}