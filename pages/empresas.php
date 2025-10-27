<?php include("../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Empresas | Terminal de Transporte</title>
  </head>
  <body>
    <!-- 🔹 Navegación principal -->
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

    <!-- 🔹 Contenido principal -->
    <main>
      <div class="introduccion">
        <h2>Empresas de transporte registradas</h2>
        <p>
          Conoce las principales empresas de transporte que operan en nuestra
          terminal. Estos datos provienen directamente de la base de datos.
        </p>
      </div>

      <!-- 🔹 Listado dinámico de empresas -->
      <section class="container-empresas">
        <?php
        $sql = "SELECT * FROM empresas";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <article class='info-empresa'>
              <img src='../iconos/empresa.svg' alt='Logo Empresa'>
              <h3>{$row['nombre']}</h3>
              <p><strong>Teléfono:</strong> {$row['telefono']}</p>
              <p><strong>Email:</strong> {$row['email']}</p>
              <a href='vehiculos.php'><button>Ver vehículos</button></a>
            </article>
            ";
          }
        } else {
          echo "<p>No hay empresas registradas actualmente.</p>";
        }
        ?>
      </section>

      <!-- 🔹 Botón de acceso administrativo -->
      <div class="admin-access">
        <p>¿Eres administrador?</p>
        <a href="empresas/ver.php"><button>Acceder al panel de gestión</button></a>
      </div>
    </main>

    <!-- 🔹 Pie de página -->
    <footer>
      <p>&copy; 2025 Terminal de Transporte | Calle 123 #45-67 | Tel: +57 300 123 4567</p>
      <p>Horario de atención: Lunes a domingo, 5:00 a.m. a 10:00 p.m.</p>
    </footer>
  </body>
</html>
