<?php
// app/Controllers/Admin/Actions/SettingAction.php

namespace App\Controllers\Admin\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use App\Controllers\Admin\Models\SettingModel;

class SettingAction
{
    public function __construct(
        private Twig $view,
        private SettingModel $model
    ) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $message = null;
        $method = $request->getMethod();

        if ($method === 'POST') {
            $params = $request->getParsedBody();
            $recipientName = trim($params['recipient_name'] ?? '');

            if ($recipientName !== '') {
                $this->model->saveRecipientName($recipientName);
                $message = 'Имя получателя успешно обновлено!';
            }
        }

        $currentValue = $this->model->getRecipientName();

        $data = [
            'message' => $message,
            'currentValue' => $currentValue,
        ];

        return $this->view->render($response, 'admin/setting.twig', $data);
    }
}