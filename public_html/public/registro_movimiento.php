<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario = $_POST['idUsuario'];
    $monto = $_POST['monto'];
    $motivo = $_POST['motivo'];

    $stmt = $pdo->prepare("INSERT INTO movimientos (id_usuario, monto, fecha_hora, motivo) VALUES (?, ?, NOW(), ?)");
    $stmt->execute([$idUsuario, $monto, $motivo]);

    echo "Movimiento registrado correctamente";
}
?>
