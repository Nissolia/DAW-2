addEventListener('load', inicializarEventos, false);

function inicializarEventos() {
    ob.addEventListener('load', presionBoton, false);
}

let conexion1;
function presionBoton(e) {
    conexion1 = new XMLHttpRequest();
    conexion1.open('GET', 'cargar_clima.php', true);
    conexion1.timeout = 3000;
    conexion1.addEventListener('readystatechange', procesarDatos);
    conexion1.addEventListener('timeout', tiempoVencido);
    conexion1.send();
}

function tiempoVencido() {
    document.getElementById("resultados").innerHTML = "Tiempo de espera vencido";
}

function procesarDatos() {
    if (conexion1.readyState == 4) {
        if (conexion1.status == 200) {
            let resultados = document.getElementById("resultados");
            try {
                let salida = '';
                let datos = JSON.parse(conexion1.responseText);
                salida += '<table>';
                salida += '<tr><th>ID</th><th>Mes</th><th>Lluvias (mm)</th></tr>';
                for (let f = 0; f < datos.length; f++) {
                    salida += '<tr>';
                    salida += '<td>' + datos[f].id + "</td>";
                    salida += '<td>' + datos[f].mes + "</td>";
                    salida += '<td>' + datos[f].lluvia + "</td>";
                    salida += '</tr>';
                }
                salida += "</table>";
                resultados.innerHTML = salida;
                drawChart(datos);
            } catch (ex) {
                document.getElementById("resultados").innerHTML = "Error al parsear el JSON: " + ex.message;
            }
        } else {
            document.getElementById("resultados").innerHTML = "Error al cargar los datos";
        }
    } else {
        document.getElementById("resultados").innerHTML = "Cargando...";
    }
}
// codigo para la parte de google
google.charts.load('current', {packages: ['corechart']});
google.charts.setOnLoadCallback(loadData);

function loadData() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'cargar_clima.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            drawChart(data);
        }
    };
    xhr.send();
}

function drawChart(apiData) {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Mes');
    data.addColumn('number', 'Lluvias (mm)');
    
    apiData.forEach(item => {
        data.addRow([item.mes, parseFloat(item.lluvia)]);
    });
    
    var options = {title: 'Precipitaciones Anuales', width: 600, height: 400};
    var chart = new google.visualization.ColumnChart(document.getElementById('myChart'));
    chart.draw(data, options);
}
