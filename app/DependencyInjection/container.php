<?php
// app/DependencyInjection/container.php
use DI\ContainerBuilder;

return function () {
    $containerBuilder = new ContainerBuilder();
    $containerBuilder->addDefinitions(__DIR__ . '/definitions.php');
    return $containerBuilder->build();
};