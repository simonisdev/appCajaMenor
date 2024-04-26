<?php
session_start();  // Inicia sesión de PHP
// require_once 'db.php';  
// Asegúrate de ajustar la ruta
require_once '/config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';  // En un proyecto real, deberías hashear y verificar contraseñas hasheadas

    if (!empty($username) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE nombre_usuario = ? AND contraseña = ?");
        $stmt->execute([$username, $password]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['usuario_id'] = $user['id_usuario'];  // Guarda ID del usuario en la sesión
            echo "Login exitoso";
            // Redirigir a página principal o de perfil
        } else {
            echo "Usuario o contraseña incorrectos";
        }
    } else {
        echo "Debes llenar ambos campos";
    }
}
?>
