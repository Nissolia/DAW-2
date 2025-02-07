function calculaMedia() {
    var numeros = [];
    for (var _i = 0; _i < arguments.length; _i++) {
        numeros[_i] = arguments[_i];
    }
    var acumulador = 0;
    var media = 0;
    for (var i = 0; i < numeros.length; i++) {
        acumulador += numeros[i];
    }
    media = acumulador / numeros.length;
    return media;
}
var media = calculaMedia(6.2, 9.1, 3.2, 1.7);
