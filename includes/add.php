<?php
echo "<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <title>Inicio → Base de Datos → Registrar Usuario</title>
  <link rel='stylesheet' href='../css/style.css'>
  <link rel='icon' type='image/x-icon' href='../img/php.ico'>
</head>
<body>
  <h1>Registro de Usuarios</h1>
  <ul>";

$servername = "localhost";
$username = "root";
$password = "P@ssw0rd";
$dbname = "M04DMM";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $stmt = $conn->prepare("INSERT INTO USUARIOS (Nombre, Apellidos, Email, Telefono) VALUES (:nombre, :apellidos, :email, :telefono)");
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":apellidos", $apellidos);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":telefono", $telefono);

    $stmt->execute();
    echo "<p>✅ Usuario Registrado Correctamente!</p>";
}

catch (PDOException $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

echo "</ul><br><a href='../add.html'>Volver Atrás</a><a href='../bbdd.html'>Volver a BBDD</a><a href='../index.html'>Volver a Inicio</a>
</body>
</html>";
?>
