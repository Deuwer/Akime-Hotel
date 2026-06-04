<?php

session_start();
require_once "../config/database.php";

$email = trim($_POST["email"]);
$password = trim($_POST["password"]);

if (empty($email) || empty($password)) {
    header("Location: ../login.php?erro=campos");
    exit();
}

$sql = "SELECT * FROM Hospede WHERE host_email = ? LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);

$host = $stmt->fetch(PDO::FETCH_ASSOC);

if ($host && password_verify($password, $host["host_password"])) {

    $_SESSION["host_id"] = $host["host_id"];
    $_SESSION["host_nome"] = $host["host_nome"];
    $_SESSION["host_email"] = $host["host_email"];

    header("Location: ../cliente/home.php");
    exit();

} 

$sql = "SELECT * FROM Funcionario WHERE func_email = ? LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);

$funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($funcionario) {

    if ($password == $funcionario["fun_password"]) {

        $_SESSION["func_id"] = $funcionario["func_id"];
        $_SESSION["func_nome"] = $funcionario["func_nome"];
        $_SESSION["func_email"] = $funcionario["func_email"];

        header("Location: ../admin/admin_home.php");
        exit();
    }
}

else {
    header("Location: ../login.php?erro=login");
    exit();
}
