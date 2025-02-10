//////////////////////////////// 1. Función comprobar si un número es par	
// Funcion para comprobar si el numero es par si da true
function comprobarEsPar(numero) {
    if (numero != Math.trunc(numero)) throw new Error("Se espera un número entero.");// para detectar que un número sea entero
    return numero % 2 === 0;
}

//////////////////////////////// 2. Función calificación con nota entera
// funcion para ver la calificacion que tenemos en total
function verCalificacion(nota) {
    switch (nota) {
        case 0:
        case 1:
        case 2:
        case 3:
        case 4:
            return "INSUFICIENTE";
        case 5:
            return "SUFICIENTE";
        case 6:
            return "BIEN";
        case 7:
        case 8:
            return "NOTABLE";
        case 9:
        case 10:
            return "SOBRESALIENTE";
        default:
            return "VALOR INCORRECTO";
    }
}
//////////////////////////////// 3. Función calificación con nota decimal	
// funcion calificacion decimal
function verCalificacionDecimal(nota) {
    if (nota >= 0 && nota <= 4) {
        return "INSUFICIENTE";
    } else if (nota >= 5 && nota < 6) {
        return "SUFICIENTE";
    } else if (nota >= 6 && nota < 7) {
        return "BIEN";
    } else if (nota >= 7 && nota < 9) {
        return "NOTABLE";
    } else if (nota >= 9 && nota <= 10) {
        return "SOBRESALIENTE";
    
    } else {
        return "VALOR INCORRECTO";
    }
}

//////////////////////////////// 4. Calcular perímetro y área de una circunferencia	2
function parametrosCircunferencia(radio) {
    let perimetro = 2 * Math.PI * radio;
    let area = Math.PI * Math.pow(radio, 2);
    // devolvemos un objeto
    return {
        perimetro: redondearDecimales(perimetro,2) ,
        area: redondearDecimales(area,2)
    }
}
//////////////////////////////// 5. Función comprobar si un año es bisiesto
function esBisiesto(numero) {
    if (numero % 4 === 0) {
        if (numero % 100 === 0) {
            if (numero % 400 === 0) {
                // Es bisiesto
                return true;
            } else {
                // No es bisiesto
                return false;
            }
        } else {
            // Es bisiesto
            return true;
        }
    } else {
        // No es bisiesto
        return false;
    }
}

//////////////////////////////// 6. Conversor de hexadecimal a decimal
function hexa2decimal(cadena) {
    let numFinal = 0;
    let arrayCadena = [];

    // Recorremos la cadena en sentido inverso para tener el dígito menos significativo al final
    for (let i = 0; i < cadena.length; i++) {
        arrayCadena.push(cadena[i].toUpperCase());
        // Convertimos el dígito hexadecimal a decimal y aplicamos la potencia de 16
        numFinal += digitoHexa2Dec(arrayCadena[i]) * Math.pow(16, cadena.length - 1 - i);
    }
    console.log('numFinal', numFinal);
    return numFinal;
}
// Función para convertir un dígito hexadecimal a decimal
function digitoHexa2Dec(caracter) {
    switch (caracter) {
        case "0":
            return 0;
        case "1":
            return 1;
        case "2":
            return 2;
        case "3":
            return 3;
        case "4":
            return 4;
        case "5":
            return 5;
        case "6":
            return 6;
        case "7":
            return 7;
        case "8":
            return 8;
        case "9":
            return 9;
        case "A":
            return 10;
        case "B":
            return 11;
        case "C":
            return 12;
        case "D":
            return 13;
        case "E":
            return 14;
        case "F":
            return 15;
        default:
            throw new Error("Dígito no valido");
            return -1;
    }
}

// redondear decimales
function redondearDecimales(numero, decimales) {
    return Math.round(numero * Math.pow(10, decimales)) / Math.pow(10, decimales);
}
//Mostrar texto en el div
function volcarTextoWeb(texto) {
    document.querySelector("#contenido").insertAdjacentHTML('beforeend', `<p>${texto}</p>`);
}