package ej_6Interfaces;

import java.util.ArrayList;

public class Main {
// hay que poner la misma salida que el profesor de todo
	public static void main(String[] args) {
		//
		double caloriasTotales = 0;
		// crear productos en un arraylist de varios productos que sume las calorias
		// Total de calorias: 197
		ArrayList<EsAlimento> listaAlimento = new ArrayList<>();
		// creamos 5 elementos en total con la funcion crear alimento
		for (int i = 0; i < 5; i++) {
			// Crear el alimento
			EsAlimento alimento = crearAlimento();
			// Añadir a la lista
			listaAlimento.add(alimento);
			System.out.println(alimento.toString());

			// Quiero mirar las calorías que hay en listaAlimento
			if (alimento instanceof Vino) {
				// Si el alimento es una instancia de Vino
				caloriasTotales += ((Vino) alimento).getCalorias();
			} else if (alimento instanceof Cereales) {
				// Si el alimento es una instancia de Cereales
				caloriasTotales += ((Cereales) alimento).getCalorias();
			}
		}

		System.out.println("Calorías totales: " + caloriasTotales);

		// crear arraylist de detergentes - importe total de los productos + suma de los
		// descuentos de todos los detergentes
		// Total de descuentos: 32%
		// Dinero ahorrado: 1.625 euros
		double descuentoTotal = 0;
		double dineroAhorrado = 0;
		ArrayList<Detergente> listaDetergentes = new ArrayList<>();
		// creamos 5 elementos en total con la funcion crear alimento
		for (int i = 0; i < 5; i++) {
			// Crear el alimento
			Detergente detergente = crearDetergente();
			// Añadir a la lista
			listaDetergentes.add(detergente);
			System.out.println(detergente.toString());

			// Quiero mirar las calorías que hay en listaAlimento
			descuentoTotal += (detergente).getDescuento();
			dineroAhorrado += (detergente).getPrecioDescuento();
		}
		System.out.println("Descuento total: " + descuentoTotal + "%");
		System.out.println("Dinero ahorrado: " + dineroAhorrado + "€");
	}

	private static Detergente crearDetergente() {
		// randoms para crear detergente al azar
		int rand = (int) (Math.random() * 3);
		int randPrecio =(int) Math.random() * 5+5;
		// marcas de detergente, para general al azar
		//rand entre 200 y 6000 - para el volumen
		int randVolumen = (int) (Math.random()*58000+200);
		String[] marcasDetergente = { "Ariel", "Mimosín", "Quita manchas" };

		// devolvemos el objeto detergente
		return new Detergente(marcasDetergente[rand], randPrecio,randVolumen);
	}

	/**
	 * 
	 * @return Alimento creado o null si hay algo mal
	 */
	private static EsAlimento crearAlimento() {
		// creamos un rand para poder "aleatorizar" lo que añadimos en la lista
		int rand = (int) (Math.random() * 2);
		int rand2 = (int) (Math.random() * 3);
		int randPrecio = 0;
		double randGrados = 0;
		String[] marcasCereal = { "Kellogs", "Fitness", "Chocokrispis" };
		String[] marcasVino = { "Rioja", "Manzanilla", "Jerez" };
		switch (rand) {
		case 0:
		case 1:
			// precio al azar para el producto entre 1 y 5
			randPrecio = (int) (Math.random() * 4+5);
			// Damos un valor al azar a tipocereal para que se cree automáticamente
			tipoCereal[] tipoCe = { tipoCereal.AVENA, tipoCereal.MAIZ, tipoCereal.TRIGO, tipoCereal.OTRO };
			rand = (int) (Math.random() * 4);
			// Devolvemos en el return el contenido completo
			return new Cereales(marcasCereal[rand2], randPrecio, tipoCe[rand]);
		case 2:
			randPrecio = (int) (Math.random() * 15+20);
			randGrados = Math.random() * 28+30;
			return new Vino(marcasVino[rand2], randGrados, randPrecio);

		}
		return null;

	}

}
