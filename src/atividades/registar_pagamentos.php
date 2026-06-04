<?php

session_start();
require_once "../config/database.php";

$reserva_id = $_POST["reserva_id"];
$montante = $_POST["montante"];
$tipo = $_POST["tipo"];
$data = date("Y-m-d H:i:s");


$sql = "INSERT INTO Pagamento (pag_res_id, pag_montante, pag_tipo, pag_data) VALUES (?, ?, ?, ?)";

$stmt = $pdo->prepare($sql);
$stmt->execute([$reserva_id,$montante,$tipo,$data]);

header("Location: ../admin/admin_pagamentos.php");
exit();

?>