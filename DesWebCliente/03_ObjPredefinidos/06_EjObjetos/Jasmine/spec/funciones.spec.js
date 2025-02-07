describe("Testeo clase Jarra", function () {
    let jarra1;
    let jarra2;

    beforeEach(function () { // Se ejecuta una vez antes de llamar a cada especificación it
        jarra1 = new Jarra(10, 4);
        jarra2 = new Jarra(15, 8);
        jarra3 = new Jarra(20, 2);
        jarra4 = new Jarra(25, 1);
    });

    it("jarra1 debería tener contener una cantidad no superior a la capacidad", function () {
        jarra1.cantidad = 2 * jarra1.capacidad; //* jarra1.capacidad; // Intentamos cargar más litros de los que caben
        expect(jarra1.cantidad).toEqual(jarra1.capacidad);
    });

    it("jarra1 debería debería devolver una excepción si en cantidad cargamos un valor negativo", function () {
        expect(function () {
            jarra1.cantidad = -5
        }).toThrowError("La cantidad debe ser un número positivo");
    });

    it("jarra1 debería llenarse completamente tras llamar al método llenar()", function () {
        jarra1.llenar();
        expect(jarra1.cantidad).toEqual(jarra1.capacidad);
    });

    it("jarra1 debería quedar vacía tras llamar al método vaciar()", function () {
        jarra1.vaciar();
        expect(jarra1.cantidad).toEqual(0);
    });

    it("Tras llenar jarra1 desde jarra2 la primera debería tener 10l y la segunda 2l", function () {
        jarra1.llenarDesde(jarra2);
        expect(jarra1.cantidad).toEqual(10);
        expect(jarra2.cantidad).toEqual(2);
    });

    it("El método estático comparar(jarra1,jarra2) debería devolver que jarra2 contiene más litros que jarra1", function () {
        let jarraMasListros = Jarra.comparar(jarra1, jarra2);
        expect(jarraMasListros).toEqual(jarra2);
    });

    it("El método de instancia jarrasConMasCantidad(...) debería devolver que un array con jarra2", function () {
        let jarraMasLitros = jarra1.jarrasConMasCantidad(jarra2, jarra3, jarra4);
        expect(jarraMasLitros).toEqual([jarra2]);
    });

});