document.addEventListener('DOMContentLoaded', inicializarEventos);

function inicializarEventos() {
    let elementos = document.querySelectorAll('svg [id]');
    
    elementos.forEach(elemento => {
        elemento.addEventListener('mouseover', mostrarToolTip);
        elemento.addEventListener('mouseout', ocultarToolTip);
        elemento.addEventListener('mousemove', actualizarToolTip);
    });
// creamos el elemento que vamos a ver 
    let tooltip = document.createElement('div');
    tooltip.setAttribute('id', 'tooltip'); 
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
    tooltip.style.left = (e.clientX + window.scrollX + 15) + 'px';
    tooltip.style.top = (e.clientY + window.scrollY + 15) + 'px';
    
    let idHueso = e.target.getAttribute('id'); 
    // verificamos si se captura correctamente el ID
    console.log("Hueso detectado:", idHueso); 
    recuperarServidorTooltip(idHueso);
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

    let xmlrequest = new XMLHttpRequest();
    xmlrequest.onreadystatechange = function () {
        if (xmlrequest.readyState === 4) {
            if (xmlrequest.status === 200) {
                // vemos que devuelve el servidor
                console.log("Respuesta recibida:", xmlrequest.responseText); 
                procesarEventos(xmlrequest.responseXML, codigo);
            } else {
                document.getElementById("tooltip").innerHTML = "Error al cargar los datos";
            }
        }
    };

    xmlrequest.open('GET', 'cargar_bbdd.php?cod=' + encodeURIComponent(codigo), true);
    xmlrequest.send();
}

function procesarEventos(xmlDoc, codigo) {
    let tooltip = document.getElementById("tooltip");

    if (!xmlDoc) {
        tooltip.innerHTML = "Error al cargar los datos";
        return;
    }

    let huesos = xmlDoc.getElementsByTagName("hueso");
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
