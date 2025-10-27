<?php include("../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Compra | Terminal de Transporte</title>
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

    <main>
      <div class="cotizacion">
        <h2>Compra tu tiquete</h2>
        <form method="POST">
          <label for="nombre">Nombre completo</label>
          <input type="text" name="nombre" required />

          <label for="ruta">Ruta</label>
          <select name="ruta" required>
            <?php
            $rutas = mysqli_query($conn, "SELECT id, origen, destino FROM rutas");
            while ($r = mysqli_fetch_assoc($rutas)) {
              echo "<option value='{$r['id']}'>{$r['origen']} – {$r['destino']}</option>";
            }
            ?>
          </select>

          <label for="cantidad">Cantidad de tiquetes</label>
          <input type="number" name="cantidad" min="1" required />

          <label for="pago">Método de pago</label>
          <select name="pago" required>
            <option value="PSE">PSE</option>
            <option value="Tarjeta">Tarjeta de crédito</option>
            <option value="Nequi">Nequi</option>
            <option value="Daviplata">Daviplata</option>
          </select>

          <button type="submit" name="comprar">Comprar</button>
        </form>

        <?php
        if (isset($_POST['comprar'])) {
          $nombre = $_POST['nombre'];
          $ruta = $_POST['ruta'];
          $cantidad = $_POST['cantidad'];
          $pago = $_POST['pago'];

          $query = "INSERT INTO compras (nombre, ruta_id, cantidad, metodo_pago) VALUES ('$nombre', '$ruta', '$cantidad', '$pago')";
          if (mysqli_query($conn, $query)) {
            echo "<p>✅ Compra registrada exitosamente.</p>";
          } else {
            echo "<p>Error al registrar la compra.</p>";
          }
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
