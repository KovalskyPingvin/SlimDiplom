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

        $requests = $this->model->getAllRequests($limit, $offset);
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
        ];

        return $this->view->render($response, 'admin/requests.twig', $data);
    }

    public function updateRequestStatus(int $id, string $type, string $status): bool
{
    try {
        if ($type === 'Картридж') {
            $stmt = $this->pdo->prepare("UPDATE cartridge_requests SET status = ? WHERE id_request = ?");
        } elseif ($type === 'Техника') {
            $stmt = $this->pdo->prepare("UPDATE tech_requests SET status = ? WHERE id_request = ?");
        } else {
            return false;
        }

        $result = $stmt->execute([$status, $id]);
        return $result;
    } catch (\Exception $e) {
        error_log("Ошибка при обновлении статуса заявки: " . $e->getMessage());
        return false;
    }
}
}