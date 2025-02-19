import { Component, OnInit } from '@angular/core';
// Le garantizamos a typescript que existe $
declare var $: any; 

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  standalone: false,
  styleUrl: './app.component.css'
})
export class AppComponent implements OnInit {
  title = 'proyecto038';

  ngOnInit(): void {
    $('[data-bs-toggle="popover"]').popover();
 }

 aceptar(){
  alert("Ha pulsado Aceptar!");
}

cancelar(){
  alert("Ha pulsado Cancelar!");
}

}
