<?php

#DASHBOARD
$app->get('/dashboard', function ($request, $response) {
  return $this->view->render($response, 'dashboard.phtml');
})->add($auth);