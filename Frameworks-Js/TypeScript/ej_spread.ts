function sumar(valor1?:number, valor2?:number, valor3?:number):number {
  return valor1+valor2+valor3;
}

const vec:number[]=[10,20,30];
const s=sumar(...vec);
console.log(s);