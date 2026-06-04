<?php

session_start();
require_once "../config/database.php";

$host_id = $_GET["id"];

$sql = "UPDATE Hospede SET host_estado = ? WHERE host_id = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute(["Inativo", $host_id]);

header("Location: ../admin/admin_hospedes.php");
exit();

?>