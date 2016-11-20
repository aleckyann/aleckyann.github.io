<?php

function filter_string($string){
  $result = strip_tags(filter_var($string, FILTER_SANITIZE_STRING));
  return $result;
}

function filter_int($int){
  $result = strip_tags(filter_var($int, FILTER_VALIDATE_INT));
  return $result;
}

function filter_boolean($boolean){
  $result = strip_tags(filter_var($boolean, FILTER_VALIDATE_BOOLEAN));
  return $result;
}

function filter_float($float){
  $result = strip_tags(filter_var($float, FILTER_VALIDATE_FLOAT));
  return $result;
}

function filter_email($email){
  $result = strip_tags(filter_var($email, FILTER_VALIDATE_EMAIL));
  return $result;
}

function csrf_inputs($csrf_name, $csrf_value){
  return "<input type='hidden' name='csrf_name' value='$csrf_name'><input type='hidden' name='csrf_value' value='$csrf_value'>\n";
}
