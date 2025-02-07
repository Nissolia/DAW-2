describe('Testeo de la funcion para buscar el primer lunes y último domingo del mes', () => {
    // NO SE PUEDE CAMBIAR LA ESTRUCTURA DE LOS DATOS SUMINISTRADOS
    const datos = [{
            entrada: {
                año: 1942,
                mes: 3
            },
            primerLunes: 2,
            ultimoDomingo: 29
        },
        {
            entrada: {
                año: 1946,
                mes: 12
            },
            primerLunes: 2,
            ultimoDomingo: 29
        },
        {
            entrada: {
                año: 1973,
                mes: 4
            },
            primerLunes: 2,
            ultimoDomingo: 29
        },
        {
            entrada: {
                año: 1975,
                mes: 2
            },
            primerLunes: 3,
            ultimoDomingo: 23
        },
        {
            entrada: {
                año: 1996,
                mes: 11
            },
            primerLunes: 4,
            ultimoDomingo: 24
        },
    ];

    // Funcion debe devolver un objeto

    describe('Pruebas de caja negra', () => {
        datos.forEach(elto => {
            it(`Para año ${elto.entrada.año} y mes ${elto.entrada.mes} el primer lunes es ${elto.primerLunes} y último domingo ${elto.ultimoDomingo}`, () => {
                expect(elto.primerLunes).toEqual(primerLunesUltimoDomingo(elto.primerLunes).primerLunes);
                expect(elto.ultimoDomingo).toEqual(primerLunesUltimoDomingo(elto.ultimoDomingo).ultimoDomingo);
            });
        });

    });

    describe('Comprobamos que lanza un error para valores incorrectos en parámetros de entrada', () => {
        it(`Para el mes ${15} debería lanzar un error`, () => {
            expect(() => primerLunesUltimoDomingo(1996, 15)).toThrowError("Mes incorrecto");
        });

    });



});