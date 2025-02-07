package ej_4POO_c;

public class Factura_a {
	// ATRIBUTOS
	private int codigo;
	private double cantidad_vendidaL;
	private double precioL;
	private double precioTotal;
	// Contador para hacer ID dinámica
	private static int contador = 0;

	// CONSTRUCTORES
	public Factura_a(double cantidad_vendidaL) {
		contador++;
		this.codigo = contador;
		this.cantidad_vendidaL = cantidad_vendidaL;
		this.precioL = asignarPrecioPorProducto(codigo);
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
	
	public double getPrecioTotal() {
		return precioTotal;
	}

	public void setPrecioTotal(double precioTotal) {
		this.precioTotal = precioTotal;
	}

	// MÉTODOS
	/*
	 * MÉTODO PARA ASIGNAR EL PRECIO SEGÚN EL CÓDIGO DEL PRODUCTO
	 */
	private double asignarPrecioPorProducto(int codigo) {
		//Mejor forma para usar el método enum
		if (codigo == (Precios.PRECIO1.ordinal()+1)) {
			return 0.6;
		}else if (codigo == (Precios.PRECIO2.ordinal()+1)) {
			return 3.0;
		}else if (codigo == (Precios.PRECIO3.ordinal()+1)) {
			return 1.25;
		}else {
			return 0.0;
		}

	}

	/*
	 * MÉTODO QUE CALCULA EL TOTAL DE LOS INGRESOS: PRECIO POR LITRO MULTIPLICADO
	 * POR LA CANTIDAD VENDIDA EN LITROS.
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
