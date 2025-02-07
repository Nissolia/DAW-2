class Factura {
    // Escribe aquí tu código
    constructor(codigo, fecha, cliente) {
        this._codigo = codigo;
        this._fecha = fecha;
        this._nombre = cliente.nombre;
        this._dni = cliente.dni;
        this._articulo = [];
    }
    // Get para conseguir la letra del cliente
    get letraDNICliente() {

        let letra = (this._dni).charAt(this._dni.length - 1);
        return letra;
    }
    // get para conseguir el nombre del cliente
    get nombreCliente() {
        let nombreCliente = this._nombre;
        return nombreCliente;
    }
    // creamos añadir articulo
    añadirArticulo(items) {
        for (let i = 0; i < items.length; i++) {
            items.forEach(elto => {
                this._articulo.push(elto[i]);
            });
        }

    }
    // totalFactura
    totalFactura() {
        let total = 0;
        for (let i = 0; i < this._articulo.length; i++) {
            total = total + this._articulo[i].cantidad * this._articulo[i].precio;
        }
        return total;
    }
    // busqueda de articulos
    buscarArticulos(pl) {
        let palabra = pl.toLocaleLowerCase();
        let encontrados = [];
        this._articulo.forEach(artcl => {
            if (artcl.includes(palabra)) {
                encontrados.push(artcl.codigo);
            }
        });

        return encontrados;
    }
}