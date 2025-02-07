package Ej_2String;


public class Ej_1 {

	public static void main(String[] args) {
		compararString("abcioi", "adefi");

		return;
	}
//	Ejercicio a) Crea una función que reciba dos cadenas como parámetro (str1, str2) e
//imprima otras dos cadenas como salida (out1, out2).
// - out1 contendrá todos los caracteres presentes en la str1 pero 
//	NO estén presentes en str2.
// - out2 contendrá todos los caracteres presentes en la str2 pero 
//  NO estén presentes en str1.
//Ejemplo: str1=aeiou r str2=eo z w out1=aiu out2=zw

	private static String compararString(String str1, String str2) {
		String out1 = "", out2 = "";
		int cont;

		// Comprobación del primer String
		for (int i = 0; i < str1.length(); i++) {
			cont = 0;
			for (int j = 0; j < str2.length(); j++) {
				if (str1.charAt(i) != str2.charAt(j)) {
					cont++;
				}
			}
			if (cont == str2.length()) {

				out1 += str1.charAt(i);
			}
		}

		// Comprobación del segundo String
		for (int i = 0; i < str2.length(); i++) {
			cont = 0; // Reiniciar cont aquí
			for (int j = 0; j < str1.length(); j++) {
				if (str2.charAt(i) != str1.charAt(j)) { // Aquí comparar correctamente str2 con str1
					cont++;
				}
			}
			if (cont == str1.length()) {
				out2 += str2.charAt(i);
			}
		}
		System.out.println("str1: " + str1 + " str2: " + str2 + " out1: " + out1 + " out2: " + out2);
		return out1 + out2;
	}
}
