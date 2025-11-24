<?php include("../../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Vehículo</title>
  <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<main class="container">
  <h2>Editar vehículo</h2>
  <?php
  $id = $_GET['id'];
  $query = mysqli_query($conn, "SELECT * FROM vehiculos WHERE id=$id");
  $vehiculo = mysqli_fetch_assoc($query);
  ?>

  <form method="POST">
    <label>Placa:</label>
    <input type="text" name="placa" value="<?php echo $vehiculo['placa']; ?>" required>

    <label>Tipo:</label>
    <input type="text" name="tipo" value="<?php echo $vehiculo['tipo']; ?>" required>

    <label>Capacidad:</label>
    <input type="number" name="capacidad" value="<?php echo $vehiculo['capacidad']; ?>" required>

    <button type="submit" name="actualizar">Actualizar</button>
  </form>

  <?php
  if (isset($_POST['actualizar'])) {
    $placa = $_POST['placa'];
    $tipo = $_POST['tipo'];
    $capacidad = $_POST['capacidad'];

    $sql = "UPDATE vehiculos SET placa='$placa', tipo='$tipo', capacidad='$capacidad' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
      echo "<p>✅ Vehículo actualizado correctamente.</p>";
    } else {
      echo "<p>❌ Error: " . mysqli_error($conn) . "</p>";
    }
  }
  ?>
  <a href="ver.php"><button>Volver</button></a>
</main>
</body>
</html>
<?php include("../../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Vehículo</title>
  <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<main class="container">
  <h2>Editar vehículo</h2>
  <?php
  $id = $_GET['id'];
  $query = mysqli_query($conn, "SELECT * FROM vehiculos WHERE id=$id");
  $vehiculo = mysqli_fetch_assoc($query);
  ?>

  <form method="POST">
    <label>Placa:</label>
    <input type="text" name="placa" value="<?php echo $vehiculo['placa']; ?>" required>

    <label>Tipo:</label>
    <input type="text" name="tipo" value="<?php echo $vehiculo['tipo']; ?>" required>

    <label>Capacidad:</label>
    <input type="number" name="capacidad" value="<?php echo $vehiculo['capacidad']; ?>" required>

    <button type="submit" name="actualizar">Actualizar</button>
  </form>

  <?php
  if (isset($_POST['actualizar'])) {
    $placa = $_POST['placa'];
    $tipo = $_POST['tipo'];
    $capacidad = $_POST['capacidad'];

    $sql = "UPDATE vehiculos SET placa='$placa', tipo='$tipo', capacidad='$capacidad' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
      echo "<p>✅ Vehículo actualizado correctamente.</p>";
    } else {
      echo "<p>❌ Error: " . mysqli_error($conn) . "</p>";
    }
  }
  ?>
  <a href="ver.php"><button>Volver</button></a>
</main>
</body>
</html>
