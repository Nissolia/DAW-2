// Crea una función llamada bonoloto() que devuelva un array de 6 números aleatorios no repetidos entre 1 y 49. El array debe estar ordenado.

// Crea un testeo con Jasmine de bonoloto() que realice las siguientes comprobaciones:

// Que devuelve un array (1 sola comprobación)
// Que el array tiene 6 elementos (1 sola comprobación)
// Que todos los elementos del array son números (1 sola comprobación)
// Que los eltos del array están ordenados (1000 comprobaciones)
// Que los eltos del array están comprendidos entre el 1 y 49 (1000 comprobaciones)
// Que los eltos del array no están repetidos (1000 comprobaciones)
// Que tras 1000 llamadas a la función han salido todos los números entre el 1 y el 49

function bonoloto() {
    const bonoloto = [];
    // bucle que hacce que se hagan los números aleatorios
    while (bonoloto.length() == 6) {
        numRandom = Math.random() * 49;
        if (!bonoloto.includes(numRandom)) {
            bonoloto.push(numRandom)
        }
    }
    // queda que devuelva las cosas ordenadas usando la funcion que hemos creado
    return ordenarArray(bonoloto);
}
// funcion para ordenar un array
function ordenarArray(array) {
    let aux = 0;
   
        for (let j = 0; j < array.length; j++) {
            if (array[i] > array[i + 1]) {
                aux = array[i + 1];
                array[i + 1] = array[i];
                array[i] = aux;
            }
        }
   

    //devolvemos el array ya corregido
    return array;
}
//////////////////////////////////////////////// FUNCIONES AUXILIARES
// Función que comprueba duplicidades en un array
function hasDuplicates(arr) {
    return arr.some(x => arr.indexOf(x) !== arr.lastIndexOf(x));
}