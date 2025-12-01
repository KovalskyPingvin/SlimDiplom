<?php
// app/Controllers/User/Actions/RequestsUserAction.php

namespace App\Controllers\User\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use App\Controllers\User\Models\RequestUserModel;

class RequestsUserAction
{
    public function __construct(
        private Twig $view,
        private RequestUserModel $model
    ) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $user_id = (int)($_SESSION['id_user'] ?? 0);
        if ($user_id <= 0) {
            return $response->withHeader('Location', '/')->withStatus(302);
        }

        $queryParams = $request->getQueryParams();
        $page = (int)($queryParams['page'] ?? 1);
        $page = max(1, $page);
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $requests = $this->model->getUserRequests($user_id, $limit, $offset);
        $total = $this->model->getUserRequestsCount($user_id);
        $totalPages = ceil($total / $limit);

        $recipientName = $this->model->getRecipientName();

        $data = [
            'requests' => $requests,
            'current_page' => $page,
            'total_pages' => $totalPages,
            'recipient_name' => $recipientName,
        ];

        return $this->view->render($response, 'user/requests_user.twig', $data);
    }
}