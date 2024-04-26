<?php
require_once 'db.php';

$idUsuario = $_GET['idUsuario'];  // Esto debería venir de una sesión segura

$stmt = $pdo->prepare("SELECT monto, fecha_hora, motivo FROM movimientos WHERE id_usuario = ?");
$stmt->execute([$idUsuario]);
$movimientos = $stmt->fetchAll();

foreach ($movimientos as $movimiento) {
    echo "Monto: " . $movimiento['monto'] . ", Fecha: " . $movimiento['fecha_hora'] . ", Motivo: " . $movimiento['motivo'] . "<br>";
}
?>
