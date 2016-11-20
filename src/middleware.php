<?php
// CADASTRAMENTO DE MIDDLEWARES

# Use:
#->add($auth)

$auth = function ($request, $response, $next) {
    if($_SESSION['app']){
        $response = $next($request, $response);
        return $response;
    } else {
        return $response->withRedirect('../login', 200);    
    }
};