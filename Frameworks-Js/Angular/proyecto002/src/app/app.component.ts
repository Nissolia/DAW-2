import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  standalone: false,
  styleUrl: './app.component.css'
})
export class AppComponent {
  // title = 'proyecto002';
  productos = [
    { codigo: 1, descripcion: 'Patatas', precio: 2.5 },
    { codigo: 2, descripcion: 'Chocolate', precio: 3 },
    { codigo: 3, descripcion: 'Leche', precio: 1.4 }
  ];
  nuevoCodigo = 0;
  nuevaDescripcion = '';
  nuevoPrecio = 0;
  productoSeleccionado: any = null;

  agregarProducto() {
    if (this.nuevoCodigo && this.nuevaDescripcion && this.nuevoPrecio) {
      this.productos.push({ codigo: this.nuevoCodigo, descripcion: this.nuevaDescripcion, precio: this.nuevoPrecio });
      this.limpiarFormulario();
    }
  }

  seleccionarProducto(producto: any) {
    this.productoSeleccionado = producto;
    this.nuevoCodigo = producto.codigo;
    this.nuevaDescripcion = producto.descripcion;
    this.nuevoPrecio = producto.precio;
  }

  modificarProducto() {
    if (this.productoSeleccionado) {
      this.productoSeleccionado.codigo = this.nuevoCodigo;
      this.productoSeleccionado.descripcion = this.nuevaDescripcion;
      this.productoSeleccionado.precio = this.nuevoPrecio;
      this.limpiarFormulario();
    }
  }

  eliminarProducto(codigo: number) {
    this.productos = this.productos.filter(p => p.codigo !== codigo);
    if (this.productoSeleccionado?.codigo === codigo) {
      this.limpiarFormulario();
    }
  }

  limpiarFormulario() {
    this.nuevoCodigo = 0;
    this.nuevaDescripcion = '';
    this.nuevoPrecio = 0;
    this.productoSeleccionado = null;
  }
}
