<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="UPSRJ-TRAMVETICON.png" type="image/png"> 
    <title>TRAMVET</title>
    <style>
	html{
	    margin:0;
	    padding:0;
	}
        body {
            font-family: Arial, sans-serif;
            margin:0;
        }

        h2 {
            color: #333;
        }

        div {

            border: 1px solid black;
            padding: 10px;
	    margin-bottom: 10px;
	 
	}

        p {
            margin: 0;
        }

	.button-container {
	    margin:0;
            width: 100%;
            display: flex;
            justify-content: space-between;
	    margin-bottom: 20px;
	    height:10%;
	    background-color:none;

        }
header {
          
            padding: 10px;
            text-align: center;
height:100px;
        }

        #imagenIzquierda {
            float: right; /* Imagen a la izquierda */
            margin-right: 10px; /* Márgenes para separar del contenido */
        }

        #imagenDerecha {
            float: left;/* Imagen a la derecha */
            margin-left: 10px; /* Márgenes para separar del contenido */
        }


section{
	background-color: #0F8AA6;
	width:100%;
	heigth:300px;
	padding:20px;
	color:white;
}

.titulosblancos{
color:white;
}



    </style>
</head>
<body>

<header>
<img src="UPSRJ-TRAMVET.png" height="100px" width="25%" alt="Imagen Derecha" id="imagenDerecha">    
<img src="UPSRJLOGO.png" height="100px" width="25%" alt="Imagen Izquierda" id="imagenIzquierda">
    
</header>

<section>
  
<h2 class="titulosblancos">IMMERSIVE TECHNOLOGY LABORATORY ASSISTANCE SYSTEM</h2>
  
<p>
    
In the context of a laboratory environment, a specific system has been developed and implemented with the primary purpose of managing and documenting the attendance of a team of individuals. This carefully designed system allows for the systematic collection of data related to the presence of team members in the laboratory facilities. </p>


</section>




      <div id="datosContainer">

        <?php 
            // Incluye inicialmente los datos de Fernanda
            include 'fetch_asistencia_tramvet.php';
        ?>
    </div>

    <script>
        function cambiarDatos(persona) {
            // Utiliza AJAX para cargar los datos de la persona seleccionada
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("datosContainer").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "fetch_asistencia_tramvet" + ".php", true);
            xhttp.send();
        }
    </script>
</body>
</html>
