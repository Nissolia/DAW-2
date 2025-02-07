package ej_6Interfaces;

import java.time.LocalDate;

public class Vino implements ConDescuento, EsAlimento {
	// recibe botella de vino
	String tipoVino;
	double gradosAlcohol;
	double precio;
	double descuento;
	LocalDate caducidad;

	// CONSTRUCTORES
	public Vino(String tipoVino, double gradosAlcohol, double precio) {
		super();
		this.tipoVino = tipoVino;
		this.gradosAlcohol = gradosAlcohol;
		this.precio = precio;
	}
	// GETTERS Y SETTERS

	public String getTipoVino() {
		return tipoVino;
	}

	public void setTipoVino(String tipoVino) {
		this.tipoVino = tipoVino;
	}

	public double getGradosAlcohol() {
		return gradosAlcohol;
	}

	public void setGradosAlcohol(double gradosAlcohol) {
		this.gradosAlcohol = gradosAlcohol;
	}

	public double getPrecio() {
		return precio;
	}

	public void setPrecio(double precio) {
		this.precio = precio;
	}

// INTERFACE METHODS
	@Override
	public void setDescuento(double des) {
		if (gradosAlcohol <= 3) {
			this.descuento = 20;
		} else if (gradosAlcohol <= 9) {
			this.descuento = 10;
		} else if (gradosAlcohol <= 12) {
			this.descuento = 5;
		} else {
			this.descuento = 0;
		}
	}

	@Override
	public double getDescuento() {
		// TODO Auto-generated method stub
		return 0;
	}

	@Override
	public double getPrecioDescuento() {
		// TODO Auto-generated method stub
		return 0;
	}

	// interfaz es alimento
	@Override
	public void setCaducidad(LocalDate fc) {
		LocalDate hoy = LocalDate.now();
		this.caducidad = hoy.plusDays(100);

	}

	@Override
	public LocalDate getCaducidad() {
		setCaducidad(LocalDate.now());
		return caducidad;
	}

	@Override
	public double getCalorias() {
		return gradosAlcohol * 10;
	}
// tostring

	@Override
	public String toString() {
		return "Vino [tipoVino=" + tipoVino + ", gradosAlcohol=" + gradosAlcohol + ", precio=" + precio
				+ ", descuento=" + getDescuento() + ", precioDescuento="
				+ getPrecioDescuento() + ", caducidad=" + getCaducidad() + ", calorias=" + getCalorias()
				+ "]";
	}
	public static boolean esPrimo(int numero) {
	    if (numero <= 1 || numero % 2 == 0) {
	        return false;
	    }

	    if (numero == 2) {
	        return true;
	    }

	    for (int i = 3; i <= numero; i += 2) {
	        if (numero % i == 0) {
	            return false; 
	        }
	    }

	    return true; 
	}

}
