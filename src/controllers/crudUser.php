<?php

#GET ALL USERS
$app->get('/usuarios', function ($request, $response) {
  $data['usuarios'] = getUsuarios($this->db);
  return $this->view->render($response, 'usuarios.phtml', $data);
})->add($auth);

#GET USER BY ID
$app->get('/usuarios/[{id}]', function ($request, $response, $args) {
  $data['id'] = filter_int($args['id']);
  return $response->withJson(getUsuario($this->db, $data['id']));
})->add($auth);

#CREATE USER
$app->post('/usuarios', function ($request, $response) {
  $data['email'] = filter_email( $request->getParsedBody()['email'] );
  $data['senha'] = filter_string( $request->getParsedBody()['senha'] );
  $data['senha'] = hash('sha512', $data['senha']);
  return createUsuario($this->db, $data['email'], $data['senha']);
})->add($auth);

#UPDATE USER
$app->put('/usuarios', function ($request, $response) {
  $data['email'] = filter_email( $request->getParsedBody()['email'] );
  $data['nova_senha'] = filter_string( $request->getParsedBody()['nova_senha'] );
  $data['nova_senha'] = hash('sha512', $data['senha']);
  return updateUsuario($this->db, $data['nova_senha'], $data['email']);
})->add($auth);

#DELETE USER
$app->get('/usuarios/excluir/{id}', function ($request, $response, $args) {
  $data['id'] = filter_string( $args['id'] );
  deleteUsuario($this->db, $data['id']);
  return $response->withRedirect('../../usuarios', 200);    
})->add($auth);