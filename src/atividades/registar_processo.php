<?php

require_once "./src/config/database.php";

$name = trim($_POST["nome"]);
$email = trim($_POST["email"]);
$password = trim($_POST["password"]);
$confirmar = trim($_POST["confirmar"]);
$nif = trim($_POST["nif"]);
$documento = trim($_POST["doc"]);

$erro = "";

if(empty($name) || empty($email) || empty($password) || empty($confirmar)){
    $erro = "Todos os campos são obrigatórios";
}

if(empty($erro) && $password !== $confirmar){
    $erro = "A password não é a mesma";
}

if(empty($erro)){
    $sql = "SELECT host_id FROM Hospede WHERE host_email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    $host = $stmt->fetch();
    if($host) {
        $erro = "Este email já foi registado.";
    }
}

if(!empty($erro)) {
    echo $erro;
    exit;
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);
$estado = "Ativo";

$sql = "INSERT INTO Hospede (host_nome,host_doc, host_NIF, host_estado, host_email, host_password)
VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $pdo->prepare($sql);
$stmt->execute([$name, $documento, $nif, $estado, $email, $password_hash]);

header("Location:../login.php");
exit;



