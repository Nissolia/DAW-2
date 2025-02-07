package Ahorcado;

import java.util.ArrayList;
import java.util.Comparator;

public class Ranking {
    // Lista de registros
    private ArrayList<Registro> listaRanking;

    // Constructor
    public Ranking() {
        listaRanking = new ArrayList<>();
    }

    // Añadir un nuevo registro al ranking
    public void añadirRegistro(String nombreJugador, long tiempo, int fallos) {
        listaRanking.add(new Registro(nombreJugador, tiempo, fallos));
        listaRanking.sort(Comparator.comparingLong(Registro::getTiempo).thenComparingInt(Registro::getFallos));
    }

    // Mostrar el ranking
    public void mostrarRanking() {
        System.out.println("Ranking de Jugadores:");
        for (int i = 0; i < listaRanking.size(); i++) {
            Registro registro = listaRanking.get(i);
            System.out.println((i + 1) + ". " + registro.getNombreJugador() + " - Tiempo: " 
                    + registro.getTiempo() + "s, Fallos: " + registro.getFallos());
        }
    }

    // Clase interna Registro
    class Registro {
        private String nombreJugador;
        private long tiempo;
        private int fallos;

        public Registro(String nombreJugador, long tiempo, int fallos) {
            this.nombreJugador = nombreJugador;
            this.tiempo = tiempo;
            this.fallos = fallos;
        }

        public String getNombreJugador() {
            return nombreJugador;
        }

        public long getTiempo() {
            return tiempo;
        }

        public int getFallos() {
            return fallos;
        }
    }
}
