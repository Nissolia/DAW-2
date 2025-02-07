// NO SE PUEDE CAMBIAR LA ESTRUCTURA DE LOS DATOS SUMINISTRADOS
let articulos = [{
        id: 1,
        nombre: "Monitor",
        caracteristicas: {
            precio: 151.23,
            descuento: 10
        }
    },
    {
        id: 2,
        nombre: "Ratón",
        caracteristicas: {
            precio: 5.45,
            descuento: 5
        }
    },
    {
        id: 3,
        nombre: "Cascos",
        caracteristicas: {
            precio: 15.59,
            descuento: 15
        }
    },
    {
        id: 4,
        nombre: "Escáner",
        caracteristicas: {
            precio: 95.12,
            descuento: 20
        }
    },
]
// Escribe aquí tu código
let tablaIzq = document.getElementById(tblIzquierda);
let tablaDer = document.getElementById(tblDerecha);
let eltoBotones = "<button id='izq'><</button><button id='drc'>></button><button id='dto'>Dto.</button>";
// creacion del contenido de la tabla
let contenido = "<tr>";
articulos.forEach(elto => {
    contenido += `<td id='fila'>${elto.nombre}</td>`
});
contenido += " </tr><tr>";
articulos.forEach(elto => {
    contenido += `<td id='fila'>${elto.caracteristicas.precio}</td>`
});
contenido += " </tr><tr>";
articulos.forEach(elto => {
    contenido += `<td id='fila'>${elto.caracteristicas.descuento}</td>`
});
contenido += " </tr><tr>";
articulos.forEach(elto => {
    contenido += `<td id='fila'>${eltoBotones}</td>`
});
contenido += " </tr>";

// tablaIzq.innerHTML = contenido;
// comprobación
console.log(contenido);
// evento para poner el color encima, se haría con el addevent listener y el mouse enter
function iniciar() {
    
   
    //Añadir evento mediante addEventListener
    boton2.addEventListener('mouseenter', fila);
    }
    // el mover unas tablas a otras sería tomando la fila completa y cambiando los atributos d eun lado a otro