describe('Testeo del boletín de bonoloto', () => {
    describe('Testeo de la funcion comprobarEsPar()', () => {
        const datos = [{
            entrada: 0,
            esperado: true
        }, {
            entrada: 3,
            esperado: false
        }, {
            entrada: 4,
            esperado: true
        }, {
            entrada: 7,
            esperado: false
        }, ];

        for (let i = 0; i < datos.length; i++) {
            it('El número ' + datos[i].entrada + ' deberia ser ' + (datos[i].esperado ? 'par' : 'impar'), () => {
                expect(comprobarEsPar(datos[i].entrada)).toEqual(datos[i].esperado);
            });
        }
    });

    ////////////////////////////////////////////////////////////////////////
    // Crea una función llamada bonoloto() que devuelva un array de 6 números aleatorios no repetidos entre 1 y 49. El array debe estar ordenado.
    // Crea un testeo con Jasmine de bonoloto() que realice las siguientes comprobaciones:

    // Que devuelve un array (1 sola comprobación)


    // Que el array tiene 6 elementos (1 sola comprobación)


    // Que todos los elementos del array son números (1 sola comprobación)


    // Que los eltos del array están ordenados (1000 comprobaciones)


    // Que los eltos del array están comprendidos entre el 1 y 49 (1000 comprobaciones)


    // Que los eltos del array no están repetidos (1000 comprobaciones)


    // Que tras 1000 llamadas a la función han salido todos los números entre el 1 y el 49

});