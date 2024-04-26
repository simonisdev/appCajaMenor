<?php
require 'db.php'; // Asegúrate de incluir el archivo de conexión

function agregarMovimiento($idUsuario, $monto, $motivo) {
    global $pdo;
    $query = "INSERT INTO movimientos (id_usuario, monto, fecha_hora, motivo) VALUES (?, ?, NOW(), ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$idUsuario, $monto, $motivo]);
}

// Ejemplo de uso
agregarMovimiento(1, 100.00, 'Depósito inicial');
?>
