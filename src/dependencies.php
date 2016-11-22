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


// PAGE FOR ERROR
//$container['notFoundHandler'] = function ($c) {
//    return function ($request, $response) use ($c) {
//        return $c['response']
//            ->withStatus(404)
//            ->withHeader('Content-Type', 'text/html')
//            ->write('A página que você tentou acessar não existe. <a href=".">Voltar para página inicial</a>');
//    };
//};
