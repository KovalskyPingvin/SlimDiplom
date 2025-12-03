<?php
// app/Middleware/UserAuthMiddleware.php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class UserAuthMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        // Проверка авторизации (любой пользователь)
        if (!isset($_SESSION['id_user'])) {
            $response = new \Nyholm\Psr7\Response();
            return $response->withHeader('Location', '/')->withStatus(302);
        }

        // Если пользователь авторизован — передаём дальше
        return $handler->handle($request);
    }
}