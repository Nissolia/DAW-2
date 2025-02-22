import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms'; // <-- Asegúrate de que esto está presente

import { AppComponent } from './app.component';
import { DadoComponent } from './dado/dado.component';

@NgModule({
  declarations: [
    AppComponent,
    DadoComponent
  ],
  imports: [
    BrowserModule,
    FormsModule // <-- Esto es clave para que ngModel funcione
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
