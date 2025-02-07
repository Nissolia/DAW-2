package ej_6Interfaces;

import java.time.LocalDate;

public class Cereales implements EsAlimento {
	String marca;
	double precio;
	tipoCereal cerealTipo;
	int calorias;
	String nombreCereal;
	LocalDate caducidad;
// CONSTRUCTOR

	public Cereales(String marca, double precio, tipoCereal cereal) {
		this.marca = marca;
		this.precio = precio;
		switch (cereal) {
		case AVENA:
			nombreCereal="avena";
			this.calorias = 5;
			break;
		case MAIZ:
			nombreCereal="maiz";
			this.calorias = 8;
			break;
		case TRIGO:
			nombreCereal="trigo";
			this.calorias = 12;
			break;
		default:
			nombreCereal="otro";
			calorias = 15;
		}
		this.cerealTipo = cereal;
	}

	
	//GETTER Y SETTERS
	void setCereal(String string) {
		// TODO Auto-generated method stub

	}

	// MÉTODOS DE : ES ALIMENTO
	@Override
	public void setCaducidad(LocalDate fc) {
		fc = LocalDate.now();
	this.caducidad = fc.plusDays(20);
	}

	@Override
	public LocalDate getCaducidad() {
		setCaducidad(LocalDate.now());
		return caducidad;
	}

	@Override
	public double getCalorias() {
		return calorias;
	}


	@Override
	public String toString() {
		return "Cereales [marca=" + marca + ", precio=" + precio  + ", calorias="
				+ calorias + ", nombreCereal=" + nombreCereal + ", caducidad=" + getCaducidad()
				+ ", calorias=" + getCalorias() + "]";
	}
	

}
