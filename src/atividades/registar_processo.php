<?php

require_once "./src/config/database.php";

$name = trim($_POST["nome"]);
$email = trim($_POST["email"]);
$password = trim($_POST["password"]);
$confirmar = trim($_POST["confirmar"]);

$erro = "";

if(empty($name) || empty($email) || empty($password) || empty($confirmar)){
    $erro = "Todos os campos são obrigatórios";
}

if(empty($erro) && $password !== $confirmar){
    $erro = "A password não é a mesma";
}

