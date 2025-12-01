<?php
// app/DependencyInjection/definitions.php

use Psr\Container\ContainerInterface;
use Slim\Views\Twig;
use Twig\Loader\FilesystemLoader;
use App\Controllers\User\Models\UserModel as UserUserModel; // для авторизации
use App\Controllers\User\Models\Auth;
use App\Controllers\Admin\Models\CompatibilityModel;
use App\Controllers\Admin\Models\UserModel as AdminUserModel; // для editusers
use App\Controllers\Admin\Models\SettingModel; // для setting
use App\Controllers\Admin\Models\StorageModel; // для storage
use App\Controllers\Admin\Models\WriteoffModel; // для writeoff
use App\Controllers\Admin\Models\RequestsModel; // для /admin/requests
use App\Controllers\User\Models\RequestUserModel; // для /requests (мои заявки)
use App\Controllers\Application\Models\CartridgeRequestModel; // для /sending/cartridge
use App\Twig\Extensions\TwigExtensions; // ← Подключаем расширение Twig

return [
    // === Подключение к базе данных (PDO) ===
    \PDO::class => function (ContainerInterface $container) {
        $config = require __DIR__ . '/../../config/database.php';
        return new \PDO(
            sprintf('mysql:host=%s;dbname=%s;charset=%s', 
                $config['db']['host'],
                $config['db']['dbname'],
                $config['db']['charset'] ?? 'utf8mb4'
            ),
            $config['db']['username'],
            $config['db']['password'],
            [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ]
        );
    },

    // === Twig — с пользовательским фильтром ===
    Twig::class => function (ContainerInterface $container) {
        $loader = new FilesystemLoader(__DIR__ . '/../../templates');
        $twig = new Twig($loader, [
            'cache' => __DIR__ . '/../../var/cache/twig',
            'debug' => true,
            'auto_reload' => true,
        ]);

        // === Подключаем пользовательские фильтры ===
        $twig->getEnvironment()->addExtension(new TwigExtensions());

        $twig->getEnvironment()->addGlobal('session', $_SESSION ?? []);

        return $twig;
    },

    // === Модели ===
    UserUserModel::class => \DI\autowire(),
    Auth::class => \DI\autowire(),
    CompatibilityModel::class => \DI\autowire(),
    AdminUserModel::class => \DI\autowire(),
    SettingModel::class => \DI\autowire(),
    StorageModel::class => \DI\autowire(),
    WriteoffModel::class => \DI\autowire(),
    RequestsModel::class => \DI\autowire(), // для /admin/requests
    RequestUserModel::class => \DI\autowire(), // для /requests
    CartridgeRequestModel::class => \DI\autowire(), // для /sending/cartridge
];