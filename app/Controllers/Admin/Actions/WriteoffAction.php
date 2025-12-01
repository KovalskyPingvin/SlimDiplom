<?php
// app/Controllers/Admin/Actions/WriteoffAction.php

namespace App\Controllers\Admin\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use App\Controllers\Admin\Models\WriteoffModel;

class WriteoffAction
{
    public function __construct(
        private Twig $view,
        private WriteoffModel $model
    ) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $method = $request->getMethod();
        $params = $request->getParsedBody();

        if ($method === 'POST' && isset($params['action'])) {
            $action = $params['action'];

            if ($action === 'move_to_writeoff') {
                $type = $params['type'] ?? '';
                $id = (int)($params['id'] ?? 0);

                if ($type && $id > 0) {
                    $this->model->moveItemToWriteoff($type, $id);
                }
                return $response->withHeader('Location', '/admin/writeoff')->withStatus(302);
            }

            if ($action === 'move_to_stock') {
                $type = $params['type'] ?? '';
                $id = (int)($params['id'] ?? 0);

                if ($type && $id > 0) {
                    $this->model->moveItemToStock($type, $id);
                }
                return $response->withHeader('Location', '/admin/writeoff')->withStatus(302);
            }

            if ($action === 'delete_all') {
                $this->model->deleteAllWriteoff();
                return $response->withHeader('Location', '/admin/writeoff')->withStatus(302);
            }
        }

        $stockData = $this->model->getStockData();
        $writeoffData = $this->model->getWriteoffData();

        $data = [
            'cartridges_stock' => $stockData['cartridges'],
            'tech_stock' => $stockData['tech'],
            'cartridges_writeoff' => $writeoffData['cartridges'],
            'tech_writeoff' => $writeoffData['tech'],
        ];

        return $this->view->render($response, 'admin/writeoff.twig', $data);
    }
}