describe('Testeo de la función parsearFechaHora()', () => {

    const datos = [
      { entrada: "17/4/1973 1:05:00 pm", salidaEsperada: new Date(1973, 3, 17, 13, 5, 0) },
      { entrada: "4/11/2024 8:15:10 pm", salidaEsperada: new Date(2024, 10, 4, 20, 15, 10) },
      { entrada: "23/2/1975 3:55:30 am", salidaEsperada: new Date(1975, 1, 23, 3, 55, 30) },
      { entrada: "14/3/1942 12:15:10 pm", salidaEsperada: new Date(1942, 2, 14, 12, 15, 10) },
      { entrada: "14/3/1942 12:15:10 am", salidaEsperada: new Date(1942, 2, 14, 0, 15, 10) },
    ];
  
    describe('Comprobación de caja negra', () => {
      datos.forEach((item) => {
        it(`Para la fecha "${item.entrada}" debería devolver ${item.salidaEsperada}`, () => {
          const fecha = parsearFechaHora(item.entrada);
          expect(fecha.getFullYear()).toBe(item.salidaEsperada.getFullYear());
          expect(fecha.getMonth()).toBe(item.salidaEsperada.getMonth());
          expect(fecha.getDate()).toBe(item.salidaEsperada.getDate());
          expect(fecha.getHours()).toBe(item.salidaEsperada.getHours());
          expect(fecha.getMinutes()).toBe(item.salidaEsperada.getMinutes());
          expect(fecha.getSeconds()).toBe(item.salidaEsperada.getSeconds());
        });
      });
    });
  
    describe('Comprobación del lanzamiento de errores', () => {
      it('Debería lanzar un error si se usa algo distinto a am o pm', () => {
        expect(() => parsearFechaHora("17/4/1973 1:05:00 xy")).toThrowError("Formato de fecha y hora no válido.");
      });
    });
  
    describe('Comprobación de que la función devuelve un objeto Date', () => {
      it('Debería devolver un objeto Date', () => {
        const fecha = parsearFechaHora("17/4/1973 1:05:00 pm");
        expect(fecha).toBeInstanceOf(Date);
      });
    });
  
  });
  