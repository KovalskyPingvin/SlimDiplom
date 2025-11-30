<?php
namespace App\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response as SlimResponse;

class AuthMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        // Проверка авторизации
        if (!isset($_SESSION['id_user'])) {
            $response = new SlimResponse();
            return $response->withHeader('Location', '/login')->withStatus(302);
        }

        // Проверка роли (только админы: id_user <= 2)
        if ($_SESSION['id_user'] > 2) {
            // Можно редирект на главную или на страницу "Доступ запрещён"
            $response = new SlimResponse();
            return $response->withHeader('Location', '/')->withStatus(302);
        }

        // Если всё в порядке — передаём управление дальше
        return $handler->handle($request);
    }
}