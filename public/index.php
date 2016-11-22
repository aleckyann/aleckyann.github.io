<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';
$settings = require __DIR__ . '/../src/settings.php';

// Instaciando aplicação
$app = new \Slim\App($settings);


// Dependências
require __DIR__ . '/../src/dependencies.php';


// Middlewares
require __DIR__ . '/../src/middlewares/auth.php';

// HELPERS
require __DIR__. "/../src/helpers/input.php";


// MODELS
require __DIR__. "/../src/models/usuarios.php";


// CONTROLLERS
require __DIR__ . '/../src/controllers/loginUser.php';
require __DIR__ . '/../src/controllers/crudUser.php';
require __DIR__ . '/../src/controllers/dashboard.php';
require __DIR__ . '/../src/controllers/index.php';


// Rodar aplicação
$app->run();
