package Ej_1Funciones;

public class Ej_b {
//	Ejercicio b) Escriba una función que sume los n primeros números impares de un valor
//	elegido por el usuario.

	public static void numerosPares(int num) {
		int total = 0;

		for (int i = 1; i < num; i++) {

			total += i;
			System.out.println(total);
			i++;
		}

		System.out.println("La suma total es: " + total);
	}

}
