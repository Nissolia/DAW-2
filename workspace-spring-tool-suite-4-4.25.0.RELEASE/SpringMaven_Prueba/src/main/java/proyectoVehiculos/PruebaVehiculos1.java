package proyectoVehiculos;

import java.util.ArrayList;

public class PruebaVehiculos1 {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		ArrayList<Vehiculo> lista = new ArrayList<>();
		lista.add(new Coche(null));
		lista.add(new Avion());
		lista.add(new Motocross());

		for (Vehiculo vehiculo : lista) {
			System.out.println(vehiculo.getTareas());
		}

	}

}
