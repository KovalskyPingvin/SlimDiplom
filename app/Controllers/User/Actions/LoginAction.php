<?php
// app/Controllers/User/Actions/LoginAction.php

namespace App\Controllers\User\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\User\Models\Auth;

class LoginAction
{
    public function __construct(private Auth $auth) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody() ?: json_decode($request->getBody()->getContents(), true);

        if (!$data) {
            $response->getBody()->write(json_encode(['success' => false, 'message' => 'Неверный формат данных']));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
        }

        $login = $data['login'] ?? '';
        $password = $data['password'] ?? '';

        if (empty($login) || empty($password)) {
            $response->getBody()->write(json_encode(['success' => false, 'message' => 'Заполните все поля']));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
        }

        if ($this->auth->login($login, $password)) {
            $response->getBody()->write(json_encode(['success' => true]));
            return $response->withHeader('Content-Type', 'application/json');
        }

        $response->getBody()->write(json_encode(['success' => false, 'message' => 'Неверный логин или пароль']));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(401);
    }
}