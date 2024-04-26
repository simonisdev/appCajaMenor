<?php
require_once 'db.php'; // Asegúrate de que la ruta es correcta

try {
    $query = "SELECT * FROM usuarios";
    $result = $pdo->query($query);

    while ($row = $result->fetch()) {
        echo "Usuario: " . $row['nombre_usuario'] . "<br>";
    }
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
?>
