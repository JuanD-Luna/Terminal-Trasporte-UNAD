<?php include("../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Vehículos | Terminal de Transporte</title>
    <style>
      /* Estilo discreto para el botón de administrador */
      .admin-link {
        text-align: center;
        margin-top: 30px;
      }
      .admin-link button {
        background-color: #1b1b1b;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        font-size: 0.9rem;
        cursor: pointer;
        transition: 0.3s ease;
      }
      .admin-link button:hover {
        background-color: #444;
      }
    </style>
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
        <h2>Tipos de vehículos disponibles</h2>
        <p>
          Explora nuestra variedad de vehículos registrados en el sistema. 
          Estos datos provienen directamente de la base de datos del proyecto.
        </p>
      </div>

      <section class="container-empresas">
        <?php
        $sql = "SELECT v.tipo, v.placa, v.capacidad, e.nombre AS empresa
                FROM vehiculos v
                INNER JOIN empresas e ON v.empresa_id = e.id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <article class='info-empresa'>
              <img src='../iconos/bus.svg' alt='Vehículo'>
              <h3>{$row['tipo']}</h3>
              <p><strong>Empresa:</strong> {$row['empresa']}</p>
              <p><strong>Placa:</strong> {$row['placa']}</p>
              <p><strong>Capacidad:</strong> {$row['capacidad']} pasajeros</p>
              <a href='cotizacion.php'><button>Solicitar cotización</button></a>
            </article>
            ";
          }
        } else {
          echo "<p>No hay vehículos registrados en el sistema.</p>";
        }
        ?>
      </section>

      <!--Botón discreto para acceder al módulo de administración -->
      <div class="admin-link">
        <a href="vehiculos/ver.php">
          <button>Acceso administrativo (CRUD de vehículos)</button>
        </a>
      </div>
    </main>

    <footer>
      <p>&copy; 2025 Terminal de Transporte | Calle 123 #45-67 | Tel: +57 300 123 4567</p>
      <p>Horario de atención: Lunes a domingo, 5:00 a.m. a 10:00 p.m.</p>
    </footer>
  </body>
</html>
