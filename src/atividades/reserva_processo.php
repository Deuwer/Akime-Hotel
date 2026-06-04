<?php

session_start();
require_once "../config/database.php";

if (!isset($_SESSION["host_id"])) {
    header("Location: ../login.php");
    exit();
}

$host_id = $_SESSION["host_id"];
$tipo_quarto = $_POST["quarto"];
$data_inicio = $_POST["data_inicio"];
$data_fim = $_POST["data_fim"];

if (empty($tipo_quarto) || empty($data_inicio) || empty($data_fim)) {
    header("Location: ../cliente/nova_reserva.php?erro=campos");
    exit();
}

if ($data_inicio < date("Y-m-d")) {
    header("Location: ../cliente/nova_reserva.php?erro=data_passada");
    exit();
}

if ($data_inicio >= $data_fim) {
    header("Location: ../cliente/nova_reserva.php?erro=datas_invalidas");
    exit();
}

