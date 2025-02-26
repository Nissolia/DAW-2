// Escribe aquí tu código
addEventListener("load", inicializarEventos, false);

function inicializarEventos() {
  cargarComunidades();

  let comunidadesDropdown = document.getElementById("localidades");
  comunidadesDropdown.addEventListener("change", seleccionarComunidad, false);

}

let conexion1;
let timeout;


function cargarComunidades() {
  conexion1 = new XMLHttpRequest();
  conexion1.open("GET", "cargar_localidades.php", true);
  conexion1.addEventListener("readystatechange", procesarComunidades);
  conexion1.send();
}

function procesarComunidades() {
  if (conexion1.readyState == 4 && conexion1.status == 200) {
    try {
      console.log("Datos recibidos:", conexion1.responseText);
      let datos = JSON.parse(conexion1.responseText);
      let comunidadesDropdown = document.getElementById("localidades");
      comunidadesDropdown.innerHTML =
        '<option value="">Seleccionar...</option>';

      for (let comunidad of datos) {
        let opcion = document.createElement("option");
        opcion.value = comunidad.id;
        opcion.textContent = comunidad.nombre;
        comunidadesDropdown.appendChild(opcion);
      }
    } catch (ex) {
      console.error("Error al procesar el JSON:", ex.message);
    }
  }
}

function manejarCambioComunidad(e) {
  clearTimeout(timeout); // Cancela el timeout anterior si el usuario sigue escribiendo o cambiando
  timeout = setTimeout(() => seleccionarComunidad(e), 500); // Espera 500ms antes de hacer la petición
}

/////////////////////////

function seleccionarComunidad(e) {
  let comunidadId = e.target.value;
  if (comunidadId) {
    conexion1 = new XMLHttpRequest();
    conexion1.open("GET",`cargar_prevision.php?localidad=${comunidadId}`,true);

    conexion1.addEventListener("readystatechange", procesarProvincias);
    conexion1.send();
  } else {
    document.getElementById("tablaprevision").innerHTML = "";
  }
}

function procesarProvincias() {
  if (conexion1.readyState == 4 && conexion1.status == 200) {
    try {
      let datos = JSON.parse(conexion1.responseText);
      let mostrarProvincias = document.getElementById("tablaprevision");
      mostrarProvincias.innerHTML = "<tr>";
      mostrarProvincias.innerHTML = "<td>Localidad</td>";
      mostrarProvincias.innerHTML = "<td>Hora</td>";
      mostrarProvincias.innerHTML = "<td>Temperatura</td>";
      mostrarProvincias.innerHTML = "<td>Viento</td>";
      mostrarProvincias.innerHTML = "<td>Velocidad</td>";
      mostrarProvincias.innerHTML = "<td>Lluvias</td>";
      mostrarProvincias.innerHTML = "</tr>";

      for (let provincia of datos) {
        mostrarProvincias.innerHTML += `
            <tr>
                <td>${provincia.localidad}</td>
                <td>${provincia.hora}</td>
                <td>${provincia.temperatura}<img src="imagenes/${provincia.icono}.png"></td>
                <td><img src="imagenes/${provincia.viento}.png"></td>
                <td>${provincia.velocidad}</td>
                <td>${provincia.lluvias}</td>
            </tr>
        `;
    }
    } catch (ex) {
      console.error("Error al procesar el JSON:", ex.message);
    }
  }
}

function mostrarProvincia(e) {
  let provinciaId = e.target.value;
  let provinciaNombre = e.target.options[e.target.selectedIndex].text;

  if (provinciaId) {
    document.getElementById("resultado").innerHTML = `
        <p><strong>ID:</strong> ${provinciaId}</p>
        <p><strong>Nombre:</strong> ${provinciaNombre}</p>
      `;
  } else {
    document.getElementById("resultado").innerHTML = "";
  }
}
