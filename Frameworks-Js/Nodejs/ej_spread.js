function sumar(valor1, valor2, valor3) {
    return valor1 + valor2 + valor3;
}
const vec = [10, 20, 30];
const s = sumar(...vec);
console.log(s);
