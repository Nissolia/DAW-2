package Apartado1_2proyectovehiculosmejorado;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

@Component
public class NaveEspacial implements VehiculoMejorado{
	private PasajerosExtra pasajerosExtra_NaveDos; //Inyectándose desde la Interface
	public NaveEspacial() {}
	//Apartado 1.2.6
	@Autowired	
	public void setPasajerosExtra_NaveDos(PasajerosExtra pasajerosExtra_NaveDos) {
		this.pasajerosExtra_NaveDos = pasajerosExtra_NaveDos;
	}


	@Override
	public String getNombre() {
		return "Halcón Milenario tiene un total de "+this.getNumPasajeros()+ " astronautas.";
	}

	@Override
	public int getNumPasajeros() {
		return pasajerosExtra_NaveDos.getPasajerosExtra()+numPasajeros;
		}

	//Apartado 1.2.5
	
		/*Comentado para el apartado 1.2.6
		@Autowired
		public NaveEspacial(PasajerosExtra pasajerosExtra_NaveDos) {
			super();
			this.pasajerosExtra_NaveDos = pasajerosExtra_NaveDos;
		}
	*/
		
	
}
