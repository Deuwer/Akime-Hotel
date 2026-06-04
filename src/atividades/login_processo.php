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

if ($host && password_verify($host, $host["host_password"])) {

    $_SESSION["host_id"] = $host["host_id"];
    $_SESSION["host_nome"] = $host["host_nome"];
    $_SESSION["host_email"] = $host["host_email"];

    header("Location: ../cliente/home.php");
    exit();

} else {
    header("Location: ../login.php?erro=login");
    exit();
}
