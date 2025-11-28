<?php
return function ($app) {
    $app->add(function ($request, $handler) {
        session_start();
        return $handler->handle($request);
    });
};