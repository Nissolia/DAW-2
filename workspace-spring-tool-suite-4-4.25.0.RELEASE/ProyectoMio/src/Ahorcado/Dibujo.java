package Ahorcado;

public class Dibujo {
    private int fallos; // Número de fallos cometidos
    private final int MAX_FALLOS = 6; // Máximo número de fallos permitidos

    public Dibujo() {
        fallos = 0;
    }

    // Incrementar el número de fallos
    public void incrementarFallo() {
        fallos++;
    }

    // Comprobar si el jugador ha perdido (cuando alcanza el máximo de fallos)
    public boolean comprobarSiPerdido() {
        return fallos >= MAX_FALLOS;
    }

    // Método para dibujar el estado del ahorcado según el número de fallos
    public void dibujar() {
        switch (fallos) {
            case 0:
                System.out.println(" _______\n |     |\n |\n |\n |\n |\n_|_");
                break;
            case 1:
                System.out.println(" _______\n |     |\n |     O\n |\n |\n |\n_|_");
                break;
            case 2:
                System.out.println(" _______\n |     |\n |     O\n |     |\n |\n |\n_|_");
                break;
            case 3:
                System.out.println(" _______\n |     |\n |     O\n |    /|\n |\n |\n_|_");
                break;
            case 4:
                System.out.println(" _______\n |     |\n |     O\n |    /|\\\n |\n |\n_|_");
                break;
            case 5:
                System.out.println(" _______\n |     |\n |     O\n |    /|\\\n |    /\n |\n_|_");
                break;
            case 6:
                System.out.println(" _______\n |     |\n |     O\n |    /|\\\n |    / \\\n |\n_|_");
                break;
        }
    }

    // Método para obtener el número actual de fallos
    public int getFallos() {
        return fallos;
    }
}
