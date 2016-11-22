<?php

function login($thisDbOfController, $email, $senha){
    //$senha = sha1($senha);
    return $thisDbOfController->select("usuarios", ["id", "email", "senha", "created"], ["AND" => ["email" => $email, "senha" => $senha] ]);
};

function getUsuarios($thisDbOfController){
     return $thisDbOfController->select("usuarios", ['id', 'email']);
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

function deleteUsuario($thisDbOfController, $id){
    return $thisDbOfController->delete("usuarios", ["id" => $id]);
};

