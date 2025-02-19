import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-dado',
  standalone: false,
  templateUrl: './dado.component.html',
  styleUrl: './dado.component.css',
})
export class DadoComponent {
  valor: number = 1;
  // por si hay valor que luego sustituiremos
  // valor!: number
  // @Input() valor: number | undefined;

  constructor() {
    this.valor = this.generaAleatorio();
  }

  generaAleatorio() {
    return Math.floor(Math.random() * 6) + 1;
  }
}
