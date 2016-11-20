<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // CONFIGURAÇÕES DO TEMPLATE ENGINE
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],
        // CONNFIGURAÇÕES DO BANCO DE DADOS
        "db" => [
          'database_type' => 'mysql',
          'database_name' => 'slim-medoo-example',
          'server' => '127.0.0.1',
          'username' => 'root',
          'password' => '',
          'charset' => 'utf8',
          'port' => 3306,
          'option' => [PDO::ATTR_CASE => PDO::CASE_NATURAL]
        ],
      ],
    ];
