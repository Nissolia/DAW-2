// Función que se ejecuta cuando la página se carga
window.addEventListener('load', function () {
    // Cargar las comunidades autónomas al inicio
    cargarComunidades();

    // Asociar evento 'change' para la comunidad seleccionada
    document.getElementById("comunidades").addEventListener('change', cargarProvincias);
    
    // Asociar evento 'change' para mostrar la provincia seleccionada
    document.getElementById("provincias").addEventListener('change', mostrarProvincia);
});

// Función para cargar las comunidades autónomas desde el servidor
function cargarComunidades() {
    const comunidadesElto = document.getElementById("comunidades");

    const request = new XMLHttpRequest();
    request.open("GET", "cargar_comunidades_json.php", true);  // Cambia esto si el archivo PHP tiene otro nombre

    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            const comunidades = JSON.parse(request.responseText);
            comunidadesElto.innerHTML = '<option value="">Seleccionar...</option>';

            comunidades.forEach(comunidad => {
                const option = document.createElement("option");
                option.value = comunidad.id;
                option.textContent = comunidad.nombre;
                comunidadesElto.appendChild(option);
            });
        }
    };
    request.send();
}

// Función para cargar las provincias de una comunidad seleccionada
function cargarProvincias() {
    const comunidadId = document.getElementById("comunidades").value;
    const provinciasElto = document.getElementById("provincias");

    if (comunidadId === "") {
        provinciasElto.innerHTML = '<option value="">Seleccionar...</option>';
        return;
    }

    const xhr = new XMLHttpRequest();
    xml.open("GET", `cargar_provincias.php?cod=${comunidadId}`, true);  // Cambia esto si el archivo PHP tiene otro nombre

    xml.onreadystatechange = function () {
        if (xml.readyState === 4 && xml.status === 200) {
            const xml = xml.responseXML;
            const provincias = xml.getElementsByTagName("provincia");
            provinciasElto.innerHTML = '<option value="">Seleccionar...</option>';

            for (let i = 0; i < provincias.length; i++) {
                const id = provincias[i].getElementsByTagName("id")[0].textContent;
                const nombre = provincias[i].getElementsByTagName("nombre")[0].textContent;

                const option = document.createElement("option");
                option.value = id;
                option.textContent = nombre;
                provinciasElto.appendChild(option);
            }
        }
    };

    xml.send();
}

// Función para mostrar la provincia seleccionada en el div 'resultado'
function mostrarProvincia() {
    const provinciaElto = document.getElementById("provincias");
    const divResultado = document.getElementById("resultado");

    const provinciaId = provinciaElto.value;
    const provinciaNombre = provinciaElto.options[provinciaElto.selectedIndex].text;

    if (provinciaId !== "") {
        divResultado.textContent = `ID: ${provinciaId}, Nombre: ${provinciaNombre}`;
    } else {
        divResultado.textContent = "";
    }
}
