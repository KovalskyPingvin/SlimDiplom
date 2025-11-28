<?php
// app/DependencyInjection/definitions.php

use Psr\Container\ContainerInterface;
use Slim\Views\Twig;
use Twig\Loader\FilesystemLoader;
use App\Controllers\User\Models\UserModel;
use App\Controllers\User\Models\Auth;

return [
    // === Подключение к базе данных (PDO) ===
    \PDO::class => function (ContainerInterface $container) {
        $config = require __DIR__ . '/../../config/database.php';
        $db = $config['db'];

        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s',
            $db['host'],
            $db['dbname'],
            $db['charset'] ?? 'utf8mb4'
        );

        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        return new \PDO($dsn, $db['username'], $db['password'], $options);
    },

    // === Twig — шаблонизатор (совместимый способ) ===
    Twig::class => function (ContainerInterface $container) {
        $loader = new FilesystemLoader(__DIR__ . '/../../templates');
        $twigView = new Twig($loader, [
            'cache'       => __DIR__ . '/../../var/cache/twig',
            'debug'       => true,
            'auto_reload' => true,
        ]);

        // Получаем внутренний Twig\Environment и добавляем глобал
        $environment = $twigView->getEnvironment();
        $environment->addGlobal('session', $_SESSION ?? []);

        return $twigView;
    },

    // === Модели и сервисы пользователя ===
    UserModel::class => function (ContainerInterface $container) {
        return new UserModel($container->get(\PDO::class));
    },

    Auth::class => function (ContainerInterface $container) {
        return new Auth($container->get(UserModel::class));
    },
];