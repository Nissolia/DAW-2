addEventListener('load', inicializarEventos, false);

function inicializarEventos() {
    let ob = document.getElementById('boton1');
    ob.addEventListener('click', presionBoton, false);
}

let conexion1;
function presionBoton(e) {
    conexion1 = new XMLHttpRequest();
    conexion1.open('GET', 'cargar_perifericos_json.php', true);
    // ha vencido el tiempo de espera
    conexion1.timeout = 3000; // Tiempo máximo de espera del API 3sg
    conexion1.addEventListener('readystatechange', procesarDatos);  // Añadimos el callback
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
			let salida = '';
            // Con JSON.parse se convierte el texto JSON en un objeto JavaScript
            let datos = JSON.parse(conexion1.responseText); // Los datos JSON se recuperan al igual que el texto plano
            salida += '<table>';
            salida +='<tr><th>Código</th><th>Descripción</th><th>Precio</th><th>Descuento</th></tr>';
            for (let f = 0; f < datos.length; f++) {
                salida +='<tr>';
                salida += '<td>Codigo:' + datos[f].codigo + "</td>";
                salida += '<td>Descripcion:' + datos[f].descripcion + "</td>";
                salida += '<td>Precio:' + datos[f].precio + "</td>";
                salida += '<td>Descuento:' + datos[f].descuento  + "</td>";
          salida +='</tr>';
            }
            salida +="</table>";
            resultados.innerHTML = salida;
        } catch (ex) {
            document.getElementById("resultados").innerHTML = "Error al cargar parsear el JSON: " + ex.message;
        }

    } else {
        // Se ha recibido un código status distinto de 200
        document.getElementById("resultados").innerHTML = "Error al cargar los datos";
    }
	} else {
		document.getElementById("resultados").innerHTML = "Cargando...";
	}
	

}