<?php
// bootstrap.php
use DI\Container;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

// ✅ Вызываем функцию, чтобы получить готовый контейнер
$container = (require __DIR__ . '/app/DependencyInjection/container.php')();

AppFactory::setContainer($container);
$app = AppFactory::create();

(require __DIR__ . '/config/routes.php')($app);
(require __DIR__ . '/config/middleware.php')($app);

return $app;