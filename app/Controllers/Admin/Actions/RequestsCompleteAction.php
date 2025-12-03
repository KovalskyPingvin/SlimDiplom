<?php
// app/Controllers/Admin/Actions/RequestsCompleteAction.php

namespace App\Controllers\Admin\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Admin\Models\RequestsModel;
use App\Common\Services\FlashService;

class RequestsCompleteAction
{
    public function __construct(
        private RequestsModel $model,
        private FlashService $flash
    ) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $params = $request->getParsedBody();
        $id = (int)($params['id'] ?? 0);
        $type = $params['type'] ?? '';

        if (!$id || !in_array($type, ['Картридж', 'Техника'])) {
            $this->flash->setMessage('Неверные данные для завершения заявки.', 'error');
            return $response->withHeader('Location', '/admin/requests')->withStatus(302);
        }

        try {
            $result = $this->model->updateRequestStatus($id, $type, 'Завершен');

            if ($result) {
                $this->flash->setMessage('Заявка успешно завершена.', 'success');
            } else {
                $this->flash->setMessage('Ошибка завершения заявки.', 'error');
            }
        } catch (\Exception $e) {
            $this->flash->setMessage('Ошибка сервера: ' . $e->getMessage(), 'error');
        }

        return $response->withHeader('Location', '/admin/requests')->withStatus(302);
    }
}