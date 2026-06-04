<?php

session_start();
require_once "../config/database.php";

$sql = "SELECT *
        FROM Hospede
        ORDER BY host_nome ASC";

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
</head>
<body>

<h2>Hóspedes</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Documento</th>
        <th>NIF</th>
        <th>Estado</th>
    </tr>

    <?php foreach ($hospedes as $hospede) { ?>

        <tr>
            <td><?php echo $hospede["host_id"]; ?></td>
            <td><?php echo $hospede["host_nome"]; ?></td>
            <td><?php echo $hospede["host_email"]; ?></td>
            <td><?php echo $hospede["host_documento"]; ?></td>
            <td><?php echo $hospede["host_nif"]; ?></td>
            <td><?php echo $hospede["host_estado"]; ?></td>
        </tr>

    <?php } ?>

</table>

<br>

<a href="admin_home.php">Voltar</a>

</body>
</html>