<?php

session_start();
require_once "../config/database.php";

$sql = "SELECT * FROM Quarto ORDER BY quarto_id ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$quartos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quartos</title>
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
<h2>Quartos</h2>
    <div class="caixa">
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Número</th>
        <th>Tipo</th>
        <th>Capacidade</th>
        <th>Estado</th>
        <th>Preço</th>
    </tr>
    </thead>

    <?php foreach ($quartos as $quarto) { ?>
    <tbody>
        <tr>
            <td><?php echo $quarto["quarto_id"]; ?></td>
            <td><?php echo $quarto["quarto_numero"]; ?></td>
            <td><?php echo $quarto["quarto_tipo"]; ?></td>
            <td><?php echo $quarto["quarto_capacidade"]; ?></td>
            <td><?php echo $quarto["quarto_estado"]; ?></td>
            <td><?php echo $quarto["quarto_preco"]; ?> €</td>
        </tr>
    </tbody>
    <?php } ?>

</table>

<br>

</div>
</main>
</div>
</body>
</html>