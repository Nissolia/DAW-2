package sopa;

import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class SopaDeLetras<BuscadorPalabras> {
    private Tablero tablero;
    private List<Palabra> palabras;
    private BuscadorHorizontal buscadorHorizontal;
    private BuscadorVertical buscadorVertical;

    public SopaDeLetras(int size) {
        tablero = new Tablero(size);
        palabras = new ArrayList<>();
        buscadorHorizontal = new BuscadorHorizontal(tablero);
        buscadorVertical = new BuscadorVertical(tablero);
    }

    public void agregarPalabra(String palabra, int fila, int columna, boolean horizontal) {
        tablero.insertarPalabra(palabra, fila, columna, horizontal);
        palabras.add(new Palabra(palabra, fila, columna));
    }

    public void imprimirTablero() {
        tablero.imprimirTablero();
    }

    public void buscarPalabra(String palabra) {
        try {
            if (!buscadorHorizontal.buscarPalabra(palabra) && !buscadorVertical.buscarPalabra(palabra)) {
                throw new ExcepcionFueraDeLimite("Palabra no encontrada en la sopa de letras.");
            }
        } catch (ExcepcionFueraDeLimite e) {
            System.out.println(e.getMessage());
        }
    }

    public static void main(String[] args) {
        SopaDeLetras juego = new SopaDeLetras(10);
        Scanner scanner = new Scanner(System.in);

        // Agregar palabras divertidas a la sopa de letras
        juego.agregarPalabra("UNICORNIO", 1, 2, true);  // Horizontal
        juego.agregarPalabra("CHOCOLATE", 0, 0, false);  // Vertical
        juego.agregarPalabra("PIZZA", 4, 5, true);  // Horizontal
        juego.agregarPalabra("KOALA", 6, 1, false);  // Vertical
        juego.agregarPalabra("DINOSAURIO", 7, 3, true);  // Horizontal
        juego.agregarPalabra("CALAMAR", 3, 4, false);  // Vertical
        juego.agregarPalabra("TORTUGA", 5, 0, true);  // Horizontal
        juego.agregarPalabra("TIBURON", 8, 2, true);  // Horizontal

        juego.imprimirTablero();

        System.out.println("Introduce una palabra para buscar: ");
        String palabra = scanner.nextLine().toUpperCase();
        juego.buscarPalabra(palabra);
    }
}
