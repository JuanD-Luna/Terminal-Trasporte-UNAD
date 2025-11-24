<?php include("../../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Eliminar Vehículo</title>
  <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<main class="container">
  <h2>Eliminar vehículo</h2>
  <?php
  $id = $_GET['id'];

  if (isset($_POST['eliminar'])) {
    $sql = "DELETE FROM vehiculos WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
      echo "<p>✅ Vehículo eliminado correctamente.</p>";
    } else {
      echo "<p>❌ Error al eliminar: " . mysqli_error($conn) . "</p>";
    }
  } else {
    echo "
      <p>¿Seguro que deseas eliminar este vehículo?</p>
      <form method='POST'>
        <button type='submit' name='eliminar'>Sí, eliminar</button>
        <a href='ver.php'><button type='button'>Cancelar</button></a>
      </form>
    ";
  }
  ?>
</main>
</body>
</html>
