addEventListener("load", cargarDirectores, false);

function cargarDirectores() {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var resultados = JSON.parse(xhr.responseText);
      var select = document.getElementById("directores");
      for (var i = 0; i < resultados.length; i++) {
        var option = document.createElement("option");
        option.value = resultados[i].CodiDirec;
        option.textContent = resultados[i].Nombre;
        select.appendChild(option);
      }
    }
  };
  xhr.open("GET", "cargar_directores_29530689T.php", true);
  xhr.send();
}

var ob = document.getElementById("btnBuscar");
ob.addEventListener("click", cargarPeliculas, false);

// var tiempo;
// function espera() {
//     var detalles = document.getElementById("peliculas");
//     detalles.innerHTML = 'Cargando...';
//     tiempo = setTimeout(cargarPeliculas, 2000);
// }

function cargarPeliculas() {
    var director = document.getElementById('directores').value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var resultados = xhr.responseXML;
            var peliculas = resultados.getElementsByTagName('pelicula');
            var table = document.getElementById('peliculas');
            table.innerHTML = '';

            for (var i = 0; i < peliculas.length; i++) {
                var titulo = peliculas[i].getElementsByTagName('titulo')[0].textContent;
                var año = peliculas[i].getElementsByTagName('año')[0].textContent;
                var productora = peliculas[i].getElementsByTagName('productora')[0].textContent;

                var row = document.createElement('tr');
                var cellTitulo = document.createElement('td');
                cellTitulo.textContent = titulo;
                var cellAño = document.createElement('td');
                cellAño.textContent = año;
                var cellProductora = document.createElement('td');
                cellProductora.textContent = productora;

                row.appendChild(cellTitulo);
                row.appendChild(cellAño);
                row.appendChild(cellProductora);
                table.appendChild(row);
            }
        }
    };
  xhr.open("POST", "cargar_peliculas_29530689T.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("CodiDirec=" + director);
}
