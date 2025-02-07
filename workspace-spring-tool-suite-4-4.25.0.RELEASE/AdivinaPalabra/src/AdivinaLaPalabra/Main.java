package AdivinaLaPalabra;

/**
 * fichero que exporte jugador que importe tambien el ranking 
 * - segun la persona se pone niveles de dificultad, a mas se juega mas complicaciones
 * resolver directamente la palabra y varios errores menos- que tenga una penalizacion
 * que no cuente ciertos caracteres
 */
import java.util.Scanner;

public class Main {
	public static void main(String[] args) {
		Scanner s = new Scanner(System.in);
		Ranking ranking = new Ranking();
		Palabras bancoPalabras = new Palabras();
		// Damos la bienvenida al juego
		System.out.println("¡Bienvenido a Adivina la palabra!");
		// Pedimos el nombre para usar el ranking
		System.out.print("Introduce tu nombre: ");
		String nombreJugador = s.nextLine();
		Jugador jugador = new Jugador(nombreJugador);

		// Obtener palabra aleatoria de las palabras que tenemos
		String palabraAleatoria = bancoPalabras.obtenerPalabraAleatoria();
		PalabraSecreta palabra = new PalabraSecreta(palabraAleatoria, 10);
		// El momento exacto en el que la persona comienza a jugar
		long inicio = System.currentTimeMillis();
		// Si los intentos son superiores a 0 y si la palabra no esta completa entramos
		// en el bucle
		while (palabra.getIntentosRestantes() > 0 && !palabra.estaCompleta()) {
			espacioTerminal();
			// Mostramos la palabra y como está en ese momento
			System.out.println("\nPalabra: " + palabra.getProgreso());
			System.out.println("Intentos restantes: " + palabra.getIntentosRestantes());

			// Mostrar pista si corresponde con los criterios correspondientes
			String pista = palabra.mostrarPista();
			if (!pista.isEmpty()) {
				System.out.println("Pista: " + pista);
			}
			// Preguntamos a la persona por la letra que quiere añadir
			System.out.print("Introduce una letra: ");
			char letra = s.next().charAt(0);
			// Comprobamos si añade una letra o no
			try {
				if (palabra.adivinarLetra(letra)) {
					System.out.println("¡Correcto!");
				} else {
					System.out.println("Incorrecto...");
					// Incrementamos fallos si no acierta
					jugador.incrementarFallos();
				}
			} catch (IllegalArgumentException e) {
				System.out.println(e.getMessage());
			}
		}

		// Salimos del bucle si ha acertado o si ha fallado
		long fin = System.currentTimeMillis();
		// Registramos el tiempo total del jugador
		jugador.setTiempo(fin - inicio);
		espacioTerminal();
		if (palabra.estaCompleta()) {
			System.out.println("¡Felicidades! Has adivinado la palabra: " + palabra.getProgreso());
			ranking.agregarJugador(jugador);
		} else {
			System.out.println("Has perdido. La palabra era: " + palabraAleatoria);
			System.out.println("No estás en el ranking por que has perdido");
		}
		// Agregar al ranking y mostrar resultados
		System.out.println("\n\n");
		ranking.mostrarRanking();

		s.close();
	}

	/***
	 * Espacio que creamos entre un apartado y otro para que se vea limpia la
	 * consola
	 */
	private static void espacioTerminal() {
		for (int i = 0; i < 50; i++) {
			System.out.println();
		}

	}
}
