<?php
// app/Controllers/Admin/Actions/WriteoffExportAction.php

namespace App\Controllers\Admin\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Admin\Models\WriteoffModel;

class WriteoffExportAction
{
    public function __construct(private WriteoffModel $model) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $format = $request->getParsedBody()['format'] ?? '';

        if (!in_array($format, ['excel', 'word'])) {
            return $response->withHeader('Location', '/admin/writeoff')->withStatus(302);
        }

        $items = $this->model->getWriteoffExportData();
        array_unshift($items, ['Тип', 'Название', 'Инвентарный номер', 'Количество']);

        if ($format === 'excel') {
            $xlsx = \Shuchkin\SimpleXLSXGen::fromArray($items);

            ob_start();
            $xlsx->downloadAs('Списание_за_' . date('Y-m-d') . '.xlsx');
            $content = ob_get_contents();
            ob_end_clean();

            $response = $response->withHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            $response = $response->withHeader('Content-Disposition', 'attachment; filename="Списание_за_' . date('Y-m-d') . '.xlsx"');
            $response->getBody()->write($content);
            return $response;
        }

        if ($format === 'word') {
            $content = "<html><head><meta charset='UTF-8'><title>Экспорт списания</title>";
            $content .= "<style>
                body { font-family: Arial, sans-serif; }
                h2 { text-align: center; margin-bottom: 20px; }
                .centered-table { margin: 0 auto; border-collapse: collapse; }
                table, th, td { border: 1px solid black; padding: 5px; }
                th { background-color: #ddd; }
            </style>";
            $content .= "</head><body>";
            $content .= "<h2>Экспорт таблицы списания</h2>";
            $content .= "<table class='centered-table'>";
            $content .= "<tr><th>Тип</th><th>Название</th><th>Инвентарный номер</th><th>Количество</th></tr>";

            foreach (array_slice($items, 1) as $row) {
                $content .= "<tr>";
                foreach ($row as $cell) {
                    $content .= "<td>" . htmlspecialchars($cell, ENT_QUOTES, 'UTF-8') . "</td>";
                }
                $content .= "</tr>";
            }

            $content .= "</table></body></html>";

            $response = $response->withHeader('Content-Type', 'application/msword; charset=utf-8');
            $response = $response->withHeader('Content-Disposition', 'attachment; filename="Списание_за_' . date('Y-m-d') . '.doc"');
            $response->getBody()->write($content);
            return $response;
        }

        return $response->withHeader('Location', '/admin/writeoff')->withStatus(302);
    }
}