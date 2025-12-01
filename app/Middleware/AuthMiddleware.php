<?php
namespace App\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class AuthMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        // Проверка авторизации
        if (!isset($_SESSION['id_user'])) {
            // Создаём новый Response через фабрику или используем Slim\App
            // Но в Slim 4 рекомендуется использовать фабрику или контейнер
            $response = new \Nyholm\Psr7\Response(); // ← используем Nyholm
            return $response->withHeader('Location', '/login')->withStatus(302);
        }

        // Проверка роли (только админы: id_user <= 2)
        if ($_SESSION['id_user'] > 2) {
            $response = new \Nyholm\Psr7\Response();
            return $response->withHeader('Location', '/')->withStatus(302);
        }

        // Если всё в порядке — передаём управление дальше
        return $handler->handle($request);
    }
}