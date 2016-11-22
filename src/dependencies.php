<?php
// DEPÊNDENCIAS DA APLICAÇÃO

$container = $app->getContainer();

// CADASTRANDO TEMPLATE ENGINE: php-view
$container['view'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// MEDOO
$container['db'] = function ($c) {
    $db = $c->get('settings')['db'];
    return new medoo($db);
};

// CSRF
$container['csrf'] = function ($c) {
    return new \Slim\Csrf\Guard;
};

// FLASH MESSAGES
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};
