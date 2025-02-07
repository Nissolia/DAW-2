package ej_4POO_b;

public class Main {
	public static void main(String[] args) {
		// Array de facturas
		Factura[] facturas = new Factura[5];

		// Variables para calcular
		double facturacionTotal = 0;
		double litrosArticulo1 = 0;
		int facturasMayor600 = 0;

		// Bucle para introducir los datos de 5 facturas
		for (int i = 0; i < 5; i++) {

			double cantidadLitros = (int) (Math.random() * 50);
			System.out.println("Cantidad vendida en litros para la factura " + (i + 1) + ": " + cantidadLitros);

			double precioLitro = (int) (Math.random() * 50);
			System.out.println("Precio por litro para la factura " + (i + 1) + ": " + precioLitro);
			System.out.println();
			// Crear una nueva factura con los datos ingresados
			facturas[i] = new Factura(cantidadLitros, precioLitro);
			// Calcular el total de la factura
			double totalFactura = facturas[i].totalIngresos();
			// Sumar a facturación total
			facturacionTotal += totalFactura;
			// Verificar si es la factura del artículo 1
			if (i == 0) {
				litrosArticulo1 = facturas[i].litroArticulo();
			}
			// Verificar si la factura es mayor a 600
			if (facturas[i].factura600()) {
				facturasMayor600++;
			}
		}
		// Mostrar los resultados finales
		System.out.println("Facturación total de las 5 facturas: " + facturacionTotal + " €");
		System.out.println("Cantidad de litros vendidos del artículo 1: " + litrosArticulo1 + " litros");

		System.out.println("Número de facturas emitidas por más de 600€: " + facturasMayor600);

	}
}
