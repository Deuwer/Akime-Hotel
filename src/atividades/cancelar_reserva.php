<?php

session_start();
require_once "../config/database.php";

$host_id = $_SESSION["host_id"];
$res_id = $_GET["id"];

$sql = "UPDATE Reserva SET res_estado = ? WHERE res_id = ? AND res_host_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(["Cancelada",$res_id,$host_id]);

header("Location: ../cliente/minhas_reservas.php");
exit();

?>