<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $conn = new mysqli("localhost", "root", "", "asistenciatramvet");


    if ($conn->connect_error) {
        die("Error de conexi�n: " . $conn->connect_error);
    }

  
    $data = json_decode(file_get_contents('php://input'), true);
	
  $queretaroTimeZone = new DateTimeZone('America/Mexico_City');
    $dateTime = new DateTime('now', $queretaroTimeZone);
    $data['fecha'] = $dateTime->format('Y-m-d');
    $data['hora'] = $dateTime->format('H:i:s');
 
    if (!empty($data['rfid_code'])) {
      
        $sql = "INSERT INTO rfid_data (rfid_code, fecha, hora) VALUES (?, ?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sss", $data['rfid_code'], $data['fecha'], $data['hora']);

   
        if ($stmt->execute()) {
            $response = array('status' => 'success', 'message' => 'Datos insertados correctamente');
        } else {
            $response = array('status' => 'error', 'message' => 'Error al insertar datos: ' . $stmt->error);
        }

     
        $stmt->close();
    } else {
        $response = array('status' => 'error', 'message' => 'Faltan datos obligatorios');
    }


    $conn->close();
} else {
    $response = array('status' => 'error', 'message' => 'M�todo de solicitud no permitido');
}


echo json_encode($response);
?>

