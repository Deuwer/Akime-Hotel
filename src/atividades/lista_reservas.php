<?php

session_start();
require_once "../config/database.php";

if (!isset($_SESSION["host_id"])) {
    echo json_encode([]);
    exit();
}

$host_id = $_SESSION["host_id"];

$sql = "SELECT * FROM Reserva WHERE res_host_id = ? ORDER BY res_inicio DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute([$host_id]);

$reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type: application/json");
echo json_encode($reservas);

?>