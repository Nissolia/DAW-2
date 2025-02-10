// Funcion para redondear un numero con un determinado numero de decimales

function redondearDecimales(numero, decimales) {
  return Math.round(numero * Math.pow(10, decimales)) / Math.pow(10, decimales);
}

// Funcion para convertir grados a radianes
function grados2radianes(grados) {
  return grados / 180 * Math.PI;
}
//Como calcular el dia siguiente a una fecha determinada
function diaSiguiente(fecha) {
  fecha.setDate(fecha.getDate() + 1); //29 de febrero de 2020
  // Para ordenador numeros hay que usar una funcion comparadora
  let numeros = [2, 5, 0, 3.5, -2, 12];
  numeros.sort(function (num1, num2) {
    return num1 - num2;
  })
}
// Funcion que comprueba duplicidades en un array

function tieneDuplicados(arr) {
  return arr.some(x => arr.indexOf(x) !== arr.lastIndexOf(x));
}

// Funci�n que comprueba que todos los elementos de un array de n�mero est�n comprendidos entre un valor m�nimo y m�ximo
function compruebaEltosArrayEnRango(array, min, max) {
  return !(array.some(elto => elto > max || elto < min));
}
// Funcion para un número aleatorio
function getRandomInt(max) {
  return Math.floor(Math.random() * max) + 1;
}
// Volcar texto web - solo un parrafo
function volcarTextoWeb(texto) {
  document.querySelector("#contenido").innerHTML = `<p>${texto}</p>`;
}
// Función que nos calculará el perimetro de un cuadrado
function perimetroCuadrado(lado) {
  return lado * 4;
}
// Función que nos calcula el volumen del cilindro
function volumenCilindro(radio, altura) {
  const pi = Math.PI;
  return pi * Math.pow(radio, 2) * altura;
}
// Funcion que nos dice cuantos digitos tiene un string
function digitos(variable) {
  let digits = variable.length;

  return digits;
}
// Funcion para comprobar si el numero es par si da true
function comprobarEsPar(numero) {
  if (numero != parseInt(numero)) throw new Error("Se espera un número entero.");
  return numero % 2 === 0;
}
// 5. Función comprobar si un año es bisiesto
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
// 6. Conversor de hexadecimal a decimal
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
//  area de piramide
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
//  numero de dias segun fecha
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
// es primo
function esPrimo(num) {
  // Comprobamos que el número sea divisible solo entre 1 y él mismo
        let bandera = true;
        for (let i = 2; i < num.length; i++) {
            if (num % i == 0) {
                return false;
            }
        }
        return true;
    }

//////////////////// MANERAS DE ORDENACIÓN
// Ordena las cuentas en el arreglo de menor a mayor saldo
cuentas2.sort((c1, c2) => c1.saldo - c2.saldo);

// Muestra la lista de cuentas ordenada por saldo
console.log("Cuentas ordenadas por saldo:");
cuentas2.forEach(cuenta => console.log(cuenta.toString()));

// Para ordenar alfabeticamente es mejor el localeCompare
cuentas3.sort((c1, c2) => c1.titular.localeCompare(c2.titular));

// Muestra la lista de cuentas ordenada por saldo
console.log("Cuentas ordenadas por titular:");
cuentas3.forEach(cuenta => console.log(cuenta.toString()));

//////////////////// PRUEBA CON TRY CATCH
try {
  cuenta1.extraer(400);
} catch (e) {
  alert(e.message);
}