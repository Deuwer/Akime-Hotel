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

    <h2>As minhas Reservas</h2>
    <main class="conteudo">
    <div class="caixa">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data Início</th>
                    <th>Data Fim</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="tabela_reservas">
            </tbody>
        </table>
    </div>
    </main>
    </div>
</body>
</html>