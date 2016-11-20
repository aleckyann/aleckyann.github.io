<?php

function getUsuarios($thisDbOfController){
     return $thisDbOfController->select("usuarios", ['email']);
};

function getUsuario($thisDbOfController, $id){
    return $thisDbOfController->select("usuarios", 'email', ["id[=]" => $id]);
};

function createUsuario($thisDbOfController, $email, $senha){
    return $thisDbOfController->insert("usuarios", ["email" => $email, "senha" => $senha]);

};

function updateUsuario($thisDbOfController, $nova_senha, $email){
    return $thisDbOfController->update("usuarios", ["senha" => $nova_senha], ["email[=]" => $email]);
};

function deleteUsuario($thisDbOfController, $email, $senha){
    return $thisDbOfController->delete("usuarios", [ "AND" => ["email" => $email, "senha" => $senha] ]);
};