<?php include("../../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Vehículo</title>
  <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<main class="container">
  <h2>Agregar nuevo vehículo</h2>
  <form method="POST">
    <label>Placa:</label>
    <input type="text" name="placa" required>

    <label>Tipo:</label>
    <input type="text" name="tipo" required>

    <label>Capacidad:</label>
    <input type="number" name="capacidad" required>

    <button type="submit" name="guardar">Guardar</button>
  </form>

  <?php
  if (isset($_POST['guardar'])) {
    $placa = $_POST['placa'];
    $tipo = $_POST['tipo'];
    $capacidad = $_POST['capacidad'];

    $sql = "INSERT INTO vehiculos (placa, tipo, capacidad) VALUES ('$placa', '$tipo', '$capacidad')";
    if (mysqli_query($conn, $sql)) {
      echo "<p>✅ Vehículo agregado correctamente.</p>";
    } else {
      echo "<p>❌ Error: " . mysqli_error($conn) . "</p>";
    }
  }
  ?>
  <a href="ver.php"><button>Volver</button></a>
</main>
</body>
</html>
