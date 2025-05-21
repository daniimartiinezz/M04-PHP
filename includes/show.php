<?php
echo "<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <title>Inicio → Base de Datos → Mostrar Base de Datos</title>
  <link rel='stylesheet' href='../css/style.css'>
  <link rel='icon' type='image/x-icon' href='../img/php.ico'>
</head>
<body>
  <h1>Listado de la Base de Datos</h1>
  <ul class='search_ul'>";

$servername = "localhost";
$username = "root";
$password = "P@ssw0rd";
$dbname = "M04DMM";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SELECT * FROM USUARIOS");

    if ($stmt->rowCount() > 0) {
        echo "<table>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Email</th>
                  <th>Teléfono</th>
                </tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['ID']}</td>
                    <td>{$row['Nombre']}</td>
                    <td>{$row['Apellidos']}</td>
                    <td>{$row['Email']}</td>
                    <td>{$row['Telefono']}</td>
                  </tr>";
        }
        echo "</table>";
    }

    else {
        echo "<p>No hay usuarios registrados en la base de datos.</p>";
    }

}

catch (PDOException $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

echo "</ul><br><a href='../bbdd.html'>Volver Atrás</a><a href='../index.html'>Volver a Inicio</a>
</body>
</html>";
?>
