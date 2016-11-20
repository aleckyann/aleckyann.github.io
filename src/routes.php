<?php
require "helpers.php";
// CADASTRAMENTO DE ROTAS

#render index.phtml
$app->get('/', function ($request, $response) {
  $data['csrf_inputs'] = csrf_inputs( $request->getAttribute('csrf_name'), $request->getAttribute('csrf_value') );
  return $this->view->render($response, 'index.phtml', $data);
})->add($container->get('csrf'))->add($mw);

#get all users
$app->get('/usuarios', function ($request, $response) {
  $data['usuarios'] = $this->db->select("usuarios", ["email"]);
  return $this->response->withJson($data['usuarios'], 200);
});

#get user by id
$app->get('/usuarios/[{id}]', function ($request, $response, $args) {
  $data['id'] = filter_int($args['id']);
  $data['usuario'] = $this->db->select("usuarios", 'email', ["id[=]" => $data['id']]);
  return $response->withJson($data['usuario'], 200);
});

#create user
$app->post('/usuarios', function ($request, $response) {
  $data['email'] = filter_email( $request->getParsedBody()['email'] );
  $data['senha'] = filter_string( $request->getParsedBody()['senha'] );
  $data['resultado'] = $this->db->insert("usuarios", ["email" => $data['email'], "senha" => $data['senha']]);
  return $response->withJson($data, 201);
})->add($container->get('csrf'));

#update user
$app->put('/usuarios', function ($request, $response) {
  $data['email'] = filter_email( $request->getParsedBody()['email'] );
  $data['nova_senha'] = filter_string( $request->getParsedBody()['nova_senha'] );
  $data['resultado'] = $this->db->update("usuarios", ["senha" => $data['nova_senha']], ["email[=]" => $data['email']]);
  return $response->withJson($data, 201);
})->add($container->get('csrf'));

#delete user
$app->delete('/usuarios', function ($request, $response) {
  $data['email'] = filter_email( $request->getParsedBody()['email'] );
  $data['senha'] = filter_string( $request->getParsedBody()['senha'] );
  $data['resultado'] = $this->db->delete("usuarios", [ "AND" => ["email" => $data['email'], "senha" => $data['senha']] ]);
  return $response->withJson($data, 201);
})->add($container->get('csrf'));
