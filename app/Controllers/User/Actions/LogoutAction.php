<?php
// app/Controllers/User/Actions/LogoutAction.php
namespace App\Controllers\User\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\User\Models\Auth;

class LogoutAction
{
    public function __construct(private Auth $auth) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $this->auth->logout();
        return $response->withHeader('Location', '/')->withStatus(302);
    }
}