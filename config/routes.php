<?php
use Slim\Routing\RouteCollectorProxy;

return function ($app) {
    // === Главные страницы ===
    $app->get('/', \App\Controllers\Home\Actions\IndexAction::class);
    $app->get('/about', \App\Controllers\Home\Actions\AboutAction::class);

    // === Авторизация ===
    $app->post('/login', \App\Controllers\User\Actions\LoginAction::class);
    $app->get('/logout', \App\Controllers\User\Actions\LogoutAction::class);

    // === Мои заявки (только для авторизованных пользователей) ===
    $app->get('/requests', \App\Controllers\User\Actions\RequestsUserAction::class)
        ->add(\App\Middleware\AuthMiddleware::class);

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
    })->add(\App\Middleware\AuthMiddleware::class);

    // === Админка (только для админов: id_user <= 2) ===
$app->group('/admin', function (RouteCollectorProxy $group) {
    // Главная страница админки — как старый adminpage.php
    $group->get('', \App\Controllers\Admin\Actions\DashboardAction::class);

    // Совместимость (уже реализовано)
    $group->get('/compatibility', \App\Controllers\Admin\Actions\CompatibilityAction::class);
    $group->post('/compatibility', \App\Controllers\Admin\Actions\CompatibilityAction::class);
    $group->get('/compatibility/export', \App\Controllers\Admin\Actions\CompatibilityExportAction::class);

    // Управление пользователями (новое)
    $group->get('/editusers', \App\Controllers\Admin\Actions\EditUsersAction::class);
    $group->post('/editusers', \App\Controllers\Admin\Actions\EditUsersAction::class);
    $group->post('/editusers/export', \App\Controllers\Admin\Actions\EditUsersExportAction::class);

    // Настройки заявок (новое)
    $group->get('/setting', \App\Controllers\Admin\Actions\SettingAction::class);
    $group->post('/setting', \App\Controllers\Admin\Actions\SettingAction::class);

    // Склад (новое)
    $group->get('/storage', \App\Controllers\Admin\Actions\StorageAction::class);
    $group->post('/storage', \App\Controllers\Admin\Actions\StorageAction::class);
    $group->post('/storage/export', \App\Controllers\Admin\Actions\StorageExportAction::class);

    // Списание (новое)
    $group->get('/writeoff', \App\Controllers\Admin\Actions\WriteoffAction::class);
    $group->post('/writeoff', \App\Controllers\Admin\Actions\WriteoffAction::class);
    $group->post('/writeoff/export', \App\Controllers\Admin\Actions\WriteoffExportAction::class);

    // Заявки пользователей (новое)
    $group->get('/requests', \App\Controllers\Admin\Actions\RequestsAction::class);
    $group->post('/requests', \App\Controllers\Admin\Actions\RequestsAction::class);
    $group->post('/requests/export', \App\Controllers\Admin\Actions\RequestsExportAction::class);
    $group->post('/requests/complete', \App\Controllers\Admin\Actions\RequestsCompleteAction::class); // ← Добавь это
})->add(\App\Middleware\AuthMiddleware::class);
};