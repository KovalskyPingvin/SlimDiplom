<?php
use Slim\Routing\RouteCollectorProxy;

return function ($app) {
    // === Главные страницы ===
    $app->get('/', \App\Controllers\Home\Actions\IndexAction::class);
    $app->get('/about', \App\Controllers\Home\Actions\AboutAction::class);

    // === Авторизация ===
    $app->post('/login', \App\Controllers\User\Actions\LoginAction::class);
    $app->get('/logout', \App\Controllers\User\Actions\LogoutAction::class);

    // === Заявки пользователей ===
    $app->group('/sending', function (RouteCollectorProxy $group) {
        $group->get('', \App\Controllers\Application\Actions\IndexAction::class)->setName('applications.index');
        $group->get('/cartridge', \App\Controllers\Application\Actions\CartridgeFormAction::class)->setName('application.cartridge');
        $group->get('/repair', \App\Controllers\Application\Actions\RepairFormAction::class)->setName('application.repair');
        $group->get('/software', \App\Controllers\Application\Actions\SoftwareFormAction::class)->setName('application.software');
        $group->get('/wifi-user', \App\Controllers\Application\Actions\WifiUserFormAction::class)->setName('application.wifi-user');
        $group->get('/vk-access', \App\Controllers\Application\Actions\VkAccessFormAction::class)->setName('application.vk-access');
        $group->get('/event', \App\Controllers\Application\Actions\EventFormAction::class)->setName('application.event');
        $group->get('/equipment', \App\Controllers\Application\Actions\EquipmentFormAction::class)->setName('application.equipment');
        $group->post('/submit', \App\Controllers\Application\Actions\SubmitAction::class)->setName('application.submit');
    })->add(\App\Middleware\AuthMiddleware::class); // Требуется авторизация

    // === Админка (только для админов: id_user <= 2) ===
    $app->group('/admin', function (RouteCollectorProxy $group) {
        // Главная страница админки — как старый adminpage.php
        $group->get('', \App\Controllers\Admin\Actions\DashboardAction::class);

        // Совместимость (уже реализовано)
        $group->get('/compatibility', \App\Controllers\Admin\Actions\CompatibilityAction::class);
        $group->post('/compatibility', \App\Controllers\Admin\Actions\CompatibilityAction::class);
        $group->get('/compatibility/export', \App\Controllers\Admin\Actions\CompatibilityExportAction::class);

        // Остальные разделы — пока заглушки (перенаправляют на /admin)
        // Позже заменишь на реальные экшены
        $group->get('/requests', fn($req, $res) => $res->withHeader('Location', '/admin')->withStatus(302));
        $group->get('/editusers', fn($req, $res) => $res->withHeader('Location', '/admin')->withStatus(302));
        $group->get('/storage', fn($req, $res) => $res->withHeader('Location', '/admin')->withStatus(302));
        $group->get('/writeoff', fn($req, $res) => $res->withHeader('Location', '/admin')->withStatus(302));
        $group->get('/setting', fn($req, $res) => $res->withHeader('Location', '/admin')->withStatus(302));
    })->add(\App\Middleware\AuthMiddleware::class); // Защита админки
};