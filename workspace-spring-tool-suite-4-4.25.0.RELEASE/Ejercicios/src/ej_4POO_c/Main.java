package ej_4POO_c;


public class Main {
    public static void main(String[] args) {
    	//Array de facturas
    	Factura_a[] facturas = new Factura_a[5];
    	
        // Variables para calcular
        double facturacionTotal = 0;
        double litrosArticulo1 = 0;
        int facturasMayor600 = 0;

       
        // Bucle para introducir los datos de 5 facturas
        for (int i = 0; i < 5; i++) {
            int codigoProducto = (int) (Math.random() * 3+1);
            System.out.println("Código del producto (1, 2 o 3) para la factura " + (i + 1) + ": "+codigoProducto);

            double cantidadLitros = (int) (Math.random() * 50);
            System.out.println("Cantidad vendida en litros para la factura " + (i + 1) + ": "+cantidadLitros);
           

           
            // Crear una nueva factura con los datos ingresados
            facturas[i] = new Factura_a(cantidadLitros);
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
