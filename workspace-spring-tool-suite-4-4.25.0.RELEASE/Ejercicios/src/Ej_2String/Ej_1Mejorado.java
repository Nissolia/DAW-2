package Ej_2String;

import java.util.Scanner;

public class Ej_1Mejorado {

	public static void main(String[] args) {
		Scanner sc = new Scanner(System.in);
		// Variables
		String str1 = "aeiou r", str2 = "eo z w";
		String out1 = "", out2 = "";
		// Pedimos datos al usuario
		str1 = sc.nextLine();
		str1 = sc.nextLine();
		//Ejecutamos la funcion para ver si coinciden
		out1 = bucleString(str1, str2); // comprobamos si los caracteres del string 1 están en el string 2
		out2 = bucleString(str2, str1); // comprobamos si los caracteres del string 2 están en el string 1

		System.out.println("str1: " + str1 + " str2: " + str2 + " | out1: " + out1 + " out2: " + out2);

		
		sc.close();
	}

// Funcion para comprobar si los String son diferentes entre sí 
//	y si es asi lo guardamos en la variable out
	private static String bucleString(String s1, String s2) {
		int cont = 0;
		String out = "";

		for (int i = 0; i < s1.length(); i++) {
			cont = 0;
			for (int j = 0; j < s2.length(); j++) {
				if (s1.charAt(i) != s2.charAt(j)) {
					cont++;
				}
			}
			if (cont == s2.length()) {

				out += s1.charAt(i);
			}
		}
		return out;
	}
}