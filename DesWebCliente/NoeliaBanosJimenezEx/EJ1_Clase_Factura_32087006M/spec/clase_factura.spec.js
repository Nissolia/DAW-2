describe('Testeo de la clase Factura', () => {

    let factura1;
    let factura2;
    let cliente1 = { nombre: "Javier Soldado", dni: "72772334J" };
    let articulos1 = [
        { codigo: "A732", descripcion: "Grifo fregadero", cantidad: 2, precio: 29.19 },
        { codigo: "A735", descripcion: "Grifo eléctrico baño", cantidad: 3, precio: 32.92 },
        { codigo: "A730", descripcion: "Termo eléctrico 80 litros", cantidad: 1, precio: 152.22 },
        { codigo: "A735", descripcion: "Termo eléctrico 40 litros", cantidad: 2, precio: 88.12 },
    ];
    let totalFactura1 = 0;
    articulos1.forEach(
        (item) => { totalFactura1 += item.cantidad * item.precio; }
    );
    let palabraBuscar1 = "grifo";
    let busqueda1 = articulos1.filter((item) => item.descripcion.toLowerCase().includes(palabraBuscar1)).map((item) => item.codigo);
    let palabraBuscar2 = "eléctrico";
    let busqueda2 = articulos1.filter((item) => item.descripcion.toLowerCase().includes(palabraBuscar2)).map((item) => item.codigo);

    beforeEach(() => {
        factura1 = new Factura("B1233", "17/4/2024", cliente1);
        // Añadimos los artículos
        articulos1.forEach(
            (item) => { factura1.añadirArticulo(item); }
        );
    });

    it(`El getter nombreCliente debería devolver ${cliente1.nombre}`, () => {
        expect(factura1.nombreCliente).toEqual(cliente1.nombre);
     
    });

    it(`El getter letraDNICLiente debería devolver ${cliente1.dni.at(-1)}`, () => {
        expect(factura1.letraDNICliente).toEqual(cliente1.dni.at(-1));
    });

    describe('Comprobación del método totalFactura() añadiendo los artículos de uno en uno', () => {
        it(`El métoto totalFactura() de la factura debería devolver ${totalFactura1}`, () => {
            expect(factura1.totalFactura()).toEqual(totalFactura1);
        });
    });
 
    describe('Comprobación del método de búsqueda', () => {
        it(`La búsqueda de artículos con la palabra ${palabraBuscar1} debería devolver [${busqueda1}]`, () => {
            expect(factura1.buscarArticulos(palabraBuscar1)).toEqual(busqueda1);
        });
        it(`La búsqueda de artículos con la palabra ${palabraBuscar2} debería devolver [${busqueda2}]`, () => {
            expect(factura1.buscarArticulos(palabraBuscar2)).toEqual(busqueda2);
        });
    });

    describe('Comprobación del método totalFactura() añadiendo todos los artículos a la vez', () => {
        it(`El métoto totalFactura() de la factura debería devolver ${totalFactura1}`, () => {
            factura2 = new Factura("B1234", "18/4/2024", cliente1);
            factura2.añadirArticulo(...articulos1);
            expect(factura2.totalFactura()).toEqual(totalFactura1);
        });
    });


});