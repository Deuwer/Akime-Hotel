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
    <title>Relatórios</title>
</head>
<body>

<h2>Relatórios</h2>

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

<a href="admin_home.php">Voltar</a>

</body>
</html>