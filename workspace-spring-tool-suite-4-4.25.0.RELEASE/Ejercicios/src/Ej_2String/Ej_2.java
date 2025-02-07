package Ej_2String;

import java.util.Scanner;

public class Ej_2 {
	static int[][] fechaNum = new int[2][3];

	public static void main(String[] args) {
		Scanner s = new Scanner(System.in);
		String[] fechas = new String[2];

		System.out.println("Bienvenido al restador de fechas. El formato de una fecha es: dd/MM/yyyy");
		System.out.println("Escriba la primera fecha:");
		fechas[0] = s.nextLine();
		System.out.println("Escriba la segunda fecha:");
		fechas[1] = s.nextLine();

		try {
			comprobarCumple(fechas);
			comprobarFormato(fechas);

			// Pedir al usuario que elija cuál de las fechas es la primera
			System.out.println("¿Cuál de las 2 fechas será la primera? (Elija 1 o 2)");
			int eleccion = s.nextInt();
			if (eleccion < 1 || eleccion > 2) {
				System.out.println("Elección inválida. Cerrando la aplicación.");
				
			}

			// Ordenar las fechas según la elección del usuario
			String fecha1 = fechas[eleccion - 1];
			String fecha2 = fechas[2 - eleccion];

			System.out.println("La primera fecha es entonces: " + fecha1);
			System.out.println("La segunda fecha es entonces: " + fecha2);

			// Calcular la diferencia de días
			long diferenciaDias = calcularDiferenciaDias(fecha1, fecha2);
			System.out.println("La diferencia de días es: " + Math.abs(diferenciaDias));

		} catch (NumberFormatException e) {
			System.out.println("Se ha producido el siguiente error: " + e);
			System.out.println("Formato de fechas incorrectas. Cerrando la aplicación.");
		} catch (ExceptionMiFecha e1) {
			e1.printStackTrace();
			
		}
		s.close();
	}

	// Comprobación para ver si el formato de las fechas es correcto (dd/MM/yyyy)
	private static void comprobarFormato(String[] fechas) {
		for (String fecha : fechas) {
			if (!validarFecha(fecha)) {
				System.out.println("Formato de fecha incorrecto. Cerrando la aplicación.");
				throw new NumberFormatException("Formato de fecha incorrecto");
			}
		}

		System.out.println("Has añadido las fechas correctamente.");
	}

	// Función que valida si una fecha es correcta en el formato dd/MM/yyyy
	private static boolean validarFecha(String fecha) {
		if (fecha.length() != 10 || fecha.charAt(2) != '/' || fecha.charAt(5) != '/') {
			return false;
		}
		String diaStr = fecha.substring(0, 2);
		String mesStr = fecha.substring(3, 5);
		String anioStr = fecha.substring(6, 10);

		int dia, mes, anio;
		try {
			dia = Integer.parseInt(diaStr);
			mes = Integer.parseInt(mesStr);
			anio = Integer.parseInt(anioStr);
		} catch (NumberFormatException e) {
			return false;
		}
		if (mes < 1 || mes > 12) {
			return false;
		}
		if (dia < 1 || dia > 30) {
			return false;
		}

		if (anio < 1990 || anio > 2100) {
			return false;
		}

		return true;
	}

	// Calcular la diferencia en días entre dos fechas (dd/MM/yyyy)
	private static long calcularDiferenciaDias(String fecha1, String fecha2) {

		int[][] fechasNum = new int[2][3];

		// Rellenar la matriz con las dos fechas
		fechasNum[0] = convertirFechaANumeros(fecha1);
		fechasNum[1] = convertirFechaANumeros(fecha2);

		// Convertir ambas fechas en "días totales" desde un punto fijo (por
		// simplicidad, desde el año 0)
		int dias1 = convertirFechaADiasTotales(fechasNum[0][0], fechasNum[0][1], fechasNum[0][2]);
		int dias2 = convertirFechaADiasTotales(fechasNum[1][0], fechasNum[1][1], fechasNum[1][2]);

		// Devolver la diferencia absoluta de días
		return Math.abs(dias1 - dias2);
	}

	// Convierte una fecha en formato dd/MM/yyyy a un array de enteros [día, mes,
	// año]
	private static int[] convertirFechaANumeros(String fecha) {
		int dia = Integer.parseInt(fecha.substring(0, 2));
		int mes = Integer.parseInt(fecha.substring(3, 5));
		int anio = Integer.parseInt(fecha.substring(6, 10));
		return new int[] { dia, mes, anio };
	}

	// Convierte una fecha día, mes, año a un total de días contando desde el año 0
	private static int convertirFechaADiasTotales(int dia, int mes, int anio) {
		int diasTotales = anio * 365;

		for (int i = 1; i < mes; i++) {
			diasTotales += 30;
		}
		diasTotales += dia;

		return diasTotales;
	}

	// Método que lanza una excepción si la primera fecha contiene el cumpleaños
	// 29/11
	private static void comprobarCumple(String[] fechas) throws ExceptionMiFecha {
		String cumple = "29/11";
		if (fechas[0].startsWith(cumple) || fechas[1].startsWith(cumple)) {
			throw new ExceptionMiFecha("Fecha coincide con el cumpleaños 29/11.");
		}
	}
}
