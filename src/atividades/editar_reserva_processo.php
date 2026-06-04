<?php

session_start();
require_once "../config/database.php";

$host_id = $_SESSION["host_id"];
$res_id = $_POST["res_id"];
$data_inicio = $_POST["data_inicio"];
$data_fim = $_POST["data_fim"];

if ($data_inicio < date("Y-m-d")) {
    header("Location: ../cliente/editar_reserva.php?id=" . $res_id);
    exit();
}

if ($data_inicio >= $data_fim) {
    header("Location: ../cliente/editar_reserva.php?id=" . $res_id);
    exit();
}

$sql = "UPDATE Reserva SET res_inicio = ?, res_fim = ? WHERE res_id = ? AND res_host_id = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$data_inicio,$data_fim,$res_id,$host_id]);

header("Location: ../cliente/minhas_reservas.php");
exit();

?>