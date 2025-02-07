package AdivinaLaPalabra;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class Palabras {
	private List<String> listaPalabras;

	// Constructor que inicializa con un conjunto de animales por defecto
	public Palabras() {
		listaPalabras = new ArrayList<>(Arrays.asList("ELEFANTE", "GATO", "PERRO", "CABALLO", "TIBURON", "LEON",
				"TIGRE", "JIRAFA", "COCODRILO", "PANDA", "GORILA", "CANGURO", "AVESTRUZ", "DELFIN", "RINOCERONTE",
				"HIPOPOTAMO", "OSO", "ZORRO", "PINGUINO", "CABRA"));
	}

	/***
	 * 
	 * @return palabra aleatoria
	 */
	public String obtenerPalabraAleatoria() {
		if (listaPalabras.isEmpty()) {
			throw new IllegalStateException("No hay palabras disponibles en el banco.");
		}
		return palabraAleatoria();
	}

	/***
	 * Elegimos una palabra aleatoria teniendo en cuenta el tamaño total del array
	 * de la lista de letras que tenemos
	 * 
	 * @return índice de las lista de palabras
	 */
	private String palabraAleatoria() {
		int indice = (int) (Math.random() * listaPalabras.size());
		return listaPalabras.get(indice);
	}

	/**
	 * Método para comprobar si la lista de palabras está vacía
	 * 
	 * @return booleano si está o no vacío
	 */
	public boolean estaVacio() {
		return listaPalabras.isEmpty();
	}

}
