<?php

session_start();
require_once "../config/database.php";

$sql = "SELECT Reserva.*, Hospede.host_nome, Quarto.quarto_tipo
        FROM Reserva, Hospede, Quarto
        WHERE Reserva.res_host_id = Hospede.host_id
        AND Reserva.res_quarto_id = Quarto.quarto_id
        ORDER BY Reserva.res_inicio DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

