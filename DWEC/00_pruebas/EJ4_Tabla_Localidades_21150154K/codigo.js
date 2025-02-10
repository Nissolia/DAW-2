let provincias = [
    { id: 1, nombre: "Sevilla" },
    { id: 2, nombre: "Huelva" },
    { id: 3, nombre: "Cádiz" },
];

let localidades = [
    { id: 1, nombre: "Utrera", idProvincia: 1, datos: { cp: 41710, poblacion: 51700 } },
    { id: 2, nombre: "Los Palacios", idProvincia: 1, datos: { cp: 41720, poblacion: 38600 } },
    { id: 3, nombre: "Dos Hermanas", idProvincia: 1, datos: { cp: 41700, poblacion: 138900 } },
    { id: 4, nombre: "Alcalá de Guadaíra", idProvincia: 1, datos: { cp: 41500, poblacion: 76600 } },
    { id: 5, nombre: "Niebla", idProvincia: 2, datos: { cp: 21840, poblacion: 4244 } },
    { id: 6, nombre: "Bonares", idProvincia: 2, datos: { cp: 21830, poblacion: 6101 } },
    { id: 7, nombre: "Chipiona", idProvincia: 3, datos: { cp: 11550, poblacion: 19600 } },
    { id: 8, nombre: "Jerez", idProvincia: 3, datos: { cp: 11401, poblacion: 213200 } },
    { id: 9, nombre: "Rota", idProvincia: 3, datos: { cp: 11520, poblacion: 29700 } },
];

// Referencias a elementos del DOM
const selectProvincias = document.getElementById('selectProvincias');
const tblLocalidades = document.getElementById('tblLocalidades');
const datosDiv = document.getElementById('datos');

// Generar opciones del select para provincias
provincias.forEach(provincia => {
    let option = document.createElement('option');
    option.value = provincia.id;
    option.textContent = provincia.nombre;
    selectProvincias.appendChild(option);
});

// Función para mostrar la tabla de localidades
function mostrarLocalidades() {
    // Limpiar tabla
    tblLocalidades.innerHTML = "";

    // Crear encabezado de la tabla
    let thead = document.createElement('thead');
    let headerRow = document.createElement('tr');
    ['Provincia', 'Localidad', 'Acción'].forEach(headerText => {
        let th = document.createElement('th');
        th.textContent = headerText;
        headerRow.appendChild(th);
    });
    thead.appendChild(headerRow);
    tblLocalidades.appendChild(thead);

    // Crear cuerpo de la tabla
    let tbody = document.createElement('tbody');

    let provinciaSeleccionada = selectProvincias.value;

    let localidadesFiltradas = localidades.filter(localidad => {
        return !provinciaSeleccionada || localidad.idProvincia == provinciaSeleccionada;
    });

    if (localidadesFiltradas.length === 0) {
        // Mostrar mensaje si no hay localidades
        let noDataRow = document.createElement('tr');
        let noDataCell = document.createElement('td');
        noDataCell.textContent = "No hay localidades para esta provincia";
        noDataCell.colSpan = 3;
        noDataRow.appendChild(noDataCell);
        tbody.appendChild(noDataRow);
    } else {
        localidadesFiltradas.forEach(localidad => {
            // Crear fila para cada localidad
            let row = document.createElement('tr');

            // Columna Provincia
            let provinciaCell = document.createElement('td');
            provinciaCell.textContent = provincias.find(p => p.id === localidad.idProvincia).nombre;
            row.appendChild(provinciaCell);

            // Columna Localidad
            let localidadCell = document.createElement('td');
            localidadCell.textContent = localidad.nombre;
            row.appendChild(localidadCell);

            // Columna Acción
            let actionCell = document.createElement('td');
            let img = document.createElement('img');
            img.src = 'info.png'; // Asegúrate de que la imagen está en la misma carpeta
            img.alt = "Info";
            img.addEventListener('mouseover', () => mostrarDatosLocalidad(localidad));
            img.addEventListener('mouseout', ocultarDatosLocalidad);
            actionCell.appendChild(img);
             row.appendChild(actionCell);

            // Agregar fila al cuerpo de la tabla
            tbody.appendChild(row);
        });
    }

    // Agregar cuerpo de la tabla a la tabla
    tblLocalidades.appendChild(tbody);
}
function ocultarDatosLocalidad() {
    datosDiv.innerHTML = ""; // Limpiamos el contenido del div
}
// Función para mostrar los datos de la localidad seleccionada
function mostrarDatosLocalidad(localidad) {
    datosDiv.innerHTML = `<strong>Código Postal:</strong> ${localidad.datos.cp}<br>
                          <strong>Población:</strong> ${localidad.datos.poblacion}`;
}

// Event listener para el cambio en el select de provincias
selectProvincias.addEventListener('change', mostrarLocalidades);

// Inicializar la tabla con todas las localidades al cargar la página
document.addEventListener('DOMContentLoaded', mostrarLocalidades);
