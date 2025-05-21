<?php
$estat = exec("systemctl is-active mariadb");
echo "<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <title>Inicio → Terminal → Estado MariaDB</title>
  <link rel='stylesheet' href='../css/style.css'>
  <link rel='icon' type='image/x-icon' href='../img/php.ico'>
</head>
<body>
  <h1>Estado del Servicio MariaDB</h1>
  <ul>";

if ($estat == "active") {
    echo "<p class='estat ok'>MariaDB está <strong>Activo</strong>.</p>";
}

else {
    echo "<p class='estat error'>MariaDB <strong>no está Activo</strong>. Estado: $estat</p>";
}

echo "</ul><br><a href='../terminal.html'>Volver Atrás</a><a href='../index.html'>Volver a Inicio</a>
</body>
</html>";
?>
