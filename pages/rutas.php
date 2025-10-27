<?php include("../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Rutas | Terminal de Transporte</title>
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
      <div class="introduccion">
        <h2>Rutas disponibles</h2>
        <p>Consulta las rutas registradas en el sistema y realiza tu compra directamente.</p>
      </div>

      <section class="container-rutas">
        <?php
        $sql = "SELECT * FROM rutas";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "
              <article class='ruta'>
                <div>
                  <h3>{$row['origen']} – {$row['destino']}</h3>
                  <p>Duración estimada: {$row['duracion']} horas</p>
                  <p>Precio: \$ {$row['precio']}</p>
                </div>
                <a href='compra.php'><button>Comprar Ticket</button></a>
              </article>
            ";
          }
        } else {
          echo "<p>No hay rutas registradas.</p>";
        }
        ?>
      </section>
    </main>

    <footer>
      <p>&copy; 2025 Terminal de Transporte | Calle 123 #45-67 | Tel: +57 300 123 4567</p>
      <p>Horario: Lunes a domingo, 5:00 a.m. – 10:00 p.m.</p>
    </footer>
  </body>
</html>
