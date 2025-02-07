package Ej_4POO_a;

import java.util.Scanner;

public class Cuenta_main {
	public static void main(String[] args) {
		Scanner s = new Scanner(System.in);
		// Pedimos al usuario el nombre del titular de la cuenta
		System.out.println("Introduce el nombre del titular de la cuenta:");
		String titular = s.nextLine();
		// Preguntamos si quiere iniciar la cuenta con una cantidad
		System.out.println("¿Quieres iniciar la cuenta con una cantidad de dinero? (s/n):");
		String respuesta = s.nextLine();
		// Creamos una variable para la cuenta
		Cuenta cuenta;
		// Si el usuario quiere iniciar con una cantidad inicial,
		// usamos el ignore case por si pone una mayúscula
		if (respuesta.equalsIgnoreCase("s")) {
			System.out.println("Introduce la cantidad inicial:");
			double cantidadInicial = s.nextDouble();
			cuenta = new Cuenta(titular, cantidadInicial); // Creamos la cuenta con la cantidad inicial
		} else {
			cuenta = new Cuenta(titular); // Creamos la cuenta sin cantidad inicial
		}
		// Mostramos la información de la cuenta creada, con el toString de la clase
		System.out.println(cuenta);
		// Bucle para permitir al usuario ingresar y retirar dinero
		boolean continuar = true;
		while (continuar) {
			System.out.println("\n¿Qué acción deseas realizar?");
			System.out.println("1. Ingresar dinero");
			System.out.println("2. Retirar dinero");
			System.out.println("3. Mostrar saldo");
			System.out.println("4. Salir");
			int opcion = s.nextInt();
			switch (opcion) {
			case 1:
				System.out.println("Introduce la cantidad a ingresar: (Los decimales se ponen con ,)");
				double cantidadIngresar = s.nextDouble();
				// Hacemos un try catch por si la persona introduce mal los datos
				try {
					cuenta.setCantidad(cantidadIngresar);
					System.out.println("Cantidad ingresada correctamente.");
				} catch (Exception e) {
					e.getLocalizedMessage();
				}
				break;
			case 2:
				System.out.println("Introduce la cantidad a retirar:");
				double cantidadRetirar = s.nextDouble();
				// Hacemos un try catch por si la persona mete mete mal los datos
				try {
					cuenta.retirar(cantidadRetirar);
					System.out.println("Cantidad retirada correctamente.");
				} catch (Exception e) {
					e.getLocalizedMessage();
				}
				break;
			case 3:
				// Mostramos el estado de la cuenta
				System.out.println(cuenta);
				break;
			case 4:
				continuar = false;
				System.out.println("Gracias por usar nuestra aplicación.");
				break;
			default:
				System.out.println("Opción no válida, por favor elige una opción correcta.");
				break;
			}
		}
		
		s.close();
	}
}
