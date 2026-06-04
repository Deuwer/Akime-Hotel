<?php

session_start();
require_once("../config/database.php");

if (!isset($_SESSION["host_id"])) {
    header("Location: ../login.php");
    exit();
}

$res_id = $_GET["id"];
$host_id = $_SESSION["host_id"];

$sql = "SELECT *
        FROM Reserva
        WHERE res_id = ?
        AND res_host_id = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$res_id, $host_id]);

$reserva = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Reserva</title>
</head>
<body>

<h1>Editar Reserva</h1>

<form action="" method="POST">

    <input
        type="hidden"
        name="res_id"
        value="<?php echo $reserva["res_id"]; ?>">

    <label>Data início</label>

    <input
        type="date"
        name="data_inicio"
        value="<?php echo substr($reserva["res_inicio"], 0, 10); ?>"
        required>

    <br><br>

    <label>Data fim</label>

    <input
        type="date"
        name="data_fim"
        value="<?php echo substr($reserva["res_fim"], 0, 10); ?>"
        required>

    <br><br>

    <button type="submit">
        Guardar Alterações
    </button>

</form>

<br>

<a href="minhas_reservas.php">
    Voltar
</a>

</body>
</html>