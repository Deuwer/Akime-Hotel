<?php

session_start();
require_once "../config/database.php";

$sql = "SELECT Pagamento.*, Reserva.res_id, Hospede.host_nome, Funcionario.func_nome
        FROM Pagamento
        INNER JOIN Pagamento_Reserva ON Pagamento.pag_id = Pagamento_Reserva.pag_res_pag_id
        INNER JOIN Reserva ON Pagamento_Reserva.pag_res_res_id = Reserva.res_id
        INNER JOIN Hospede ON Reserva.res_host_id = Hospede.host_id
        INNER JOIN Funcionario ON Pagamento.pag_func_id = Funcionario.func_id
        ORDER BY Pagamento.pag_data DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$pagamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamentos</title>
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
<h2>Registar Pagamento</h2>

    <div class="caixa">
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
    </div>
</main>
    </div>


</body>
</html>