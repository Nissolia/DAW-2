describe('Testeo del boletín de funciones', () => {
    //versión simple
    ////////////////////////////////////////////////////////////////////////

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
    describe('Testeo de la funcion verCalificacion()', () => {
        const datos = [{
            entrada: 0,
            esperado: 'INSUFICIENTE'
        }, {
            entrada: 5,
            esperado: 'SUFICIENTE'
        }, {
            entrada: 6,
            esperado: 'BIEN'
        }, {
            entrada: 9,
            esperado: 'SOBRESALIENTE'
        }, {
            entrada: -1,
            esperado: 'VALOR INCORRECTO'
        }, ];

        for (let i = 0; i < datos.length; i++) {
            it('El número ' + datos[i].entrada + ' deberia ser ' + (datos[i].esperado), () => {
                expect(verCalificacion(datos[i].entrada)).toEqual(datos[i].esperado);
            });
        }
    });
    ////////////////////////////////////////////////////////////////////////
    describe('Testeo de la funcion verCalificacionDecimal()', () => {
        const datos = [{
            entrada: 0.3,
            esperado: 'INSUFICIENTE'
        }, {
            entrada: 5.9,
            esperado: 'SUFICIENTE'
        }, {
            entrada: 6.2,
            esperado: 'BIEN'
        }, {
            entrada: 10,
            esperado: 'SOBRESALIENTE'
        }, {
            entrada: -1.4,
            esperado: 'VALOR INCORRECTO'
        }, ];

        for (let i = 0; i < datos.length; i++) {
            it('El número ' + datos[i].entrada + ' deberia ser ' + (datos[i].esperado), () => {
                expect(verCalificacionDecimal(datos[i].entrada)).toEqual(datos[i].esperado);
            });

        }
    });
    ////////////////////////////////////////////////////////////////////////
    describe('Testeo de la funcion parametrosCircunferencia()', () => {
        const datos = [{
            radio: 1,
            esperado: {
                perimetro: 6.28,
                area: 3.14
            }
        }, {
            radio: 2,
            esperado: {
                perimetro: 12.56,
                area: 12.56
            }
        }, {
            radio: 3.5,
            esperado: {
                perimetro: 21.99,
                area: 38.48
            }
        }, {
            radio: 0,
            esperado: {
                perimetro: 0,
                area: 0
            }
        }];

        for (let i = 0; i < datos.length; i++) {
            it('El radio ' + datos[i].radio + ' deberia tener un perimetro de ' + datos[i].esperado.perimetro + ' y un área de ' + datos[i].esperado.area, () => {
                //Comprobar por si da fallos
                expect(parametrosCircunferencia(datos[i].radio).perimetro).toEqual(datos[i].esperado.perimetro);
                expect(parametrosCircunferencia(datos[i].radio).area).toEqual(datos[i].esperado.area);
            });
        }
    });
    ////////////////////////////////////////////////////////////////////////
    describe('Testeo de la funcion esBisiesto()', () => {
        const datos = [
            { año: 2000, esperado: true }, 
            { año: 2004, esperado: true }, 
            { año: 1900, esperado: false }, 
            { año: 2001, esperado: false }, 
            { año: 2012, esperado: true }, 
            { año: 2100, esperado: false }, 
            { año: 2020, esperado: true }, 
            { año: 2023, esperado: false }   
        ];
    
        for (let i = 0; i < datos.length; i++) {
            it('El año ' + datos[i].año + ' debería ser ' + (datos[i].esperado ? 'bisiesto' : 'no bisiesto'), () => {
                expect(esBisiesto(datos[i].año)).toEqual(datos[i].esperado);
            });
        }
    });
    ////////////////////////////////////////////////////////////////////////
    describe('Testeo de la funcion hexa2decimal()', () => {
        const datos = [
            { entrada: '0', esperado: 0 },   
            { entrada: '1', esperado: 1 },   
            { entrada: '2', esperado: 2 },   
            { entrada: 'A', esperado: 10 },  
            { entrada: 'f', esperado: 15 },  
            { entrada: '10', esperado: 16 },  
            { entrada: '1A', esperado: 26 },  
            { entrada: '2b', esperado: 43 },  
            { entrada: 'ff', esperado: 255 }, 
            { entrada: '100', esperado: 256 }, 
            { entrada: '7D3', esperado: 2003 },  
            { entrada: 'XYZ', esperado: undefined } 
        ];
    
        for (let i = 0; i < datos.length; i++) {
            it('La cadena hexadecimal ' + datos[i].entrada + ' debería ser ' + datos[i].esperado + ' en decimal', () => {
                if (datos[i].esperado === undefined) {
                    expect(() => hexa2decimal(datos[i].entrada)).toThrowError("Dígito no valido");
                } else {
                    expect(hexa2decimal(datos[i].entrada)).toEqual(datos[i].esperado);
                }
            });
        }

        it('Debe de lanzar un error cuando es un dígito decimal no válido', () => {
            expect(() => hexa2decimal(G)).toThrowError("Dígito no valido");
        });
    });
});