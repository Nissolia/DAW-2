package ej_6Interfaces;

public class Detergente implements esLiquido, ConDescuento {
	private String marca;
	private double precio;
	private int volumen = 500;
	private double descuento;

	// CONSTRUCTOR
	public Detergente(String marca, double precio) {
		this.marca = marca;
		this.precio = precio;
	}
	public Detergente(String marca, double precio, int volumen) {
		this.marca = marca;
		this.precio = precio;
		this.volumen = volumen;
	}

	// GETTERS Y SETTERS
	public String getMarca() {
		return marca;
	}

	public void setMarca(String marca) {
		this.marca = marca;
	}

	public double getPrecio() {
		return precio;
	}

	public void setPrecio(double precio) {
		this.precio = precio;
	}

	// MÉTODOS DE LA INTERFAZ
	@Override
	public void setVolumen(int v) {
		this.volumen = v;
	}

	@Override
	public int getVolumen() {
		return volumen;
	}

	@Override
	public void setDescuento(double des) {
		if (getTipoEnvase().equals("Botella_de_plastico_grande")) {
			this.descuento = 20;
		} else if (getTipoEnvase().equals("Botella_de_plastico_mediana")) {
			this.descuento = 10;
		} else {
			this.descuento = 2.0;
		}
		this.descuento = des;
	}

	@Override
	public double getDescuento() {
		return descuento; // Devuelve el valor del descuento en decimal
	}

	@Override
	public double getPrecioDescuento() {
		// Calcula el precio con el descuento aplicado
		return precio - ((getDescuento() /100)* precio);
	}

	// TO STRING
	@Override
	public String toString() {
		return "Detergente [marca=" + marca + ", precio=" + precio + ", volumen=" + volumen + " ml, tipo de envase="
				+ getTipoEnvase() + ", descuento=" + getDescuento() + "%, precio con descuento=" + getPrecioDescuento()
				+ "]";
	}

	@Override
	public void setTipoEnvase(String env) {
		// TODO Auto-generated method stub
	}

	@Override
	public String getTipoEnvase() {
		String cadena;
		if (volumen <= 5000 && volumen > 2500) {
			cadena = "Botella_de_plastico_grande";
		} else if (volumen <= 2500 && volumen > 500) {
			cadena = "Botella_de_plastico_mediana";
		} else {
			cadena = "Botella_de_plastico_pequeña";
		}
		return cadena;
	}

}
