<?php
echo "<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <title>Inicio → Base de Datos → Eliminar Usuario</title>
  <link rel='stylesheet' href='../css/style.css'>
  <link rel='icon' type='image/x-icon' href='../img/php.ico'>
</head>
<body>
  <h1>Eliminación de Usuarios</h1>
  <ul>";

$servername = "localhost";
$username = "root";
$password = "P@ssw0rd";
$dbname = "M04DMM";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST['id'];

    $check = $conn->prepare("SELECT COUNT(*) FROM USUARIOS WHERE id = :id");
    $check->bindParam(":id", $id);
    $check->execute();
    $exists = $check->fetchColumn();

    if ($exists) {
        $stmt = $conn->prepare("DELETE FROM USUARIOS WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        echo "<p>✅ Usuario con ID $id Eliminado Correctamente!</p>";
    }

    else {
        echo "<p>⚠️ No existe el usuario con ID $id";
    }
}

catch (PDOException $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

echo "</ul><br><a href='../delete.html'>Volver Atrás</a><a href='../bbdd.html'>Volver a BBDD</a><a href='../index.html'>Volver a Inicio</a>
</body>
</html>";
?>
