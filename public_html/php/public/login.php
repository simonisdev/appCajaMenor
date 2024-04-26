<?php
session_start();  // Inicia una nueva sesión o reanuda la existente

require_once 'db.php';  // Incluye el archivo de conexión a la base de datos

// Comprueba si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';  // Recoge el nombre de usuario del formulario
    $password = $_POST['password'] ?? '';  // Recoge la contraseña del formulario

    // Validación básica de entrada
    if (empty($username) || empty($password)) {
        echo "Todos los campos son obligatorios.";
    } else {
        // Prepara la consulta SQL para evitar inyecciones SQL
        $stmt = $pdo->prepare("SELECT id_usuario, contraseña FROM usuarios WHERE nombre_usuario = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        // Comprueba si el usuario existe y si la contraseña es correcta
        if ($user && $password === $user['contraseña']) {  // Aquí se debería usar password_verify() si las contraseñas están hasheadas
            // Establece las variables de sesión
            $_SESSION['usuario_id'] = $user['id_usuario'];
            $_SESSION['usuario_nombre'] = $username;

            // Redirige al usuario a una página de inicio/dashboard
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <h2>Login</h2>
    <form action="../public/login.php" method="post">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>
