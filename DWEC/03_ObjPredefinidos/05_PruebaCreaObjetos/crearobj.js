class Persona {

    constructor(nombre,edad){
          this._nombre = nombre;
          this._edad= edad;
  }
  
    cumplirAños(){
          this._edad++;
    }
  
  get edad(){
         return this._edad;
  }
  
  set edad(años) {
         if(años>=0) this._edad = años;
      else throw new Error("La edad deber ser mayor o igual a 0");
  }
  
   toString(){
        return `${this._nombre} , ${this._edad} años`;
   }
  
  }



// Dentro de la etiqueta script va el código en JavaScript
function diHola() {



}

function crearPersonaPrueba() {
    //creamos un objeto persona
    let persona1 = {
        //se puede añadir todo lo que uno quiera dentro
        nombre: "Maria",
        edad: 14,
        notas: [8.1, 7.5, 5.2],
        fumador: false,
        fechaMatriculacion: new Date(2023, 8, 5),
        // para un metodo anónimo hay que ponerlo así
        cumplirAnios: function () {
            this.edad++;
        }, //asi se llaman dentro de un metodo
        toString: function () {
            return `${this.nombre} edad:${this.edad}`
        }
    }
}
///////////////////////////////////////////////////7
// Función para volvar contenido a la página web
function volcarTextoWeb(texto) {
    document.querySelector("#contenido").insertAdjacentHTML('beforeend', `<p>${texto}</p>`);
}