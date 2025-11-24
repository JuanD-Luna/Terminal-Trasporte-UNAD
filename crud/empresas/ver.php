<?php include("../../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Empresas | Ver</title>
  <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
  <nav class="navegacion">
    <h1>Terminal de Transporte</h1>
    <ul>
      <li><a href="../../index.php"><button>Inicio</button></a></li>
      <li><a href="../rutas.php"><button>Rutas</button></a></li>
      <li><a href="../vehiculos.php"><button>Vehículos</button></a></li>
      <li><a href="../empresas.php"><button>Empresas</button></a></li>
    </ul>
  </nav>

  <main class="container">
    <h2>Empresas registradas</h2>
    <a href="agregar.php"><button>Agregar Empresa</button></a>
    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Acciones</th>
      </tr>

      <?php
      $sql = "SELECT * FROM empresas";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['nombre']}</td>
                  <td>{$row['telefono']}</td>
                  <td>{$row['email']}</td>
                  <td>
                    <a href='editar.php?id={$row['id']}'><button>Editar</button></a>
                    <a href='eliminar.php?id={$row['id']}'><button>Eliminar</button></a>
                  </td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='5'>No hay empresas registradas.</td></tr>";
      }
      ?>
    </table>
  </main>
</body>
</html>
