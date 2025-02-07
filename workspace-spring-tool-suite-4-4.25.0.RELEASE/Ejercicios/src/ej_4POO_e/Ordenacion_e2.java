package ej_4POO_e;

import java.util.Arrays;

public class Ordenacion_e2 {

    public static void main(String[] args) {
        // CREAMOS UN ARRAY DE TELÉFONOS
        Telefono2[] telefonos = new Telefono2[12];

        // AÑADIMOS LOS TELÉFONOS AL ARRAY
        telefonos[0] = new Telefono2("iPhone 12 Pro Max", 1259);
        telefonos[1] = new Telefono2("Xiaomi Mi 10 Pro", 999);
        telefonos[2] = new Telefono2("Huawei P40 Pro+", 1399);
        telefonos[3] = new Telefono2("Samsung Z Flip 5G", 1550);
        telefonos[4] = new Telefono2("Samsung S20", 1500);
        telefonos[5] = new Telefono2("LG V50", 899);
        telefonos[6] = new Telefono2("Xiaomi Mi 10 Pro", 999);
        telefonos[7] = new Telefono2("Huawei P40 Pro+", 1399);
        telefonos[8] = new Telefono2("Samsung Z Flip 5G", 1550);
        telefonos[9] = new Telefono2("Samsung S30", 1300);
        telefonos[10] = new Telefono2("Huawei P50 Pro+", 1399);
        telefonos[11] = new Telefono2("Samsung Z Flip 5G", 1550); 

        // Arrays.sort que usa el método compareTo para ordenar
        Arrays.sort(telefonos);

        // Mostrar el array de teléfonos ya ordenados
        for (Telefono2 telefono : telefonos) {
            System.out.println(telefono.getMarca() + " (" + telefono.getPrecio() + " euros)");
        }
    }
}
