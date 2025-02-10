// Función para establecer el borde de la tabla con un valor de 5
function definirAtributo() {
    // Obtiene el elemento de la tabla
    var tabla = document.getElementById("tabla1");
    
    // Establece el atributo 'border' con valor '5'
    tabla.setAttribute("border", "5");
}

// Función para borrar el borde de la tabla
function borrarAtributo() {
    // Obtiene el elemento de la tabla
    var tabla = document.getElementById("tabla1");
    
    // Elimina el atributo 'border' de la tabla
    tabla.removeAttribute("border");
}
