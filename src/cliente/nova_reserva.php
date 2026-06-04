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
    <title>Nova Reserva</title>
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
    <h2>Nova Reserva</h2>

    
        <div class="caixa">
    <form action="../atividades/reserva_processo.php" method="POST" id="reserva_form">
     <label for="quarto">Tipo de Quarto</label>
     <select name="quarto" id="quarto" required>
        <option value="Único">Único</option>
        <option value="Duplo">Duplo</option>
        <option value="Casal">Casal</option>
        <option value="Família">Família</option>
     </select>

     <label for="data_inicio">Data de início</label>
     <input type="date" id="data_inicio" name="data_inicio" required>

     <label for="data_fim">Data do fim</label>
     <input type="date" id="data_fim" name="data_fim" required>

     <p> Preço Total: <span id="preco_total"></span></p>
     <button type="submit">Concluir a reserva</button>

    </form>
        </div>
    </main>
    </div>
</body>
</html>