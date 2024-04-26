<?php
require_once 'db.php';

$idUsuario = $_GET['idUsuario'];  // Esto debería venir de una sesión segura

$stmt = $pdo->prepare("SELECT SUM(monto) as saldo FROM movimientos WHERE id_usuario = ?");
$stmt->execute([$idUsuario]);
$result = $stmt->fetch();

echo "Saldo actual: " . ($result['saldo'] ?? '0');
?>
