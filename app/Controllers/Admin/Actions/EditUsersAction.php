<?php
// app/Controllers/Admin/Actions/EditUsersAction.php

namespace App\Controllers\Admin\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use App\Controllers\Admin\Models\UserModel;

class EditUsersAction
{
    public function __construct(
        private Twig $view,
        private UserModel $model
    ) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $method = $request->getMethod();
        $params = $request->getParsedBody();
        $users = $this->model->getAllUsers();
        $data = [
            'users' => $users,
            'errorAdd' => null,
            'errorEdit' => null,
        ];

        if ($method === 'POST' && isset($params['action'])) {
            $action = $params['action'];

            if ($action === 'add') {
                $log = trim($params['log'] ?? '');
                $pass = trim($params['pass'] ?? '');
                $username = trim($params['username'] ?? '');

                if ($this->model->isLoginExists($log)) {
                    $data['errorAdd'] = "Логин \"$log\" уже используется. Пожалуйста, выберите другой.";
                } else {
                    $this->model->addUser($log, $pass, $username);
                    return $response->withHeader('Location', '/admin/editusers')->withStatus(302);
                }
            }

            if ($action === 'edit') {
                $id = (int)($params['id_user'] ?? 0);
                $log = trim($params['log'] ?? '');
                $pass = trim($params['pass'] ?? '');
                $username = trim($params['username'] ?? '');

                if ($this->model->isLoginExists($log, $id)) {
                    $data['errorEdit'] = "Логин \"$log\" уже используется. Пожалуйста, выберите другой.";
                } else {
                    $this->model->updateUser($id, $log, $pass, $username);
                    return $response->withHeader('Location', '/admin/editusers')->withStatus(302);
                }
            }

            if ($action === 'delete' && (int)($params['id_user'] ?? 0) > 2) {
                $id = (int)$params['id_user'];
                $this->model->deleteUser($id);
                return $response->withHeader('Location', '/admin/editusers')->withStatus(302);
            }
        }

        return $this->view->render($response, 'admin/editusers.twig', $data);
    }
}