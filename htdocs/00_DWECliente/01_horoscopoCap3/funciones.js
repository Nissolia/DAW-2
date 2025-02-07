addEventListener('load', inicializarEventos, false);

function inicializarEventos() {
    for (var f = 1; f <= 12; f++) {
        var ob = document.getElementById('enlace' + f);
        ob.addEventListener('click', presionEnlace, false);
    }
}
var cod;
function presionEnlace(e) {
    e.preventDefault();
    var cod = e.target.getAttribute('href').split('=')[1];
    cargarHoroscopo(cod);

}

var conexion1;

function cargarHoroscopo(cod) {
    conexion1 = new XMLHttpRequest();
    conexion1.onreadystatechange = procesarEventos;
    conexion1.open("POST", "pagina1.php", true);
    conexion1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    conexion1.send("cod=" + encodeURIComponent(cod));
}

function procesarEventos() {
    var detalles = document.getElementById("detalles");
    if (conexion1.readyState == 4 && conexion1.status == 200) {
        detalles.innerHTML = conexion1.responseText;

    } else {
        detalles.innerHTML = 'Cargando...';
    }
}