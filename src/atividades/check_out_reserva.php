<?php

session_start();
require_once "../config/database.php";

$res_id = $_GET["id"];

$sql = "UPDATE Reserva SET res_check_out = ? WHERE res_id = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute(["Sim", $res_id]);

header("Location: ../admin/admin_reservas.php");
exit();