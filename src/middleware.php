<?php
// CADASTRAMENTO DE MIDDLEWARES

$mw = function ($request, $response, $next) {
    $response->getBody()->write('MIDDLEWARE ANTES');
    $response = $next($request, $response);
    $response->getBody()->write('MIDDLEWARE DEPOIS');
    return $response;
};

# Use:
#->add($mw)
