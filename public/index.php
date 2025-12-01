<?php
// public/index.php
require __DIR__ . '/../vendor/autoload.php';

// УБЕРИ или СДЕЛАЙ FALSE:
define('DEBUG', false); // ← Важно!

$app = require __DIR__ . '/../bootstrap.php';
$app->run();