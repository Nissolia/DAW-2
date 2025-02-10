describe('Testeo de las clases Alumno', () => {
    //nombre: en formato CSV "apellido1; apellido2; nombre"
    // curso: ejemplo "1DAW", "2DAW"
    let alumno1;

    let datos = [
        { entrada: { nombre: "Soldado; Galvín; Fco. Javier", curso: "2DAW", notas: [8.9, 7.1, 10, 9.8], dominio: "iesruizgijon.com" }, salida: { nombrePila: "Fco. Javier", correo: "fj.soldado-galvin@iesruizgijon.com", notaMedia: 9.0 } },
        { entrada: { nombre: "de la Rosa; Núñez ; Juan Alberto", curso: "1DAW", notas: [7.8, 9.1, 3.1, 6.8, 5.0], dominio: "iesruizgijon.com" }, salida: { nombrePila: "Juan Alberto", correo: "ja.delarosa-nunez@iesruizgijon.com", notaMedia: 6.4 } },
        { entrada: { nombre: "Leyva; Ortiz ; Pedro", curso: "2DAW", notas: [9.1, 6.8, 5.0], dominio: "almudeyne.com" }, salida: { nombrePila: "Pedro", correo: "p.leyva-ortiz@almudeyne.com", notaMedia: 7.0 } },

    ];

    describe('Comprobación de propiedad nombrePila', () => {
        datos.forEach(
            item => {
                it(`El nombre de pila de "${item.entrada.nombre}" debería ser ${item.salida.nombrePila}`, () => {
                    alumno1 = new Alumno(item.entrada.nombre, item.entrada.curso, item.entrada.dominio);
                    expect(alumno1.nombrePila).toEqual(item.salida.nombrePila);
                });
            }
        );
    });


    describe('Comprobación de propiedad correo', () => {
        datos.forEach(
            item => {
                it(`El correo de "${item.entrada.nombre}" debería ser ${item.salida.correo}`, () => {
                    alumno1 = new Alumno(item.entrada.nombre, item.entrada.curso, item.entrada.dominio);
                    expect(alumno1.correo).toEqual(item.salida.correo);
                });
            }
        );
    });

    describe('Comprobación del método notaMedia() añadiendo notas de una en una', () => {
        datos.forEach(
            item => {
                it(`La nota media de "${item.entrada.nombre}" debería ser ${item.salida.notaMedia}`, () => {
                    alumno1 = new Alumno(item.entrada.nombre, item.entrada.curso, item.entrada.dominio);
                    item.entrada.notas.forEach(
                        item => { alumno1.añadirNota(item); }
                    );
                    expect(alumno1.notaMedia()).toEqual(item.salida.notaMedia);
                });
            }
        );
    });


    describe('Comprobación del método notaMedia() que debería devolver un número', () => {
        it(`El método notaMedia() debe devolver un número`, () => {
            alumno1 = new Alumno("Soldado; Galvín; Fco. Javier", "2DAW", "iesruizgijon.com");
            alumno1.añadirNota(7.2);
            expect(alumno1.notaMedia()).toBeInstanceOf(Number);
        });
    });

    describe('Comprobación del método notaMedia() que debería devolver un -1 si el alumno no tiene ninguna nota', () => {
        it(`El método notaMedia() debe devolver un -1 si el alumno no tiene notas`, () => {
            alumno1 = new Alumno("Soldado; Galvín; Fco. Javier", "2DAW", "iesruizgijon.com");
            expect(alumno1.notaMedia()).toEqual(-1);
        });
    });

    describe('Comprobación del método notaMedia() que debería redondera a un decimal', () => {
        it(`El método notaMedia() debería redonder la nota media 7.27 a 7.3`, () => {
            alumno1 = new Alumno("Soldado; Galvín; Fco. Javier", "2DAW", "iesruizgijon.com");
            alumno1.añadirNota(7.27);
            expect(alumno1.notaMedia()).toBeCloseTo(7.3,1);
        });
    });


    describe('Comprobación del método notaMedia() añadiendo notas a la vez', () => {
        datos.forEach(
            item => {
                it(`La nota media de "${item.entrada.nombre}" debería ser ${item.salida.notaMedia}`, () => {
                    alumno1 = new Alumno(item.entrada.nombre, item.entrada.curso, item.entrada.dominio);
                    alumno1.añadirNota(...item.entrada.notas); // Usamos el operador spread
                    expect(alumno1.notaMedia()).toEqual(item.salida.notaMedia);
                });
            }
        );
    });




});