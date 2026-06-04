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
            <li><a href="home.php">Home</a></li>
            <li><a href="nova_reserva.php">Nova Reserva</a></li>
            <li><a href="minhas_reservas.php">Minhas Reservas</a></li>
            <li><a href="../atividades/logout.php">Terminar sessão</a></li>
        </ul>
    </nav>
    </header>

    <main class="conteudo">
        <div class="caixa">
            <h3>Nova Reserva</h3>
        </div>
</main>

    <main class="conteudo">
        <div class="caixa">
            <h3>Minhas Reservas</h3>
        </div>
</main>
    </div>
</body>
</html>