package GestionVehiculos;

import java.time.LocalDate;

public class Vehiculo {
	private String marca;
	private String modelo;
	private float precio;
	private LocalDate fechaIngreso;
	private int nivelDemanda;
	private boolean vendido;
	private Cliente cliente;

	// constructor
	public Vehiculo(String marca, String modelo, float precio) {
		this.marca = marca;
		this.modelo = modelo;
		this.precio = precio;
		this.fechaIngreso = LocalDate.now();
		this.nivelDemanda = 5;
	}

	// Getters y setters para marca, modelo y precio
	public String getMarca() {
		return marca;
	}

	public void setMarca(String marca) {
		this.marca = marca;
	}

	public String getModelo() {
		return modelo;
	}

	public void setModelo(String modelo) {
		this.modelo = modelo;
	}

	public void setPrecio(float precio) {
		this.precio = precio;
	}

	public Cliente getCliente() {
		return cliente;
	}

	public void setCliente(Cliente cliente) {
		this.cliente = cliente;
	}

	public boolean isVendido() {
		return vendido;
	}

	public void setVendido(boolean vendido) {
		this.vendido = vendido;
	}

	public void ajustarPrecio() {
		long diasEnInventario = java.time.temporal.ChronoUnit.DAYS.between(fechaIngreso, LocalDate.now());

		// Descuento en base a tiempo en inventario
		if (diasEnInventario > 30) {
			precio *= 0.9; // Descuento del 10% si lleva más de 30 días
		}

		// Ajuste de precio en base a demanda
		if (nivelDemanda < 3) {
			precio *= 0.95; // Descuento adicional del 5% si la demanda es baja
		} else if (nivelDemanda > 7) {
			precio *= 1.05; // Incremento del 5% si la demanda es alta
		}
	}

	public void vender(Cliente cliente) {
		this.setVendido(true);
		this.setCliente(cliente);
	}

	public void setNivelDemanda(int nivelDemanda) {
		this.nivelDemanda = nivelDemanda;
	}

	public float getPrecio() {
		ajustarPrecio(); // Aplicar el descuento antes de devolver el precio
		return precio;
	}

	// Método toString
	@Override
	public String toString() {
		return "Vehiculo [marca=" + marca + ", modelo=" + modelo + ", precio=" + precio + "]";
	}

}