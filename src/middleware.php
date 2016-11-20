<?php
// CADASTRAMENTO DE MIDDLEWARES

$mw = function ($request, $response, $next) {
    $response->getBody()->write('ANTES');
    $response = $next($request, $response);
    $response->getBody()->write('DEPOIS');
    return $response;
};

# Use:
#->add($mw)
