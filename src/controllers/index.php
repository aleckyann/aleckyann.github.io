<?php
require __DIR__. "/../helpers/input.php";
require __DIR__. "/../models/usuarios.php";

// CADASTRAMENTO DE ROTAS

#render index.phtml
$app->get('/', function ($request, $response) {
  return $this->view->render($response, 'index.phtml');
})->add($mw);

#get all users
$app->get('/usuarios', function ($request, $response) {
  return $this->response->withJson( getUsuarios($this->db) );
});

#get user by id
$app->get('/usuarios/[{id}]', function ($request, $response, $args) {
  $data['id'] = filter_int($args['id']);
  return $response->withJson(getUsuario($this->db, $data['id']));
});

#create user
$app->post('/usuarios', function ($request, $response) {
  $data['email'] = filter_email( $request->getParsedBody()['email'] );
  $data['senha'] = filter_string( $request->getParsedBody()['senha'] );
  return createUsuario($this->db, $data['email'], $data['senha']);
});

#update user
$app->put('/usuarios', function ($request, $response) {
  $data['email'] = filter_email( $request->getParsedBody()['email'] );
  $data['nova_senha'] = filter_string( $request->getParsedBody()['nova_senha'] );
  return updateUsuario($this->db, $data['nova_senha'], $data['email']);
});

#delete user
$app->delete('/usuarios', function ($request, $response) {
  $data['email'] = filter_email( $request->getParsedBody()['email'] );
  $data['senha'] = filter_string( $request->getParsedBody()['senha'] );
  return deleteUsuario($this->db, $data['email'], $data['senha']);
});
