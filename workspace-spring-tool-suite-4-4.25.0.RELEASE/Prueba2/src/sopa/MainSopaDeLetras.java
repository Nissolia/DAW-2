package sopa;

import java.util.Scanner;

public class MainSopaDeLetras {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        // Tamaño del tablero
        int size = 10;
        SopaDeLetras juego = new SopaDeLetras(size);

        // Agregar algunas palabras a la sopa de letras
        juego.agregarPalabra("JAVA", 1, 2, true);  // Horizontal
        juego.agregarPalabra("PYTHON", 0, 0, false);  // Vertical
        juego.agregarPalabra("CPLUSPLUS", 4, 5, true);  // Horizontal
        juego.agregarPalabra("RUBY", 6, 1, false);  // Vertical
        juego.agregarPalabra("SWIFT", 7, 3, true);  // Horizontal

        // Imprimir el tablero inicial
        System.out.println("Bienvenido al juego de la sopa de letras");
        System.out.println("Aquí está tu tablero:");
        juego.imprimirTablero();

        boolean seguirJugando = true;
        while (seguirJugando) {
            System.out.println("\nIntroduce una palabra para buscar (o escribe 'salir' para finalizar):");
            String palabra = scanner.nextLine().toUpperCase();  // Convertir a mayúsculas para evitar problemas

            if (palabra.equals("SALIR")) {
                seguirJugando = false;
                System.out.println("Gracias por jugar. ¡Hasta la próxima!");
            } else {
                // Intentar buscar la palabra
                juego.buscarPalabra(palabra);
            }
        }

        scanner.close();
    }
}
