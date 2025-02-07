addEventListener('load', inicializarEventos, false);

function inicializarEventos() {
    let ob = document.getElementById('boton1');
    ob.addEventListener('click', presionBoton, false);
}

let conexion1;
function presionBoton(e) {
    conexion1 = new XMLHttpRequest();
    conexion1.open('GET', 'cargar_perifericos_xml.php', true);
    conexion1.timeout = 3000; // Tiempo máximo de espera del API 3sg
    conexion1.addEventListener('readystatechange', procesarDatos); // Añadimos el callback
    conexion1.addEventListener('timeout', tiempoVencido); // El evento ontimeout se dispara cuando se ha superado el tiempo de espera
    conexion1.send();
}


function tiempoVencido() {
    document.getElementById("resultados").innerHTML = "Tiempo de espera vencido";
}

function procesarDatos() {
	if(conexion1.readyState==4){
		    if (conexion1.status == 200) {
        let resultados = document.getElementById("resultados");
        try {
            let xmlDoc = conexion1.responseXML; // En la propiedad responseXML se almacena el XML (tiene una estructura similar al DOM)
            let salida = '';

            // Obtener todos los elementos <periferico> dentro del XML
            let perifericos = xmlDoc.getElementsByTagName("periferico");

            for (let f = 0; f < perifericos.length; f++) {
                // Acceder a los datos de cada elemento <periferico>
                let codigo = perifericos[f].getElementsByTagName("codigo")[0].textContent;
                let descripcion = perifericos[f].getElementsByTagName("descripcion")[0].textContent;
                let precio = perifericos[f].getElementsByTagName("precio")[0].textContent;
                let descuento = perifericos[f].getElementsByTagName("descuento")[0].textContent;

                salida += 'Codigo: ' + codigo + "<br>";
                salida += 'Descripcion: ' + descripcion + "<br>";
                salida += 'Precio: ' + precio + "<br>";
                salida += 'Descuento: ' + descuento + "<br><br>";
            }
            resultados.innerHTML = salida;
        } catch (ex) {
            document.getElementById("resultados").innerHTML = "Error al cargar extraer del XML: " + ex.message;
        }

    } else {
        // Se ha recibido un código status distinto de 200
        document.getElementById("resultados").innerHTML = "Error al cargar los datos";
    }
	} else {
		document.getElementById("resultados").innerHTML = "Cargando...";
	}
	

}
