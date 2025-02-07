package Apartado1_6proyectovehiculosmejorado;

public class TransbordadorEspacialConAnotacionBean implements VehiculoMejorado{

	private PasajerosExtra pasajerosExtra_NaveDos; //Inyectándose desde la Interface
	
	
	
	public TransbordadorEspacialConAnotacionBean(PasajerosExtra pasajerosExtra_NaveDos) {
		super();
		this.pasajerosExtra_NaveDos = pasajerosExtra_NaveDos;
	}

	@Override
	public String getNombre() {
		return "Challenger";
	}

	@Override
	public int getNumPasajeros() {
		return 6+ pasajerosExtra_NaveDos.getPasajerosExtra();
	}

}
