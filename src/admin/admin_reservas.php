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

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
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
<h2>Reservas</h2>

    <div class="caixa">
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Tipo</th>
            <th>Data início</th>
            <th>Data fim</th>
            <th>Estado</th>
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($reservas as $reserva) { ?>

            <tr>
                <td><?php echo $reserva["res_id"]; ?></td>
                <td><?php echo $reserva["host_nome"]; ?></td>
                <td><?php echo $reserva["quarto_tipo"]; ?></td>
                <td><?php echo $reserva["res_inicio"]; ?></td>
                <td><?php echo $reserva["res_fim"]; ?></td>
                <td><?php echo $reserva["res_estado"]; ?></td>
                <td><?php echo $reserva["res_check_in"]; ?></td>
                <td><?php echo $reserva["res_check_out"]; ?></td>
                <td>
                    <a href="../atividades/check_in_reserva.php?id=<?php echo $reserva["res_id"]; ?>">
                        Check-in
                    </a>

                    <a href="../atividades/check_out_reserva.php?id=<?php echo $reserva["res_id"]; ?>">
                        Check-out
                    </a>
                </td>
            </tr>

        <?php } ?>
    </tbody>
</table>

<br>
</div>
</main>
</div>
</body>
</html>