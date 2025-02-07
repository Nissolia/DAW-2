package ej_4POO_f;

import java.util.Arrays;

public class Boli_main {

    public static void main(String[] args) {
        // CREAMOS UN ARRAY DE BOLÍGRAFOS
        Boligrafo[] boli = new Boligrafo[4];

        // AÑADIMOS LOS BOLÍGRAFOS AL ARRAY
        boli[0] = new Boligrafo("Pilot SuperGrip", 1);
        boli[1] = new Boligrafo("Pilot G2", 1.3);
        boli[2] = new Boligrafo("Bic Cristal", 0.5);
        boli[3] = new Boligrafo("Pilot G2", 1.3);

        // COMPARACIÓN DE BOLI 1 CON 2
        Boligrafo boli1 = boli[0];
        Boligrafo boli2 = boli[1];
        System.out.println("Comparando " + boli1.getNombre() + " con " + boli2.getNombre() + ": " + boli1.compareTo(boli2));

        // COMPARACIÓN DE BOLI 2 CON 3
        Boligrafo boli4 = boli[3];
        System.out.println("Comparando " + boli2.getNombre() + " con " + boli4.getNombre() + ": " + boli2.compareTo(boli4));

        // ORDENAMOS BOLÍGRAFOS POR NOMBRE USANDO Arrays.sort
        Arrays.sort(boli);

        // SEPARACIÓN VISUAL
        System.out.println("---------------------");

        // LISTA DE BOLÍGRAFOS ORDENADOS
        System.out.println("Lista de bolígrafos ordenados por marca:");
        for (Boligrafo b : boli) {
            System.out.println(b);
        }
    }
}
