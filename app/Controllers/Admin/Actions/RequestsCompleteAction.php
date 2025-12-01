<?php
// app/Controllers/Admin/Actions/RequestsCompleteAction.php

namespace App\Controllers\Admin\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Admin\Models\RequestsModel;

class RequestsCompleteAction
{
    public function __construct(private RequestsModel $model) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $params = $request->getParsedBody();
        $id = (int)($params['id'] ?? 0);
        $type = $params['type'] ?? '';

        if ($id > 0 && in_array($type, ['Картридж', 'Техника'])) {
            $this->model->updateRequestStatus($id, $type, 'Завершен');
        }

        return $response->withHeader('Location', '/admin/requests')->withStatus(302);
    }
}