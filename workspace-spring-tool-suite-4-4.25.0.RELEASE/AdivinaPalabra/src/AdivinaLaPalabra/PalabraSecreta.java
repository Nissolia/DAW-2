package AdivinaLaPalabra;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

class PalabraSecreta {
	private String palabra;
	private char[] progreso;
	private List<Character> letrasAdivinadas;
	private int intentosRestantes;
	private String[][] pistas;
	private int fallos;

	public PalabraSecreta(String palabra, int intentos) {
		this.palabra = palabra.toUpperCase();
		this.progreso = new char[palabra.length()];
		// Se inicia el proceso con todas las palabras ocultas
		Arrays.fill(progreso, '_');
		this.letrasAdivinadas = new ArrayList<>();
		this.intentosRestantes = intentos;
		// Inicializar contador de fallos
		this.fallos = 0;
		generarPistas();
	}

	/***
	 * Generamos las pistas segun los fallos que vaya generando la persona, las
	 * pistas han de ser letras que no haya adivinado anteriormente la persona
	 */
	private void generarPistas() {
		pistas = new String[3][3];
		// Primera letra de la palabra
		pistas[0][0] = Character.toString(palabra.charAt(0));
		// Última letra de la palabra
		pistas[1][1] = Character.toString(palabra.charAt(palabra.length() - 1));
		// Una letra al azar que aún no esté adivinada
		for (int i = 1; i < palabra.length() - 1; i++) {
			if (progreso[i] == '_') {
				pistas[2][2] = Character.toString(palabra.charAt(i));
				break;
			}
		}
	}

	/***
	 * Método usado para adivinar una de las letras
	 * 
	 * @param letra
	 * @return booleano de si ha acertado o no
	 */
	public boolean adivinarLetra(char letra) {
		letra = Character.toUpperCase(letra);
		// Si ya contiene la letra muestra un mensaje para demostrar que la letra ya ha sido adivinada
		if (letrasAdivinadas.contains(letra)) {
			throw new IllegalArgumentException("Letra ya adivinada.");
		}
		letrasAdivinadas.add(letra);
		boolean acierto = false;
		for (int i = 0; i < palabra.length(); i++) {
			if (palabra.charAt(i) == letra) {
				progreso[i] = letra;
				acierto = true;
			}
		}

		if (!acierto) {
			intentosRestantes--;
			fallos++; // Incrementar el contador de fallos al fallar
		}
		return acierto;
	}

	/***
	 * 
	 * @return String
	 */
	public String getProgreso() {
		String progresoConEspacios = "";
		for (char c : progreso) {
			progresoConEspacios += c + " ";
		}
		return progresoConEspacios.trim();
	}

	/***
	 * 
	 * @return devuelve intentos restantes
	 */
	public int getIntentosRestantes() {
		return intentosRestantes;
	}

	/***
	 * Verifica si la palabra esta adivinada
	 * 
	 * @return
	 */
	public boolean estaCompleta() {
		return palabra.equals(new String(progreso));
	}

	/***
	 * Mostramos las pistas de 2 en 2
	 * 
	 * @return
	 */
	public String mostrarPista() {
		// Primera pista después de 2 fallos
		if (fallos == 2) {
			return "Primera letra: " + pistas[0][0];
			// Segunda pista después de 4 fallos
		} else if (fallos == 4) {
			return "Última letra: " + pistas[1][1];
			// Tercera pista después de 6 fallos
		} else if (fallos == 6) {
			return "Letra al azar: " + pistas[2][2];
		}
		// Si no hay pista no devuelve nada
		return "";
	}
}
