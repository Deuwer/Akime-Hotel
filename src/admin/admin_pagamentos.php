<?php

session_start();
require_once "../config/database.php";

$sql = "SELECT Pagamento.*, Reserva.res_id, Hospede.host_nome
        FROM Pagamento, Reserva, Hospede 
        WHERE Pagamento.pag_res_id = Reserva.res_id 
        AND Reserva.res_host_id = Hospede.host_id 
        ORDER BY Pagamento.pag_data DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$pagamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Pagamentos</title>
</head>
<body>

<h2>Registar Pagamento</h2>

<form action="../atividades/registar_pagamentos.php" method="POST">

    <label>ID da Reserva</label>
    <input type="number" name="reserva_id" required>

    <br><br>

    <label>Montante</label>
    <input type="number" name="montante" step="0.01" required>

    <br><br>

    <label>Tipo</label>
    <select name="tipo" required>
        <option value="Parcial">Parcial</option>
        <option value="Total">Total</option>
    </select>

    <br><br>

    <button type="submit">Registar</button>

</form>

<hr>

<h2>Pagamentos Registados</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Reserva</th>
        <th>Cliente</th>
        <th>Montante</th>
        <th>Tipo</th>
        <th>Data</th>
    </tr>

    <?php foreach ($pagamentos as $pagamento) { ?>

        <tr>
            <td><?php echo $pagamento["pag_id"]; ?></td>
            <td><?php echo $pagamento["res_id"]; ?></td>
            <td><?php echo $pagamento["host_nome"]; ?></td>
            <td><?php echo $pagamento["pag_montante"]; ?> €</td>
            <td><?php echo $pagamento["pag_tipo"]; ?></td>
            <td><?php echo $pagamento["pag_data"]; ?></td>
        </tr>

    <?php } ?>

</table>

<br>

<a href="admin_home.php">Voltar</a>

</body>
</html>