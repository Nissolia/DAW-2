package sopa;

public class BuscadorVertical implements BuscadorPalabras {
    private Tablero tablero;

    public BuscadorVertical(Tablero tablero) {
        this.tablero = tablero;
    }

    public boolean buscarPalabra(String palabra) throws ExcepcionFueraDeLimite {
        int longitudPalabra = palabra.length();
        int size = tablero.getSize();

        // Revisar cada columna
        for (int j = 0; j < size; j++) {
            for (int i = 0; i <= size - longitudPalabra; i++) {
                boolean encontrada = true;
                for (int k = 0; k < longitudPalabra; k++) {
                    if (tablero.getLetra(i + k, j) != palabra.charAt(k)) {
                        encontrada = false;
                        break;
                    }
                }
                if (encontrada) {
                    System.out.println("Palabra encontrada verticalmente en la columna " + j);
                    return true;
                }
            }
        }
        return false;
    }
}
