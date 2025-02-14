import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  standalone: false,
  styleUrl: './app.component.css',
})
export class AppComponent {
  // podemos crear variables
  title = 'proyecto001';
  nombre = 'Noelia';
  edad = 21;
  fumador = false;
  sueldos = [1233, 1200, 1900];
  apellido: string = 'Baños';
  //literal de objeto
  provincias = [
    { id: 1, nombre: 'Huelva' },
    { id: 2, nombre: 'Sevilla' },
    { id: 3, nombre: 'Cádiz' },
    { id: 4, nombre: 'Málaga' },
    { id: 5, nombre: 'Córdoba' },
    { id: 6, nombre: 'Almería' },
  ];

  contador = 0;
  // se pueden hacer también métodos
  esFumador() {
    return this.fumador ? 'Esta persona fuma.' : 'Esta persona no fuma';
  }
  diHola() {
    alert('¡Hola!');
  }
  // funciones para el contador
  incrementar() {
    this.contador++;
  }
  decrementar() {
    this.contador--;
  }
}
