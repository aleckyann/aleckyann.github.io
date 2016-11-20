<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';
// Instaciando aplicação
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Dependências
require __DIR__ . '/../src/dependencies.php';

// Middlewares
require __DIR__ . '/../src/middleware.php';

// Rotas
require __DIR__ . '/../src/routes.php';

// Rodar aplicação
$app->run();
