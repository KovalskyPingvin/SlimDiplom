<?php
// app/Controllers/Home/Actions/AboutAction.php

namespace App\Controllers\Home\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class AboutAction
{
    public function __construct(private Twig $view) {}

    public function __invoke(Request $request, Response $response): Response
    {
        return $this->view->render($response, 'home/about.twig');
    }
}