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

$sql = "SELECT quarto_id 
        FROM Quarto 
        WHERE quarto_tipo = ?
        LIMIT 1";

$stmt = $pdo->prepare($sql);
$stmt->execute([$tipo_quarto]);

$quarto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$quarto) {
    header("Location: ../cliente/nova_reserva.php?erro=quarto");
    exit();
}

$sql = "INSERT INTO Reserva 
        (res_host_id, res_quarto_id, res_inicio, res_fim)
        VALUES (?, ?, ?, ?)";

$stmt = $pdo->prepare($sql);
$stmt->execute([$host_id,$quarto["quarto_id"],$data_inicio,$data_fim]);

header("Location: ../cliente/minhas_reservas.php?sucesso=reserva_criada");
exit();