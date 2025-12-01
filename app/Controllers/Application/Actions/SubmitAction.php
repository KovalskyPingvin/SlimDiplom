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
            return $response->withJson(['success' => false, 'message' => 'Ошибка: пользователь не авторизован.']);
        }

        $result = $this->model->createRequest($data, $userId);

        if ($result) {
            return $response->withJson(['success' => true, 'message' => 'Заявка успешно отправлена!']);
        } else {
            return $response->withJson(['success' => false, 'message' => 'Ошибка отправки заявки.']);
        }
    }
}