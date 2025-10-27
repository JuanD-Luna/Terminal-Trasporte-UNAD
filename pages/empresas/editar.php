<?php include("../../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Empresa</title>
  <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
  <main class="container">
    <h2>Editar empresa</h2>
    <?php
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM empresas WHERE id=$id");
    $empresa = mysqli_fetch_assoc($query);
    ?>

    <form method="POST">
      <label>Nombre:</label>
      <input type="text" name="nombre" value="<?php echo $empresa['nombre']; ?>" required>

      <label>Teléfono:</label>
      <input type="text" name="telefono" value="<?php echo $empresa['telefono']; ?>" required>

      <label>Email:</label>
      <input type="email" name="email" value="<?php echo $empresa['email']; ?>" required>

      <button type="submit" name="actualizar">Actualizar</button>
    </form>

    <?php
    if (isset($_POST['actualizar'])) {
      $nombre = $_POST['nombre'];
      $telefono = $_POST['telefono'];
      $email = $_POST['email'];

      $sql = "UPDATE empresas SET nombre='$nombre', telefono='$telefono', email='$email' WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        echo "<p>✅ Empresa actualizada correctamente.</p>";
      } else {
        echo "<p>❌ Error: " . mysqli_error($conn) . "</p>";
      }
    }
    ?>
    <a href="ver.php"><button>Volver</button></a>
  </main>
</body>
</html>
