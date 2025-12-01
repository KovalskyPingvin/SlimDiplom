<?php
// app/Controllers/Application/Actions/CartridgeFormAction.php

namespace App\Controllers\Application\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class CartridgeFormAction
{
    public function __construct(private Twig $view) {}

    public function __invoke(Request $request, Response $response): Response
    {
        return $this->view->render($response, 'application/cartridge_form.twig', []);
    }
}