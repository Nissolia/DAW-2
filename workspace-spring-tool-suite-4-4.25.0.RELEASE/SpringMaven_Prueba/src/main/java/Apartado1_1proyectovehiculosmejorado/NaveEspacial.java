package Apartado1_1proyectovehiculosmejorado;

import org.springframework.stereotype.Component;

@Component
public class NaveEspacial implements VehiculoMejorado{

	@Override
	public String getNombre() {
		return "Halcón Milenario tiene un total de "+(this.getNumPasajeros()+numPasajeros)+" astronautas.";
	}

	@Override
	public int getNumPasajeros() {
		return 4;
	}

	@Override
	public String toString() {
		return "Halcón Milenario tiene un total de "+(this.getNumPasajeros()+numPasajeros)+" astronautas.";

	}

}
