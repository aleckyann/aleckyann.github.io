<?php

#INDEX
$app->get('/', function($request, $response){
  return $this->view->render($response, 'index.phtml');
});

