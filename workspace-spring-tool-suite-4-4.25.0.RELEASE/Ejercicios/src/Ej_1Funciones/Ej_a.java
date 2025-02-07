package Ej_1Funciones;

public class Ej_a {
//	Ejercicio a) Función a la que se le pasan dos enteros y muestra todos los números
//	comprendidos entre ellos, ambos incluidos. (Ten en cuenta que el usuario puede poner
//	el valor más pequeño en el 1º número o en el 2º número).

	public static void enteros(int num1, int num2) {
		if (num1 < num2) {
			for (int i = num1; i < num2; i++) {
				System.out.print(i + " ");
			}
		} else {
			System.out.println("No hay un número comprendido entre " + num1 + " y " + num2);
		}

	}
}
