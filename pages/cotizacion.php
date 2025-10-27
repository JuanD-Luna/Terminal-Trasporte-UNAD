<?php include("../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Cotización | Terminal de Transporte</title>
  </head>
  <body>
    <nav class="navegacion">
      <h1>Terminal de Transporte</h1>
      <ul>
        <li><a href="../index.php"><button>Inicio</button></a></li>
        <li><a href="rutas.php"><button>Rutas</button></a></li>
        <li><a href="empresas.php"><button>Empresas</button></a></li>
        <li><a href="vehiculos.php"><button>Vehículos</button></a></li>
        <li><a href="cotizacion.php"><button>Cotización</button></a></li>
        <li><a href="compra.php"><button>Compra tu Ticket</button></a></li>
      </ul>
    </nav>

    <main class="main-cotizacion">
      <div class="cotizacion">
        <h2>Calcula tu cotización</h2>
        <form method="POST">
          <label for="ruta">Selecciona una ruta</label>
          <select name="ruta" id="ruta" required>
            <?php
            $rutas = mysqli_query($conn, "SELECT id, origen, destino, precio FROM rutas");
            while ($r = mysqli_fetch_assoc($rutas)) {
              echo "<option value='{$r['id']}'>{$r['origen']} – {$r['destino']}</option>";
            }
            ?>
          </select>

          <label for="personas">Cantidad de pasajeros</label>
          <input type="number" name="personas" min="1" required />

          <button type="submit" name="calcular">Calcular costo</button>
        </form>

        <?php
        if (isset($_POST['calcular'])) {
          $id = $_POST['ruta'];
          $personas = $_POST['personas'];
          $ruta = mysqli_fetch_assoc(mysqli_query($conn, "SELECT precio FROM rutas WHERE id='$id'"));
          $total = $ruta['precio'] * $personas;
          echo "<h3 id='resultado-cotizacion'>Costo estimado: \$" . number_format($total, 0, ',', '.') . "</h3>";
        }
        ?>
      </div>
    </main>

    <footer>
      <p>&copy; 2025 Terminal de Transporte | Calle 123 #45-67 | Tel: +57 300 123 4567</p>
      <p>Horario: Lunes a domingo, 5:00 a.m. – 10:00 p.m.</p>
    </footer>
  </body>
</html>
