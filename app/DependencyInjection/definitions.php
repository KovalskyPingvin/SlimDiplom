<?php
// app/DependencyInjection/definitions.php

use Psr\Container\ContainerInterface;
use Slim\Views\Twig;
use Twig\Loader\FilesystemLoader;
use App\Controllers\User\Models\UserModel;
use App\Controllers\User\Models\Auth;
use App\Controllers\Admin\Models\CompatibilityModel;

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

    // === Twig ===
    Twig::class => function (ContainerInterface $container) {
        $loader = new FilesystemLoader(__DIR__ . '/../../templates');
        $twig = new Twig($loader, [
            'cache' => __DIR__ . '/../../var/cache/twig',
            'debug' => true,
            'auto_reload' => true,
        ]);
        $twig->getEnvironment()->addGlobal('session', $_SESSION ?? []);
        return $twig;
    },

    // === Модели ===
    // НЕ НУЖНО явно регистрировать, если конструктор принимает известные зависимости
    // PHP-DI автоматически сделает autowire
];