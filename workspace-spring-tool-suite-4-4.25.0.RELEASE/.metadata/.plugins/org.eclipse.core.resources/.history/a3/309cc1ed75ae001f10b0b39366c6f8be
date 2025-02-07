package proyectoVehiculos2;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.stereotype.Component;

@Component
public class NaveEspacial implements VehiculoMejorado {
	private PasajerosExtra pasajerosExtra_naveDos;
	
	public NaveEspacial() {
		
	}
	
	@Autowired
	@Qualifier("transporteAuxiliarDos_Qualifier")
	public void setPasajerosExtra_naveDos(PasajerosExtra pasajerosExtra_naveDos) {
		this.pasajerosExtra_naveDos = pasajerosExtra_naveDos;
	}
	
	
	@Override
	public String getNombre() {
		return "Halcón Milenario";
	}

	public int getNumPasajeros() {
		return pasajerosExtra_naveDos.getPasajerosExtra() + numPasajeros;
	}

	@Override
	public String toString() {
		return getNombre() + " tiene un total de " + getNumPasajeros() + " pasajeros.";
	}

}
