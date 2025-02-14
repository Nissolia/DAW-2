import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  standalone: false,
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'proyecto001';
  nombre = "Noelia";
  edad = 21;
  fumador = false;
  sueldos = [1233,1200,1900];
  apellido : string = 'Baños';

  esFumador(){
    return this.fumador?"Esta persona fuma.":"Esta persona no fuma";
  }
}
