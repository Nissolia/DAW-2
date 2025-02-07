function calculaMedia(...numeros) {
    let acumulador = 0;
    let media = 0;
    for (let i = 0; i < numeros.length; i++) {
        acumulador += numeros[i];
    }
    media = acumulador / numeros.length;
    return media;
}
let media = calculaMedia(6.2, 9.1, 3.2, 1.7);
