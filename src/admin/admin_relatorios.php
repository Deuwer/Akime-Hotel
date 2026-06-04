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

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
<div id="pagina">
<header class="menu">

    <div class="logo">
        <h2>Akime Hotel</h2>
    </div>

    <nav>
        <ul>
            <li><a href="admin_home.php">Página Inicial</a></li>
            <li><a href="admin_reservas.php">Reservas</a></li>
            <li><a href="admin_hospedes.php">Hóspedes</a></li>
            <li><a href="admin_quartos.php">Quartos</a></li>
            <li><a href="admin_pagamentos.php">Pagamentos</a></li>
            <li><a href="admin_relatorios.php">Relatórios</a></li>
            <li><a href="../atividades/logout.php">Logout</a></li>
        </ul>
    </nav>
</header>

<main class="conteudo">
<h2>Relatórios</h2>

<div class="caixa">
<table>
    <tr>
        <th>Indicador</th>
        <th>Valor</th>
    </tr>

    <tr>
        <td>Total de reservas</td>
        <td><?php echo $total_reservas["total_reservas"]; ?></td>
    </tr>

    <tr>
        <td>Reservas canceladas</td>
        <td><?php echo $reservas_canceladas["reservas_canceladas"]; ?></td>
    </tr>

    <tr>
        <td>Check-ins feitos</td>
        <td><?php echo $checkins["checkins"]; ?></td>
    </tr>

    <tr>
        <td>Total faturado</td>
        <td><?php echo $receita["total_receita"]; ?> €</td>
    </tr>
</table>

<br>


</div>
</main>
</div>
</body>
</html>