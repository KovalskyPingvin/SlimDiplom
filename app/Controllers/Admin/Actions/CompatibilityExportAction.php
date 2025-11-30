<?php
// app/Controllers/Admin/Actions/CompatibilityExportAction.php

namespace App\Controllers\Admin\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Admin\Models\CompatibilityModel;

class CompatibilityExportAction
{
    public function __construct(private CompatibilityModel $model) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $format = $request->getQueryParams()['format'] ?? '';

        if ($format !== 'word' && $format !== 'excel') {
            return $response->withHeader('Location', '/admin/compatibility')->withStatus(302);
        }

        $compatibilities = $this->model->getAll();

        if ($format === 'word') {
            $content = "<html><head><meta charset='UTF-8'></head><body>";
            $content .= "<h2 style='text-align:center;'>Совместимость картриджей и принтеров</h2>";
            $content .= "<table border='1' cellspacing='0' cellpadding='5' align='center' width='100%' style='border-collapse:collapse;'>";
            $content .= "<tr>
                <th style='width:30%; text-align:center;'>Принтер</th>
                <th style='width:70%; text-align:center;'>Картриджи</th>
            </tr>";

            foreach ($compatibilities as $printer => $cartridges) {
                $content .= "<tr>";
                $content .= "<td style='width:30%;'>" . htmlspecialchars($printer, ENT_QUOTES, 'UTF-8') . "</td>";
                $content .= "<td style='width:70%;'>" . htmlspecialchars(implode(', ', $cartridges), ENT_QUOTES, 'UTF-8') . "</td>";
                $content .= "</tr>";
            }

            $content .= "</table></body></html>";

            $response = $response->withHeader('Content-Type', 'application/vnd.ms-word; charset=utf-8');
            $response = $response->withHeader('Content-Disposition', 'attachment; filename="compatibility.doc"');
            $response->getBody()->write($content);
            return $response;
        }

        if ($format === 'excel') {
            // BOM для корректного отображения UTF-8 в Excel
            $bom = "\xEF\xBB\xBF";

            $content = "<table border='1'>";
            $content .= "<tr><th>Принтер</th><th>Картриджи</th></tr>";

            foreach ($compatibilities as $printer => $cartridges) {
                $content .= "<tr>";
                $content .= "<td>" . htmlspecialchars($printer, ENT_QUOTES, 'UTF-8') . "</td>";
                $content .= "<td>" . htmlspecialchars(implode(', ', $cartridges), ENT_QUOTES, 'UTF-8') . "</td>";
                $content .= "</tr>";
            }

            $content .= "</table>";

            $response = $response->withHeader('Content-Type', 'application/vnd.ms-excel; charset=utf-8');
            $response = $response->withHeader('Content-Disposition', 'attachment; filename="compatibility.xls"');
            $response = $response->withHeader('Cache-Control', 'max-age=0');
            $response->getBody()->write($bom . $content);
            return $response;
        }

        return $response->withHeader('Location', '/admin/compatibility')->withStatus(302);
    }
}