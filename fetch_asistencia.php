<?php
include 'db_connection.php';

// Consulta para obtener asistencias
$sql = "SELECT * FROM rfid_data";
$result = $conn->query($sql);

// Crear un array para almacenar resultados
$resultadosArray = array();

// Mostrar resultados y almacenar en el array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $resultadosArray[] = array(
            "RFID" => $row["rfid_code"],
            "Fecha" => $row["fecha"],
            "Hora" => $row["hora"]
        );
    }
} else {
    $resultadosArray[] = array("mensaje" => "No hay asistencias registradas.");
}

// Cerrar conexión
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Asistencias Tramvet</title>
</head>
<body>
    <h2>Asistencias</h2>

    <?php 
        // Verificar si hay datos antes de mostrarlos
        if (!empty($resultadosArray)) {
            foreach ($resultadosArray as $asistencia) {
                echo '<div>';
                echo '<p>RFID: ' . $asistencia['RFID'] . '</p>';
                echo '<p>Fecha: ' . $asistencia['Fecha'] . '</p>';
                echo '<p>Hora: ' . $asistencia['Hora'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No hay asistencias registradas.</p>';
        }
    ?>
</body>
</html>
