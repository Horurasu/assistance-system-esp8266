<?php
include 'db_connection.php';

// Obtener el mes seleccionado (si se ha enviado el formulario)
$selectedMonth = isset($_POST['selectedMonth']) ? $_POST['selectedMonth'] : date('m');

// Obtener el RFID seleccionado (si se ha enviado el formulario)
$selectedRFID = isset($_POST['selectedRFID']) ? $_POST['selectedRFID'] : 'b6cbb331';

// Consulta para obtener asistencias del mes y RFID seleccionados
$sql = "SELECT * FROM rfid_data WHERE rfid_code = '$selectedRFID' AND MONTH(fecha) = '$selectedMonth'";
$result = $conn->query($sql);

// Crear un array para almacenar resultados
$resultadosArray = array();

// Mostrar resultados y almacenar en el array
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $fecha = date('Y-m-d', strtotime($row["fecha"]));
        $diaSemana = date('l', strtotime($row["fecha"]));

        $resultadosArray[] = array(
            "RFID" => $row["rfid_code"],
            "Fecha" => $fecha,
            "DiaSemana" => $diaSemana,
            "Hora" => $row["hora"]
        );
    }
} else {
    $resultadosArray[] = array("mensaje" => "Error en la consulta SQL.");
}

// Cerrar conexión
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Asistencias Tramvet</title>
 <style>
        body {
            font-family: Arial, sans-serif;
                }

        h2 {
            color: #333;
	}

	.bloquediv{
	    width:35%;
            display:flex;
	    justify-content:space-between;
	    border-radius:10px;
	    height:10px;			
	  }

	.bloquediv1{
	    width:35%;
            display:flex;
	    justify-content:space-between;
		    height:10px;
  border-radius:10px;
padding-bottom:15px;
background-color:#0F8AA6;
color:white;
font-weight:bold;				
	  }


	div {
	    width:100vw;
            border: 1px solid #ddd;
	    padding: 10px;
	    margin-left:0px;
            margin-bottom: 10px;
	   
        }

        p {
            margin: 0;	
	}

form{
	display:flex;
	justify-content:flex-start;
	align-items:center;
	


}
label{
	margin-left:20px;
	border-radius:10px;

}

select{
	margin-left:20px;
	border-radius:10px;
}

input{
	margin-left:20px;
	border-radius:10px;

}


option{
	border-radius:10px;
}

.my-button {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.my-button:hover {
  background-color: #45a049;
}

.my-button:active {
  background-color: #3e8e41;
}

.software{
	background-color:#92D3F1;
}

.animacion{
	background-color:#F19292;

}

    </style>
</head>
<body>


<!-- Formulario combinado para cambiar RFID y seleccionar el mes -->
<form method="post" action="">
    <label for="selectedRFID">Select Student:</label>
    <select name="selectedRFID" id="selectedRFID">
        <option class="software" value="HHHHHHHH" <?php echo ($selectedRFID == 'HHHHHHHH') ? 'selected' : ''; ?>>Maria Fernanda Sánchez Aguilar</option>
        <option class="software"  value="b6cbb331" <?php echo ($selectedRFID == 'b6cbb331') ? 'selected' : ''; ?>>Ulises Ferrusca Jiménez</option>
	<option class="software"  value="HHHHHHHH" <?php echo ($selectedRFID == 'a') ? 'selected' : ''; ?>>Marcos Anibal Gonzalez Estrada</option>
        <option class="software"  value="b6cbb331" <?php echo ($selectedRFID == 'b') ? 'selected' : ''; ?>>Jorge Luis Melchor Rodríguez</option>
	<option class="animacion"  value="HHHHHHHH" <?php echo ($selectedRFID == 'c') ? 'selected' : ''; ?>>Benjamin Comba Calcaneo</option>
        <option class="animacion" value="b6cbb331" <?php echo ($selectedRFID == 'd') ? 'selected' : ''; ?>>Daniel Mendoza Rangel</option>
	<option class="animacion" value="HHHHHHHH" <?php echo ($selectedRFID == 'e') ? 'selected' : ''; ?>>Abraham Mendoza Guerrero</option>
        <option class="animacion" value="b6cbb331" <?php echo ($selectedRFID == 'f') ? 'selected' : ''; ?>>Edgar Alejandro Fernández Ontiveros</option>
	<option class="software"  value="HHHHHHHH" <?php echo ($selectedRFID == 'g') ? 'selected' : ''; ?>>Jacobo Abraham Durán Muñoz</option>
        <option class="software"  value="b6cbb331" <?php echo ($selectedRFID == 'h') ? 'selected' : ''; ?>>Josafat Vargas Sánchez</option>
	<option class="animacion" value="HHHHHHHH" <?php echo ($selectedRFID == 'i') ? 'selected' : ''; ?>>Juan Manuel López González</option>
        <option class="animacion" value="b6cbb331" <?php echo ($selectedRFID == 'j') ? 'selected' : ''; ?>>Mauricio Mosqueda Martínez</option>
	<option class="software"  value="HHHHHHHH" <?php echo ($selectedRFID == 'k') ? 'selected' : ''; ?>>Jorge Luis Medellin Martinez</option>
        <option class="software"  value="b6cbb331" <?php echo ($selectedRFID == 'l') ? 'selected' : ''; ?>>Sergio Rangel Vargas</option>
     	<option class="animacion" value="b6cbb331" <?php echo ($selectedRFID == 'l') ? 'selected' : ''; ?>>Yered Trejo Yerena</option>
	<option class="animacion" value="b6cbb331" <?php echo ($selectedRFID == 'l') ? 'selected' : ''; ?>>Nelly Carbajal Rincon</option>
	<option class="software"  value="b6cbb331" <?php echo ($selectedRFID == 'l') ? 'selected' : ''; ?>>Julio Cesar Gomez Eligio</option>
	<option class="software"  value="b6cbb331" <?php echo ($selectedRFID == 'l') ? 'selected' : ''; ?>>Adrian Dolores Sanchez Rios</option>
	<option class="software"  value="b6cbb331" <?php echo ($selectedRFID == 'l') ? 'selected' : ''; ?>>Oscar Gael Mayen Tello</option>
	<option class="software"  value="b6cbb331" <?php echo ($selectedRFID == 'l') ? 'selected' : ''; ?>>Jose Amir Lopez Mata</option>
	<option class="animacion"  value="b6cbb331" <?php echo ($selectedRFID == 'l') ? 'selected' : ''; ?>>Ana Victoria Huerta Fernandez</option>
	<option class="software"  value="b6cbb331" <?php echo ($selectedRFID == 'l') ? 'selected' : ''; ?>>Fabiola Michelle López Olvera</option>
	<option class="software"  value="b6cbb331" <?php echo ($selectedRFID == 'l') ? 'selected' : ''; ?>>Saúl Alejandro Dorantes Diaz</option>
	<option class="software"  value="b6cbb331" <?php echo ($selectedRFID == 'l') ? 'selected' : ''; ?>>Samantha Vianney Almaza Bocanegra</option>
        <!-- Agrega más opciones de RFID según sea necesario -->
    </select>

    <label for="selectedMonth">Select Month:</label>
    <select name="selectedMonth" id="selectedMonth">
        <?php
        for ($i = 1; $i <= 12; $i++) {
            $monthName = date('F', mktime(0, 0, 0, $i, 1));
            $selected = ($i == $selectedMonth) ? 'selected' : '';
            echo "<option value='$i' $selected>$monthName</option>";
        }
        ?>
    </select>

    <input class="my-button" type="submit" name="changeRFID" value="CLICK TO SHOW INFO">
</form>

<br>
<br>




<?php 
                 echo '<div class="bloquediv1" >';
		echo '<p>DATE</p>';
		echo '<p>DAY</p>';
                echo '<p>HOUR</p>';
                echo '</div>';
               ?>




  <?php
		// Mostrar resultados solo si no hay errores en la consulta

$resultadosArray = array_reverse($resultadosArray);
		

		
if (!empty($resultadosArray) && isset($resultadosArray[0]["RFID"])) {
  
    foreach ($resultadosArray as $asistencia) {
        echo '<div class="bloquediv" >';
        echo '<p>' . $asistencia['Fecha'] . '</p>';
        echo '<p>' . $asistencia['DiaSemana'] . '</p>';
        echo '<p>' . $asistencia['Hora'] . '</p>';
        echo '</div>';
    }
} else {
    echo '<p>No hay asistencias registradas en el mes seleccionado.</p>';
}
?>


</body>
</html>
