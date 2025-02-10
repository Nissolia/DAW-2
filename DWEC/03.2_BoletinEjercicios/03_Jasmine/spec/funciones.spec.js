describe('Testeo del boletín del ejercicio 3', () => {
    //////////////////////////////////////////////////////////////////////// areaPiramide
    describe('Testeo de la funcion areaPiramide()', () => {
        const datos = [{
                lado: 6.8,
                altura: 9,
                salidaEsperada: 177.083
            },
            {
                lado: 7.1,
                altura: 9.4,
                salidaEsperada: 193.092
            },
            {
                lado: 7.4,
                altura: 9.8,
                salidaEsperada: 209.793
            }
        ]
        for (let i = 0; i < datos.length; i++) {
            it(datos[i].lado + ' y ' + datos[i].altura + ' deberia dar ' + datos[i].salidaEsperada, () => {
                expect(areaPiramide(datos[i].lado, datos[i].altura)).toBeCloseTo(datos[i].salidaEsperada, 3);

            });
        }

        // se pone de esta forma para que no de el error al comienzo
        it('-2 y 3 deberían lanzar un mensaje de error', () => {
            expect(() => areaPiramide(-2, 3)).toThrowError('Los parámetros de entrada deben tener valores positivos');
        });

        it('3 y -4 deberían lanzar un mensaje de error', () => {
            expect(() => areaPiramide(3, -4)).toThrowError('Los parámetros de entrada deben tener valores positivos');
        });
        // este se usa para ver si es un número
        it("debería devolver un tipo de dato número", () => {
            expect(areaPiramide(7.4, 9.8)).toBeInstanceOf(Number);
        });

    });
});
//////////////////////////////////////////////////////////////////////// filtrarPrimosMayoresOnce
describe('Testeo de la funcion filtrarPrimosMayoresOnce()', () => {
    const datos = [{
            entrada: [6, 11, 18, 43, 8, 5, 45, 53, 9, 7, 24, 23],
            salida: [23, 43, 53]
        },
        {
            entrada: [6, 5, 24, 47, 8, 11, 18, 41, 9, 2, 35, 19],
            salida: [19, 41, 47]
        },
        {
            entrada: [4, 5, 45, 47, 6, 7, 27, 43, 10, 11, 35, 23],
            salida: [23, 43, 47]
        },
        {
            entrada: [9, 11, 20, 23, 6, 3, 24, 17, 8, 5, 14, 47],
            salida: [17, 23, 47]
        },
        {
            entrada: [9, 2, 45, 29, 8, 7, 18, 19, 6, 5, 12, 13],
            salida: [13, 19, 29]
        }
    ];

    for (let i = 0; i < datos.length; i++) {
        it(datos[i].entrada + " debería devolver " + datos[i].salida, () => {
            expect(filtrarPrimosMayoresOnce(datos[i].entrada)).toEqual(datos[i].salida);
        });
    }

    // verificamos que el retorno es de tipo array
    it("La función debe devolver un array", () => {
        const resultado = filtrarPrimosMayoresOnce([6, 11, 18, 43, 8]);
        expect(Array.isArray(resultado)).toBe(true);
    });
});

//////////////////////////////////////////////////////////////////////// numeroDiasFechas
describe('Testeo de la funcion numeroDiasFechas()', () => {
    // Casos de prueba
    const casosDePrueba = [{
            fechaDesde: "9/11/2021",
            fechaHasta: "9/11/2021",
            diasEsperados: 0
        },
        {
            fechaDesde: "28/02/2020",
            fechaHasta: "1/3/2020",
            diasEsperados: 2
        },
        {
            fechaDesde: "28/02/2021",
            fechaHasta: "1/3/2021",
            diasEsperados: 1
        },
        {
            fechaDesde: "17/04/1973",
            fechaHasta: "14/11/1979",
            diasEsperados: 2402
        }
    ];

    // Iterar sobre los casos de prueba
    for (let i = 0; i < casosDePrueba.length; i++) {
        it(`Debería calcular ${casosDePrueba[i].diasEsperados} días entre ${casosDePrueba[i].fechaDesde} y ${casosDePrueba[i].fechaHasta}`, () => {
            expect(numeroDiasFechas(casosDePrueba[i].fechaDesde, casosDePrueba[i].fechaHasta)).toEqual(diasEsperados);
        });
    }

    // Verificar que la función devuelve un número
    it("Debería devolver un número", function () {
        const resultado = numeroDiasFechas("28/02/2020", "1/3/2020");
        expect(resultado).toBe("number");
    });

    // Verificar que lanza un error con una fecha incorrecta
    it("Debería lanzar un error si alguna de las fechas es incorrecta (32/10/2024)", () => {
        expect(() => numeroDiasFechas("32/10/2024", "01/11/2024")).toThrowError("Alguna(s) de las fechas de entrada es incorrecta");
    });

    it("Debería lanzar un error si alguna de las fechas es incorrecta (29/02/2021)", () => {
        expect(() => numeroDiasFechas("29/02/2021", "01/03/2021")).toThrowError("Alguna(s) de las fechas de entrada es incorrecta");
    });

});
//////////////////////////////////////////////////////////////////////// clase Reserva
describe("Testeo de la Clase Reserva", () => {
    // Crear una instancia de la clase Reserva para el cliente especificado
    let reserva;

    beforeEach(function () {
        reserva = new Reserva("García;Ortiz;Juan Antonio", "44958625A", "27/02/2020", "03/03/2020");
    });

    // Comprobar que el código del cliente es el esperado
    it("Debería devolver el código del cliente como JGARCÍA625",() => {
        expect(reserva.codigoCliente).toBe("JGARCÍA625");
    });

    // Comprobar el número de días de estancia
    it("Debería calcular correctamente el número de días de estancia como 5", () => {
        expect(reserva.numeroDiasEstancia).toBe(5);
    });

    // Comprobar el coste total de la estancia
    it("Debería calcular correctamente el coste de la estancia como 151", () => {
        expect(reserva.costeEstancia()).toBe(151);
    });

    // Comprobar que las fechas internas no se modifican al invocar costeEstancia
    it("Las propiedades fechaEntrada y fechaSalida no deben modificarse al invocar costeEstancia", () => {
        const fechaEntradaOriginal = new Date(reserva.fechaEntrada.getTime());
        const fechaSalidaOriginal = new Date(reserva.fechaSalida.getTime());

        reserva.costeEstancia();

        expect(reserva.fechaEntrada.getTime()).toBe(fechaEntradaOriginal.getTime());
        expect(reserva.fechaSalida.getTime()).toBe(fechaSalidaOriginal.getTime());
    });

    // Modificar fechas y verificar el cambio en el número de días de estancia
    it("Debería permitir modificar las fechas y actualizar el número de días de estancia a 2", () => {
        reserva.modificarFechas("28/02/2020", "01/03/2020");
        expect(reserva.numeroDiasEstancia).toBe(2);
    });

    // Validación de errores en modificar fechas
    it("Debería lanzar un error si la fecha de salida es anterior a la de entrada", () => {
        expect(() => reserva.modificarFechas("03/03/2020", "01/03/2020")).toThrowError("Fecha de salida debe ser posterior a la de entrada");
    });

    it("Debería lanzar un error si la estancia es menor a un día", () => {
        expect(() => reserva.modificarFechas("28/02/2020", "28/02/2020")).toThrowError("Estancia mínima debe ser de un día");
    });
});