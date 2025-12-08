<?php
include __DIR__ . '/../conexion.php';
$sqlFile = __DIR__ . '/../DataBase/create_compras_table.sql';
if (!file_exists($sqlFile)) {
    echo "No se encontró el archivo SQL: $sqlFile\n";
    exit(1);
}
$sql = file_get_contents($sqlFile);
if (!$sql) {
    echo "No se pudo leer el archivo SQL.\n";
    exit(1);
}
if (mysqli_multi_query($conn, $sql)) {
    do {
        /* consumir resultados */
    } while (mysqli_more_results($conn) && mysqli_next_result($conn));
    echo "Tabla compras creada (o ya existente).\n";
} else {
    echo "Error al ejecutar SQL: " . mysqli_error($conn) . "\n";
}
mysqli_close($conn);
