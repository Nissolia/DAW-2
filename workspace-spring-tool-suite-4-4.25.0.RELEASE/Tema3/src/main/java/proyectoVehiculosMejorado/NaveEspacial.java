package proyectoVehiculosMejorado;

import org.springframework.stereotype.Component;

@Component
public class NaveEspacial implements VehiculoMejorado {
	int pasajeros;

	@Override
	public String getNombre() {

		return "Halcón Milenario";
	}

	@Override
	public int getNumPasajeros() {
		pasajeros = numPasajeros;
		return pasajeros;
	}
	@Override
	public String toString() {
		// TODO Auto-generated method stub
		return getNombre() + " tiene un total de " + getNumPasajeros() + " pasajeros.";
	}

}
