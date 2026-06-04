<?php

session_start();

if (!isset($_SESSION["host_id"])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Reservas</title>
    <script src="../js/minhas_reservas.js"></script>
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
            <tbody id="tabela_reservas">
            </tbody>
        </table>
    </div>
</body>
</html>