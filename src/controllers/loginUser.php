<?php

#LOGIN
$app->get('/login', function ($request, $response) {
  $data['messages'] = $this->flash->getMessages();
  return $this->view->render($response, 'login.phtml', $data['messages']);  
});

#LOGIN ENTER
$app->post('/login/enter', function ($request, $response) {
  $data['email'] = filter_email( $request->getParsedBody()['email'] );
  $data['senha'] = filter_string( $request->getParsedBody()['senha'] );
  $data['senha'] = hash('sha512', $data['senha']);
  $data['resultado'] = login($this->db, $data['email'], $data['senha']);
  if($data['resultado']) {
    $_SESSION['app'] = $data['resultado'][0];
    return $response->withRedirect('../dashboard', 200);
  } else {
    $this->flash->addMessage('error', 'Login ou senha incorretos.');
    return $response->withRedirect('../login', 200);    
  }
});

#LOGIN EXIT
$app->get('/login/exit', function ($request, $response) {
  unset($_SESSION['app']);
  return $response->withRedirect('../login', 200);
});