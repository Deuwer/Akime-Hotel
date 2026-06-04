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
    <title>Quartos</title>
</head>
<body>

<h2>Quartos</h2>

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

<a href="admin_home.php">Voltar</a>

</body>
</html>