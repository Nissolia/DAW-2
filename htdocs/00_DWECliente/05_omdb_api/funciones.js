// constantes que usaremos para usar la api que ombd
const apiKey = 'https://www.omdbapi.com/?apikey=ddd5430f';
// busqueda y variables
// const busquedaNombre = 's=';
// const tipo = 'type=';
// const archivo = 'r=';
// const anio = 'y=';

// funciones a usar
addEventListener('load', inicializarEventos, false);

function inicializarEventos() {
    let ob = document.getElementById('botonBuscar');
    ob.addEventListener('click', presionBoton, false);
}

let conexion1;

function presionBoton(e) {
    conexion1 = new XMLHttpRequest();
    // componer el url
    let tituloD = document.getElementById('tit').value;
    let tipoD = document.getElementById('tip').value;
    let compuesto = apiKey;
    // ponemos las diferentes variaciones que tenemos
    if (tituloD != "" && tipoD != "") {
        compuesto += `&s=${tituloD}&type=${tipoD}`;
    } else if (tituloD != "" && tipoD == "") {
        compuesto += `&s=${tituloD}`;
    } else if (tipoD != "" && tituloD == "") {
        compuesto += `&type=${tipoD}`;
    }
    // componemos la url a la que vamos a llamar
    conexion1.open('GET', compuesto, true);
    // console.log(compuesto);
    // console.log(conexion1);
    // ha vencido el tiempo de espera
    // conexion1.timeout = 3000; // Tiempo máximo de espera del API 3sg
    conexion1.addEventListener('readystatechange', procesarDatos); // Añadimos el callback
    // conexion1.addEventListener('timeout', tiempoVencido); // El evento ontimeout se dispara cuando se ha superado el tiempo de espera
    conexion1.send();
}


function procesarDatos() {
    let resultados ='';
    if (conexion1.readyState == 4) {
        if (conexion1.status == 200) {
            resultados = document.getElementById("divBusqueda");
            try {
                let salida = '';
                // Con JSON.parse se convierte el texto JSON en un objeto JavaScript
                let datos = JSON.parse(conexion1.responseText); // Convertir el JSON en objeto
                
                if (!datos.Search) {
                    throw new Error("El JSON no tiene la propiedad 'Search'");
                }

                salida += '<table>';
                salida += '<tr><th>Título</th><th>Tipo</th><th>Año</th><th>Poster</th></tr>';
                
                // Recorrer el array dentro de la propiedad 'Search'
                for (let f = 0; f < datos.Search.length; f++) {
                    salida += '<tr>';
                    salida += '<td>' + datos.Search[f].Title + "</td>";
                    salida += '<td>' + datos.Search[f].Type + "</td>";
                    salida += '<td>' + datos.Search[f].Year + "</td>";
                    salida += '<td> <figure> <img src="'+datos.Search[f].Poster+'" alt="'+datos.Search[f].Title+'"></figure></td>';
                    salida += '</tr>';
                }
                
                salida += "</table>";
                resultados.innerHTML = salida;
            } catch (ex) {
                resultados.innerHTML = "Error al parsear el JSON: " + ex.message;
            }

        } else {
            resultados.innerHTML = "Error al cargar los datos";
        }
    } else {
        resultados.innerHTML = "Cargando...";
    }
}
