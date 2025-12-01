<?php
// app/Controllers/Application/Actions/SubmitAction.php

namespace App\Controllers\Application\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Application\Models\CartridgeRequestModel;
use App\Common\Services\FlashService;

class SubmitAction
{
    public function __construct(
        private CartridgeRequestModel $model,
        private FlashService $flash
    ) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();
        $userId = $_SESSION['id_user'] ?? 0;

        if ($userId <= 0) {
            $this->flash->setMessage('Ошибка: пользователь не авторизован.', 'error');
            return $response->withHeader('Location', '/sending/cartridge')->withStatus(302);
        }

        try {
            $result = $this->model->createRequest($data, $userId);

            if ($result) {
                $this->flash->setMessage('Заявка успешно отправлена!', 'success');
            } else {
                $this->flash->setMessage('Ошибка отправки заявки.', 'error');
            }
        } catch (\Exception $e) {
            $this->flash->setMessage('Ошибка сервера: ' . $e->getMessage(), 'error');
        }

        return $response->withHeader('Location', '/sending/cartridge')->withStatus(302);
    }
}