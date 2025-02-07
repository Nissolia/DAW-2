package ej_4POO_b;

public class Factura {
	// ATRIBUTOS
	private int codigo;
	private double cantidad_vendidaL;
	private double precioL;
	private double precioTotal;
	// Lo usamos para crear un ID diferente cada vez que creamos una factura
	private static int contador = 0;

	// CONSTRUCTORES
	public Factura(double cantidad_vendidaL, double precioL) {
		contador++;
		this.codigo = contador;
		this.cantidad_vendidaL = cantidad_vendidaL;
		this.precioL = precioL;
	}

	// GETTERS Y SETTERS
	public int getCodigo() {
		return codigo;
	}

	public double getCantidad_vendidaL() {
		return cantidad_vendidaL;
	}

	public void setCantidad_vendidaL(double cantidad_vendidaL) {
		this.cantidad_vendidaL = cantidad_vendidaL;
	}

	public double getPrecioL() {
		return precioL;
	}

	public void setPrecioL(double precioL) {
		this.precioL = precioL;
	}

	public double getPrecioTotal() {
		return precioTotal;
	}

	public void setPrecioTotal(double precioTotal) {
		this.precioTotal = precioTotal;
	}

	// MÉTODOS
	/*
	 * MÉTODO QUE CALCULA EL TOTAL DE LOS INGRESOS:
	 * PRECIO POR LITRO MULTIPLICADO POR LA CANTIDAD VENDIDA EN LITROS.
	 */
	public double totalIngresos() {
		precioTotal = cantidad_vendidaL * precioL;
		return precioTotal;
	}

	/*
	 * CANTIDAD DE LITROS VENDIDOS DE UN ARTÍCULO
	 */
	public double litroArticulo() {
		return cantidad_vendidaL;
	}

	/*
	 * VERIFICAR SI EL TOTAL DE UNA FACTURA ES MAYOR A 600€
	 */
	public boolean factura600() {
		return getPrecioTotal() > 600;
	}
}
