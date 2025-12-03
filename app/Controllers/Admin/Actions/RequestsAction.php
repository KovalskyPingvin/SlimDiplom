<?php
// app/Controllers/Admin/Actions/RequestsAction.php

namespace App\Controllers\Admin\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use App\Controllers\Admin\Models\RequestsModel;

class RequestsAction
{
    public function __construct(
        private Twig $view,
        private RequestsModel $model
    ) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $queryParams = $request->getQueryParams();
        $page = (int)($queryParams['page'] ?? 1);
        $page = max(1, $page);
        $limit = 10;
        $offset = ($page - 1) * $limit;
        
        // Фильтр по статусу
        $showOnlyPending = isset($queryParams['status']) && $queryParams['status'] === 'pending';

        $requests = $this->model->getAllRequests($limit, $offset);
        
        // Применяем фильтр если нужно
        if ($showOnlyPending) {
            $requests = array_filter($requests, function($req) {
                return $req['status'] !== 'Завершен';
            });
            // Перенумеруем массив после фильтрации
            $requests = array_values($requests);
        }

        $total = $this->model->getTotalRequestsCount();
        $totalPages = ceil($total / $limit);

        // === НОВОЕ: получить имя получателя из БД ===
        $recipientName = $this->model->getRecipientName();

        $data = [
            'requests' => $requests,
            'current_page' => $page,
            'total_pages' => $totalPages,
            'total_count' => $total,
            'recipient_name' => $recipientName, // ← передаём в шаблон
            'show_only_pending' => $showOnlyPending,
        ];

        return $this->view->render($response, 'admin/requests.twig', $data);
    }
}