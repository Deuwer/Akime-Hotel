<?php

session_start();

if (!isset($_SESSION["host_id"])) {
    header("Location: ../login.php");
    exit();
}

$host_id = $_SESSION["host_id"];
$sql = "SELECT *
        FROM Reserva
        WHERE res_host_id = ?
        ORDER BY res_inicio DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute([$host_id]);

$reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Reservas</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="nova_reserva.php">Nova Reserva</a></li>
            <li><a href="minhas_reservas.php">Minhas Reservas</a></li>
            <li><a href="../atividades/logout.php">Terminar sessão</a></li>
        </ul>
    </nav>

    <h1>As minhas Reservas</h1>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Tipo de Quarto</th>
                    <th>Total a pagar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>