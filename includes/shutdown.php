<?php
echo "<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <title>Inicio → Terminal → Programar Apagado</title>
  <link rel='stylesheet' href='../css/style.css'>
  <link rel='icon' type='image/x-icon' href='../img/php.ico'>
</head>
<body>
  <h1>Programar Apagado de la Máquina</h1>
  <ul>";

if (isset($_POST['hora'])) {
    $hora = $_POST['hora'];
    $command = "sudo /sbin/shutdown -h $hora";
    exec($command);
    echo "<p>Apagado programado a las $hora</p>";
}

else {
    echo "<p>Hora no válida</p>";
}

echo "</ul><br><a href='../terminal.html'>Volver Atrás</a><a href='../index.html'>Volver a Inicio</a>
</body>
</html>";
?>
