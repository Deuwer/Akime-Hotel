<?php

session_start();
require_once "../config/database.php";

$sql = "SELECT Pagamento.*, Reserva.res_id, Hospede.host_nome
        FROM Pagamento, Reserva, Hospede
        WHERE Pagamento.pag_res_id = Reserva.res_id
        AND Reserva.res_host_id = Hospede.host_id
        ORDER BY Pagamento.pag_data DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$pagamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamentos</title>
</head>
<body>
    <h2>Pagamentos</h2>

    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Reserva</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th>Data</th>
                    <th>Operador</th>
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