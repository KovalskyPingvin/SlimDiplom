<?php
// app/Controllers/Admin/Actions/StorageAction.php

namespace App\Controllers\Admin\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use App\Controllers\Admin\Models\StorageModel;

class StorageAction
{
    public function __construct(
        private Twig $view,
        private StorageModel $model
    ) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $method = $request->getMethod();
        $params = $request->getParsedBody();

        if ($method === 'POST' && isset($params['action'])) {
            $action = $params['action'];
            $type = $params['type'] ?? null;
            $id = (int)($params['id'] ?? 0);
            $name = trim($params['name'] ?? '');
            $inventory = trim($params['inventory'] ?? '');
            $quantity = (int)($params['quantity'] ?? 0);

            if ($action === 'add') {
                if ($type && $name && $quantity > 0) {
                    $this->model->addItem($type, $name, $inventory, $quantity);
                }
                return $response->withHeader('Location', '/admin/storage')->withStatus(302);
            }

            if ($action === 'edit') {
                if ($type && $id > 0 && $name && $quantity >= 0) {
                    $this->model->updateItem($id, $type, $name, $inventory, $quantity);
                }
                return $response->withHeader('Location', '/admin/storage')->withStatus(302);
            }

            if ($action === 'delete') {
                if ($type && $id > 0) {
                    $this->model->deleteItem($id, $type);
                }
                return $response->withHeader('Location', '/admin/storage')->withStatus(302);
            }
        }

        $items = $this->model->getAllItems();

        return $this->view->render($response, 'admin/storage.twig', [
            'items' => $items,
        ]);
    }
}