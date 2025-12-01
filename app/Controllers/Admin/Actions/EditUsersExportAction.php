<?php
// app/Controllers/Admin/Actions/EditUsersExportAction.php

namespace App\Controllers\Admin\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Admin\Models\UserModel;

class EditUsersExportAction
{
    public function __construct(private UserModel $model) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $format = $request->getParsedBody()['format'] ?? $request->getQueryParams()['format'] ?? 'excel';

        $users = $this->model->getAllUsers();
        $data = [['Логин', 'Пароль', 'Имя пользователя']];
        foreach ($users as $user) {
            $data[] = [$user['log'], $user['pass'], $user['username']];
        }

        // Экспорт в Excel
        if ($format === 'excel' || $format === 'xlsx') {
            // Используем SimpleXLSXGen
            $xlsx = \Shuchkin\SimpleXLSXGen::fromArray($data);

            // Начинаем буферизацию вывода
            ob_start();
            $xlsx->downloadAs('users.xlsx'); // Это напечатает файл в буфер
            $content = ob_get_contents();
            ob_end_clean(); // Очищаем буфер

            $response = $response->withHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            $response = $response->withHeader('Content-Disposition', 'attachment; filename="users.xlsx"');
            $response->getBody()->write($content);
            return $response;
        }

        // Экспорт в Word
        if ($format === 'word' || $format === 'doc') {
            $content = "<html><head><meta charset='UTF-8'></head><body>";
            $content .= "<h2 style='text-align:center;'>Список пользователей</h2>";
            $content .= "<table border='1' cellspacing='0' cellpadding='5' style='width:100%; border-collapse:collapse;'>";
            $content .= "<tr style='background-color:#002b5e; color:white; font-weight:bold;'>
                        <th>Логин</th><th>Пароль</th><th>Имя пользователя</th>
                      </tr>";
            foreach (array_slice($data, 1) as $row) {
                $content .= "<tr>";
                foreach ($row as $cell) {
                    $content .= "<td>" . htmlspecialchars($cell, ENT_QUOTES, 'UTF-8') . "</td>";
                }
                $content .= "</tr>";
            }
            $content .= "</table></body></html>";

            $response = $response->withHeader('Content-Type', 'application/msword; charset=utf-8');
            $response = $response->withHeader('Content-Disposition', 'attachment; filename="users.doc"');
            $response->getBody()->write($content);
            return $response;
        }

        // Неверный формат
        return $response->withHeader('Location', '/admin/editusers')->withStatus(302);
    }
}