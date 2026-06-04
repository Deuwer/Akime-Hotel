<?php

session_start();
require_once "../config/database.php";

$sql = "SELECT COUNT(*) AS total_reservas FROM Reserva";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$total_reservas = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT COUNT(*) AS reservas_canceladas FROM Reserva WHERE res_estado = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute(["Cancelada"]);
$reservas_canceladas = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT COUNT(*) AS checkins FROM Reserva WHERE res_check_in = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute(["Sim"]);
$checkins = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT SUM(pag_montante) AS total_receita FROM Pagamento";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$receita = $stmt->fetch(PDO::FETCH_ASSOC);

?>