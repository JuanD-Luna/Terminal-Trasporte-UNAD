<?php include("../../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Empresa</title>
  <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
  <main class="container">
    <h2>Agregar nueva empresa</h2>
    <form method="POST">
      <label>Nombre:</label>
      <input type="text" name="nombre" required>

      <label>Teléfono:</label>
      <input type="text" name="telefono" required>

      <label>Email:</label>
      <input type="email" name="email" required>

      <button type="submit" name="guardar">Guardar</button>
    </form>

    <?php
    if (isset($_POST['guardar'])) {
      $nombre = $_POST['nombre'];
      $telefono = $_POST['telefono'];
      $email = $_POST['email'];

      $sql = "INSERT INTO empresas (nombre, telefono, email) VALUES ('$nombre', '$telefono', '$email')";
      if (mysqli_query($conn, $sql)) {
        echo "<p>✅ Empresa agregada correctamente.</p>";
      } else {
        echo "<p>❌ Error: " . mysqli_error($conn) . "</p>";
      }
    }
    ?>
    <a href="ver.php"><button>Volver</button></a>
  </main>
</body>
</html>
