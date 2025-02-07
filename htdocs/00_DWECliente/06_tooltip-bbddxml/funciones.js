document.addEventListener('DOMContentLoaded', inicializarEventos);

let xmlCache = null; // Almacenamiento temporal del XML

function inicializarEventos() {
    let elementos = document.querySelectorAll('svg [id]');
    
    elementos.forEach(elemento => {
        elemento.addEventListener('mouseover', mostrarToolTip);
        elemento.addEventListener('mouseout', ocultarToolTip);
        elemento.addEventListener('mousemove', actualizarToolTip);
    });

    let tooltip = document.createElement('div');
    tooltip.setAttribute('id', 'tooltip');
    
    // Aplicar estilos directamente
    tooltip.style.position = 'absolute';
    tooltip.style.visibility = 'hidden';
    tooltip.style.backgroundColor = 'white';
    tooltip.style.border = '1px solid black';
    tooltip.style.padding = '10px';
    tooltip.style.zIndex = '1000';
    tooltip.style.boxShadow = '3px 3px 10px rgba(0,0,0,0.3)';
    tooltip.style.borderRadius = '5px';
   
    document.body.appendChild(tooltip);
}

function mostrarToolTip(e) {
    let tooltip = document.getElementById("tooltip");
    tooltip.style.visibility = "visible";
    actualizarToolTip(e);
    
    let idHueso = e.target.getAttribute('id');
    console.log("Hueso detectado:", idHueso);
    
    if (xmlCache) {
        procesarEventos(xmlCache, idHueso);
    } else {
        recuperarServidorTooltip(idHueso);
    }
}

function actualizarToolTip(e) {
    let tooltip = document.getElementById("tooltip");
    tooltip.style.left = (e.clientX + window.scrollX + 15) + 'px';
    tooltip.style.top = (e.clientY + window.scrollY + 15) + 'px';
}

function ocultarToolTip() {
    document.getElementById("tooltip").style.visibility = "hidden";
}

function recuperarServidorTooltip(codigo) {
    if (!codigo) return;

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            console.log("Estado de la petición:", xhr.status);
            console.log("Respuesta recibida:", xhr.responseText);

            if (xhr.status === 200) {  
                try {
                    // Intentar parsear como XML
                    let parser = new DOMParser();
                    xmlCache = parser.parseFromString(xhr.responseText, "application/xml");

                    // Verificar si hubo error en la conversión
                    let parseError = xmlCache.getElementsByTagName("parsererror");
                    if (parseError.length > 0) {
                        throw new Error("Error al analizar XML");
                    }

                    procesarEventos(xmlCache, codigo);
                } catch (error) {
                    console.log("Error al procesar XML:", error);
                    document.getElementById("tooltip").innerHTML = "Error al cargar los datos";
                }
            } else {
                console.log("Error en la solicitud:", xhr.status, xhr.statusText);
                document.getElementById("tooltip").innerHTML = "Error al cargar los datos";
            }
        }
    };

    xhr.open('GET', 'cargar_bbdd.php?cod=' + encodeURIComponent(codigo), true);
    xhr.send();
}

function procesarEventos(xmlDoc, codigo) {
    let tooltip = document.getElementById("tooltip");

    if (!xmlDoc) {
        console.log("XML no recibido correctamente");
        tooltip.innerHTML = "Error al cargar los datos";
        return;
    }

    console.log("XML recibido:", xmlDoc);

    let huesos = xmlDoc.getElementsByTagName("hueso");
    console.log("Número de huesos en XML:", huesos.length);

    let encontrado = false;

    for (let i = 0; i < huesos.length; i++) {
        let idXml = huesos[i].getElementsByTagName("id")[0]?.textContent.trim();

        if (idXml === codigo) {
            let nombre = huesos[i].getElementsByTagName("nombre_web")[0]?.textContent || "Sin nombre";
            let descripcion = huesos[i].getElementsByTagName("descripcion")[0]?.textContent || "Sin descripción";
            tooltip.innerHTML = `<h2>${nombre}</h2><p>${descripcion}</p>`;
            encontrado = true;
            break;
        }
    }

    if (!encontrado) {
        tooltip.innerHTML = "No se encontraron datos.";
    }
}
