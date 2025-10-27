<?php include("../../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Vehículos | Ver</title>
  <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<nav class="navegacion">
  <h1>Terminal de Transporte</h1>
  <ul>
    <li><a href="../../index.php"><button>Inicio</button></a></li>
    <li><a href="../rutas.php"><button>Rutas</button></a></li>
    <li><a href="../empresas.php"><button>Empresas</button></a></li>
    <li><a href="../vehiculos/vehiculos.php"><button>Vehículos</button></a></li>
  </ul>
</nav>

<main class="container">
  <h2>Lista de Vehículos</h2>
  <a href="agregar.php"><button>Agregar Vehículo</button></a>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>ID</th>
      <th>Placa</th>
      <th>Tipo</th>
      <th>Capacidad</th>
      <th>Acciones</th>
    </tr>

    <?php
    $sql = "SELECT * FROM vehiculos";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['placa']}</td>
                <td>{$row['tipo']}</td>
                <td>{$row['capacidad']}</td>
                <td>
                  <a href='editar.php?id={$row['id']}'><button>Editar</button></a>
                  <a href='eliminar.php?id={$row['id']}'><button>Eliminar</button></a>
                </td>
              </tr>";
      }
    } else {
      echo "<tr><td colspan='5'>No hay vehículos registrados.</td></tr>";
    }
    ?>
  </table>
</main>
</body>
</html>
