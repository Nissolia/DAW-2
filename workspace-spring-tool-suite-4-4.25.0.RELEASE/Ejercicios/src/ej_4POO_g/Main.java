package ej_4POO_g;

import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);

		// Pedir datos del primero objeto
		System.out.println("Introduce el nombre:");
		String nombre1 = scanner.nextLine();
		System.out.println("Introduce la edad:");
		int edad1 = scanner.nextInt();
		System.out.println("Introduce el sexo (H/M):");
		char sexo1 = scanner.next().charAt(0);
		System.out.println("Introduce el peso (kg):");
		double peso1 = scanner.nextDouble();
		System.out.println("Introduce la altura (m):");
		double altura1 = scanner.nextDouble();
		// Limpiar el buffer
		scanner.nextLine();
		// Crear el primer objeto
		Persona persona1 = new Persona(nombre1, edad1, sexo1, peso1, altura1);
		// Crear el segundo objeto (sin peso y altura)
		System.out.println("Introduce el nombre del segundo objeto:");
		String nombre2 = scanner.nextLine();
		System.out.println("Introduce la edad del segundo objeto:");
		int edad2 = scanner.nextInt();
		System.out.println("Introduce el sexo del segundo objeto (H/M):");
		char sexo2 = scanner.next().charAt(0);
		scanner.nextLine(); // Limpiar el buffer
		Persona persona2 = new Persona(nombre2, edad2, sexo2);
		// Crear el tercer objeto por defecto
		Persona persona3 = new Persona();
		persona3.setNombre("Persona por defecto");
		persona3.setEdad(30);
		persona3.setPeso(70);
		persona3.setAltura(1.75);
		// Mostrar información de cada persona
		mostrarInformacion(persona1);
		mostrarInformacion(persona2);
		mostrarInformacion(persona3);

		scanner.close();
	}

	/****************** FUNCIONES ******************/
	private static void mostrarInformacion(Persona persona) {
		System.out.println("\nInformación de la persona:");
		System.out.println(persona);
		// Comprobar IMC de la persona
		int imc = persona.calcularIMC();
		System.out.print("Estado IMC: ");
		if (imc == 0) {
			System.out.print("Peso ideal");
		} else if (imc == -1) {
			System.out.print("Por debajo del peso ideal");
		} else {
			System.out.print("Sobrepeso");
		}

		// Mostrar si es mayor de edad
		boolean mayorEdad = persona.esMayorDeEdad();
		System.out.print("¿Es mayor de edad? ");
		if (mayorEdad) {
			System.out.print("Sí");
		} else {
			System.out.print("No");
		}

	}

}
