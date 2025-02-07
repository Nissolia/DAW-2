package ej_5Dinamicas;

import java.util.ArrayList;

public class MainDinamicas {

	public static void main(String[] args) {
		// Creamos el arrayList a partir de la función
		ArrayList<Integer> lista1 = new ArrayList<Integer>(llenarArraylist());
		ArrayList<Integer> lista2 = new ArrayList<Integer>(llenarArraylist());
		System.out.println("ArrayList completamente llena:");
		// mostramos el array lleno
		mostrarArrayList(lista1);
		System.out.println();
		/********* Como vaciar un arrayList: *********/
		// Vaciamos el arraylist
		vaciarArrayList(lista1);
		System.out.println("ArrayList vacio:");
		// mostramos de nuevo el Array pero esta vez despues del clear
		mostrarArrayList(lista1);
		System.out.println();
		/********* Ver si arraylist está vacío: *********/
		System.out.println("Lista 1: ");
		estaVacio(lista1);
		System.out.println("Lista 2: ");
		estaVacio(lista2);
		System.out.println();
		/********* Recortar la capacidad de un arrayList: *********/
		lista2.trimToSize();
		System.out.println("Lista 2 con trimToSize");
		mostrarArrayList(lista2);
		System.out.println();
		/*********
		 * Reemplazar el segundo elemento de una Arraylist con elemento especificado:
		 *********/
		System.out.println("Lista 2 sin modificar:");
		mostrarArrayList(lista2);
		lista2.set(1, 35);
		System.out.println("Lista 2 modificada:");
		mostrarArrayList(lista2);
		System.out.println();
		/********* Elementos de arrayList usando posición elementos: *********/
		System.out.println("Posiciones de arrayList lista 2: ");
		mostrarArrayListElemento(lista2);

	}

	/***
	 * 
	 * @return ArrayList<Integer> : completo
	 */
	public static ArrayList<Integer> llenarArraylist() {
		int maxArray = 10;
		ArrayList<Integer> lista = new ArrayList<Integer>();
		for (int i = 0; i < maxArray; i++) {
			lista.add((int) (Math.random() * 50));
		}
		return lista;
	}

	/****
	 * 
	 * @param ArrayList<Integer> lista
	 */
	public static void mostrarArrayList(ArrayList<Integer> lista) {
		for (Integer dato : lista) {
			System.out.print(dato + " ");
		}
		System.out.println();
	}

	/****
	 * 
	 * @param ArrayList<Integer> lista
	 */
	public static void mostrarArrayListElemento(ArrayList<Integer> lista) {
		for (int i = 0; i < lista.size(); i++) {
			System.out.print("Posición " + (i+1) + " : ");
			System.out.println(lista.get(i) + " ");
		}
		
	}

	/****
	 * 
	 * @param rrayList<Integer> : lista
	 */
	public static void vaciarArrayList(ArrayList<Integer> lista) {
		lista.clear();
	}

	/***
	 * 
	 * @param ArrayList<Integer> : lista
	 */
	public static void estaVacio(ArrayList<Integer> lista) {
		if (lista.isEmpty()) {
			System.out.println("La lista está vacía.");
		} else {
			System.out.println("La lista contiene elementos.");
		}
	}
}
