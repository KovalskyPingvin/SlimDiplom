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

        if ($method === 'POST' && isset($params['action'])) {
            $action = $params['action'];

            if ($action === 'add') {
                $log = trim($params['log'] ?? '');
                $pass = trim($params['pass'] ?? '');
                $username = trim($params['username'] ?? '');
                $role = $params['role'] ?? 'user';

                if ($log && $pass && $username) {
                    $this->model->createUser([
                        'log' => $log,
                        'pass' => $pass,
                        'username' => $username,
                        'role' => $role,
                    ]);
                }
                return $response->withHeader('Location', '/admin/editusers')->withStatus(302);
            }

            if ($action === 'edit') {
                $id = (int)($params['id'] ?? 0);
                if ($id > 0) {
                    $log = trim($params['log'] ?? '');
                    $pass = trim($params['pass'] ?? '');
                    $username = trim($params['username'] ?? '');
                    $role = $params['role'] ?? 'user';

                    if ($log && $username) {
                        $this->model->updateUser($id, [
                            'log' => $log,
                            'pass' => $pass,
                            'username' => $username,
                            'role' => $role,
                        ]);
                    }
                }
                return $response->withHeader('Location', '/admin/editusers')->withStatus(302);
            }

            if ($action === 'delete') {
                $id = (int)($params['id'] ?? 0);
                if ($id > 0) {
                    $user = $this->model->findById($id);
                    // Не удаляем администраторов
                    if ($user && in_array($user['role'], ['admin_ui', 'admin_it'])) {
                        // Можешь добавить flash-уведомление
                        return $response->withHeader('Location', '/admin/editusers')->withStatus(302);
                    }

                    $this->model->deleteUser($id);
                }
                return $response->withHeader('Location', '/admin/editusers')->withStatus(302);
            }
        }

        $users = $this->model->getAllUsers();

        return $this->view->render($response, 'admin/editusers.twig', [
            'users' => $users,
        ]);
    }
}