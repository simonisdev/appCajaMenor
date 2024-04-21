-- Creación de la tabla 'usuarios'
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(255) NOT NULL,
    contraseña VARCHAR(255) NOT NULL
);

-- Creación de la tabla 'movimientos'
CREATE TABLE movimientos (
    id_movimiento INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    monto DECIMAL(10, 2) NOT NULL,
    fecha_hora DATETIME NOT NULL,
    motivo TEXT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);
