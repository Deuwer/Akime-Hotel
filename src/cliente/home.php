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
    <title>Home Cliente</title>
</head>
<body>
    <div>
        <h1>Akime Hotel</h1>
    </div>

    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="nova_reserva.php">Nova Reserva</a></li>
            <li><a href="minhas_reservas.php">Minhas Reservas</a></li>
            <li><a href="../atividades/logout.php">Terminar sessão</a></li>
        </ul>
    </nav>

    <div>
        <div>
            <h3>Nova Reserva</h3>
        </div>
    </div>

    <div>
        <div>
            <h3>Minhas Reservas</h3>
        </div>
    </div>
</body>
</html>