<?php

session_start();
require_once "../config/database.php";

$sql = "SELECT * FROM Hospede ORDER BY host_nome ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$hospedes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóspedes</title>
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

<h2>Hóspedes</h2>
<main class="conteudo">
    <div class="caixa">
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Documento</th>
        <th>NIF</th>
        <th>Estado</th>
        <th>Inativar</th>
    </tr>

    <?php foreach ($hospedes as $hospede) { ?>

        <tr>
            <td><?php echo $hospede["host_id"]; ?></td>
            <td><?php echo $hospede["host_nome"]; ?></td>
            <td><?php echo $hospede["host_email"]; ?></td>
            <td><?php echo $hospede["host_documento"]; ?></td>
            <td><?php echo $hospede["host_nif"]; ?></td>
            <td><?php echo $hospede["host_estado"]; ?></td>
            <td>
               <a href="../atividades/inativar_hospede.php?id=<?php echo $hospede["host_id"]; ?>">
                 Inativar
               </a>
            </td>
        </tr>

    <?php } ?>

</table>

<br>

<a href="admin_home.php">Voltar</a>
    </div>
</main>
</div>
</body>
</html>