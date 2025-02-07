package ej_4POO_e;

public class Ordenacion_e {

	public static void main(String[] args) {
		// CREAMOS UNA LISTA DE TELÉFONOS
		Telefono movil[] = new Telefono[12];
		movil[0] = new Telefono("iPhone 12 Pro Max", 1259);
		movil[1] = new Telefono("Xiaomi Mi 10 Pro", 999);
		movil[2] = new Telefono("Huawei P40 Pro+", 1399);
		movil[3] = new Telefono("Samsung Z Flip 5G", 1550);
		movil[4] = new Telefono("Samsung S20", 1500);
		movil[5] = new Telefono("LG V50", 899);
		movil[6] = new Telefono("Xiaomi Mi 10 Pro", 999);
		movil[7] = new Telefono("Huawei P40 Pro+", 1399);
		movil[8] = new Telefono("Samsung Z Flip 5G", 1550);
		movil[9] = new Telefono("Samsung S30", 1300);
		movil[10] = new Telefono("Huawei P50 Pro+", 1399);
		movil[11] = new Telefono("Samsung Z Flip 5G", 1550);

		// Ordenar la lista de teléfonos
		for (int i = 0; i < movil.length; i++) {
			if(i==movil.length) {
				movil[i].compareTo(movil[i-1]);
			}else {
				movil[i].compareTo(movil[i+1]);
			}
			
		}
		

		// Mostrar la lista de teléfonos ordenados
		for (Telefono telefono : movil) {
			System.out.println(telefono.getMarca() + " (" + telefono.getPrecio() + " euros)");
		}
	}
}
