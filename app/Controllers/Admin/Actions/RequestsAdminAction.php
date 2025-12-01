<?php
// app/Controllers/Admin/Actions/RequestsAdminAction.php

namespace App\Controllers\Admin\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use App\Controllers\Admin\Models\RequestsAdminModel;

class RequestsAdminAction
{
    public function __construct(
        private Twig $view,
        private RequestsAdminModel $model
    ) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $params = $request->getQueryParams();
        $page = (int)($params['page'] ?? 1);
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $requests = $this->model->getRequests($offset, $limit);
        $totalCount = $this->model->getTotalCount();
        $totalPages = ceil($totalCount / $limit);

        $data = [
            'requests' => $requests,
            'current_page' => $page,
            'total_pages' => $totalPages,
        ];

        return $this->view->render($response, 'admin/requests_admin.twig', $data);
    }
}