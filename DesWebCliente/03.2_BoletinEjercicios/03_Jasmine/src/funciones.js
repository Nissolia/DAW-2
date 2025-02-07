//////////////////////////////// Redondear decimales
function redondearDecimales(numero, decimales) {
    return Math.round(numero * Math.pow(10, decimales)) / Math.pow(10, decimales);
}
//////////////////////////////// 
function areaPiramide(lado, altura) {
    let area = 0;
    // si es negativo en cualquiera de los dos salta el error
    if (lado <= 0 || altura <= 0) {
        throw new Error('Los parámetros de entrada deben tener valores positivos');
    } else {
        area = lado * (lado + Math.sqrt(4 * Math.pow(altura, 2) + Math.pow(lado, 2)));
    }
    return redondearDecimales(area, 5);
}

//////////////////////////////// 
function filtrarPrimosMayoresOnce(array) {
    function esPrimo(num) {
        // comprobamos que sean divisibles solo entre sí y por si mismos
        let numero = 0;
        let bandera = true;
        for (let i = 2; i < num.length; i++) {
            if (num % i == 0) {
                return false;
            }
        }
        return true;
    }

    // filtrar los números primos mayores que 11
    const primosMayoresOnce = array.filter(num => num > 11 && esPrimo(num));

    // ordenar de menor a mayor y devolver el array filtrado, para arrays siempre hacerlo de esta forma
    return primosMayoresOnce.sort((n1, n2) => n1 - n2);
}

//////////////////////////////// 
function numeroDiasFechas(fechaDesde, fechaHasta) {
    // new Date(dd,mm,yyyy)
    function validarFecha(fecha) {
        // tamaño de los caracteres
        let partes = parseInt(fecha.split('/'));
        let dia = partes[0];
        let mes = partes[1];
        let anio = partes[2];

        let fechaValida = new Date(anio, mes - 1, dia);
        return fechaValida;
    }

    // Parsear las fechas
    const fecha1 = validarFecha(fechaDesde);
    const fecha2 = validarFecha(fechaHasta);

    const MLS_DIAS = 24 * 60 * 60 * 1000;
    // Calcular la diferencia en días
    let diferencia = fecha2.getTime() - fecha1.getTime();
    return Math.round(diferencia / MLS_DIAS);
}

//////////////////////////////// 
class Reserva {
    constructor(nombreCompleto, dni, fechaEntrada, fechaSalida) {
        this.nombreCompleto = nombreCompleto;
        this.dni = dni;
        this.fechaEntrada = this.validarFecha(fechaEntrada);
        this.fechaSalida = this.validarFecha(fechaSalida);

        if (this.fechaSalida <= this.fechaEntrada) {
            throw new Error("Fecha de salida debe ser siguiente a la de entrada");
        }
    }

    // Getter 
    // modificarlo
    get codigoCliente() {
        let primerDelimitador = this.nombreCompleto.indexOf(";");
        let segundoDelimitador = this.nombreCompleto.indexOf(";", primerDelimitador + 1);
        let apellido1 = this.nombreCompleto.substring(0, primerDelimitador);
        let nombrePila = this.nombreCompleto.substring(segundoDelimitador + 1, segundoDelimitador + 2);
        let dniFinal = dni.substr(dni.length - 4, 3);

        return (nombrePila + apellido1 + dniFinal).toUpperCase();
    }
    get nombrePila() {
        let nombre = this_nombreCompleto;
        let pila = nombre.slice(";")[2].trim();
        return pila;

    }
    // Getter para el número de días de estancia
    get numeroDiasEstancia() {
        // Parsear las fechas
        const fecha1 = validarFecha(this.fechaEntrada);
        const fecha2 = validarFecha(this.fechaSalida);

        const MLS_DIAS = 24 * 60 * 60 * 1000;
        // Calcular la diferencia en días

        const diferencia = (this.fechaSalida - this.fechaEntrada);
        return Math.round(diferencia / MLS_DIAS);
    }

    // Método para modificar fechas de entrada y salida
    modificarFechas(fechaNuevaEntrada, fechaNuevaSalida) {
        const nuevaEntrada = this.validarFecha(fechaNuevaEntrada);
        const nuevaSalida = this.validarFecha(fechaNuevaSalida);

        if (nuevaSalida <= nuevaEntrada) {
            throw new Error("Fecha de salida debe ser posterior a la de entrada");
        }
        if ((nuevaSalida - nuevaEntrada) < (1000 * 60 * 60 * 24)) {
            throw new Error("Estancia mínima debe ser de un día");
        }

        this.fechaEntrada = nuevaEntrada;
        this.fechaSalida = nuevaSalida;
    }

    // Método para calcular el coste de la estancia
    costeEstancia() {
        let costeTotal = 0;
        let fechaActual = new Date(this.fechaEntrada);

        while (fechaActual < this.fechaSalida) {
            const diaSemana = fechaActual.getDay();

            if (diaSemana >= 1 && diaSemana <= 5) {
                costeTotal += 24;
            } else if (diaSemana === 6) {
                costeTotal += 36;
            } else {
                costeTotal += 43;
            }
            fechaActual.setDate(fechaActual.getDate() + 1);
        }
        return costeTotal;
    }

    // Método privado para parsear y validar fechas
    //al ponerlo estático, 
   static validarFecha(fecha) {
        // tamaño de los caracteres
        let partes = parseInt(fecha.split('/'));
        let dia = partes[0];
        let mes = partes[1];
        let anio = partes[2];

        let fechaValida = new Date(anio, mes - 1, dia);
        return fechaValida;
    }
}