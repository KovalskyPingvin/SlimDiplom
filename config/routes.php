<?php
use Slim\Routing\RouteCollectorProxy;

return function ($app) {
    $app->get('/', \App\Controllers\Home\Actions\IndexAction::class);
    $app->get('/about', \App\Controllers\Home\Actions\AboutAction::class);

    $app->post('/login', \App\Controllers\User\Actions\LoginAction::class);
    $app->get('/logout', \App\Controllers\User\Actions\LogoutAction::class);

    // === Заявки (Application) ===
    $app->group('/applications', function (RouteCollectorProxy $group) {
        $group->get('', \App\Controllers\Application\Actions\IndexAction::class)->setName('applications.index');
        $group->get('/repair', \App\Controllers\Application\Actions\RepairFormAction::class)->setName('application.repair');
        $group->get('/cartridge', \App\Controllers\Application\Actions\CartridgeFormAction::class)->setName('application.cartridge');
        // Добавь другие формы: /software, /wifi-user и т.д.
        $group->post('/submit', \App\Controllers\Application\Actions\SubmitAction::class)->setName('application.submit');
    })->add(\App\Middleware\AuthMiddleware::class); // Защита авторизацией
};