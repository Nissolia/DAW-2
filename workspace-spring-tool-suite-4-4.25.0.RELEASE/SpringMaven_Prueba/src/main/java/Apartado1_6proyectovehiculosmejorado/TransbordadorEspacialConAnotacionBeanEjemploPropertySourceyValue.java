package Apartado1_6proyectovehiculosmejorado;

import org.springframework.beans.factory.annotation.Value;

public class TransbordadorEspacialConAnotacionBeanEjemploPropertySourceyValue implements VehiculoMejorado{

	private PasajerosExtra pasajerosExtra_NaveDos; //Inyectándose desde la Interface
	@Value("${velocidad}")
	private String velocidad;
	@Value("${precio}")
	private double precio;
	
	
	public String getVelocidad() {
		return velocidad;
	}

	public double getPrecio() {
		return precio;
	}

	public TransbordadorEspacialConAnotacionBeanEjemploPropertySourceyValue(PasajerosExtra pasajerosExtra_NaveDos) {
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
