package sopa;

public class BuscadorHorizontal implements BuscadorPalabras {
    private Tablero tablero;

    public BuscadorHorizontal(Tablero tablero) {
        this.tablero = tablero;
    }

    @Override
    public boolean buscarPalabra(String palabra) throws ExcepcionFueraDeLimite {
        for (int i = 0; i < tablero.getSize(); i++) {
            for (int j = 0; j <= tablero.getSize() - palabra.length(); j++) {
                boolean encontrada = true;
                for (int k = 0; k < palabra.length(); k++) {
                    if (tablero.getLetra(i, j + k) != palabra.charAt(k)) {
                        encontrada = false;
                        break;
                    }
                }
                if (encontrada) {
                    System.out.println("Palabra encontrada horizontalmente en la fila " + i);
                    return true;
                }
            }
        }
        return false;
    }
}
