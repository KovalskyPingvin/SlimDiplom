<?php
// app/Controllers/Application/Actions/SubmitAction.php

namespace App\Controllers\Application\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Application\Models\CartridgeRequestModel;

class SubmitAction
{
    public function __construct(private CartridgeRequestModel $model) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();
        $userId = $_SESSION['id_user'] ?? 0;

        if ($userId <= 0) {
            error_log("Пользователь не авторизован");
            return $response->withJson(['success' => false, 'message' => 'Ошибка: пользователь не авторизован.'], 401);
        }

        error_log("Отправка заявки от пользователя ID: " . $userId);
        error_log("Данные: " . json_encode($data));

        try {
            $result = $this->model->createRequest($data, $userId);
            error_log("Результат запроса: " . ($result ? 'true' : 'false'));

            if ($result) {
                return $response->withJson(['success' => true, 'message' => 'Заявка успешно отправлена!']);
            } else {
                return $response->withJson(['success' => false, 'message' => 'Ошибка отправки заявки.'], 500);
            }
        } catch (\Exception $e) {
            error_log("Ошибка в SubmitAction: " . $e->getMessage());
            return $response->withJson(['success' => false, 'message' => 'Ошибка сервера: ' . $e->getMessage()], 500);
        }
    }
}