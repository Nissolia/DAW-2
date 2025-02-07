package AdivinaLaPalabra;

import java.util.ArrayList;
import java.util.Comparator;
import java.util.List;

class Ranking {
	private List<Jugador> jugadores;

	public Ranking() {
		jugadores = new ArrayList<>();
		// Agregar jugadores por defecto con tiempos aleatorios entre 15 y 20 segundos
		agregarJugadoresPorDefecto();
	}

	/***
	 * 
	 * 
	 * @param jugador
	 */
	public void agregarJugador(Jugador jugador) {
		jugadores.add(jugador);
	}

	/***
	 * 
	 */
	public void mostrarRanking() {
		// Ordenar jugadores con un comparador
		jugadores.sort(new Comparator<Jugador>() {
			@Override
			public int compare(Jugador j1, Jugador j2) {
				// Comparar primero por tiempo
				if (j1.getTiempo() < j2.getTiempo()) {
					return -1;
				} else if (j1.getTiempo() > j2.getTiempo()) {
					return 1;
				} else {
					// Si los tiempos son iguales, comparar por fallos
					return Integer.compare(j1.getFallos(), j2.getFallos());
				}
			}
		});

		System.out.println("Ranking:");
		for (Jugador jugador : jugadores) {
			System.out.println(jugador);
		}
	}

	/***
	 * Creamos varios jugadores para poder crear correctamente el ranking
	 */
	private void agregarJugadoresPorDefecto() {
		String[] nombres = { "Antonio", "Manuel", "Pepa", "María", "David", "Juana", "Miranda", "Carlos", "Rafaela",
				"Pedro" };

		for (String nombre : nombres) {
			// Genera un tiempo aleatorio entre 15 y 20 segundos
			long tiempo = (long) (15000 + Math.random() * 5000);
			// Número de fallos aleatorio entre 1 y 4
			int fallos = 1 + (int) (Math.random() * 4);

			Jugador jugador = new Jugador(nombre);
			jugador.setTiempo(tiempo);
			jugador.setFallos(fallos);
			jugadores.add(jugador);
		}
	}
}
