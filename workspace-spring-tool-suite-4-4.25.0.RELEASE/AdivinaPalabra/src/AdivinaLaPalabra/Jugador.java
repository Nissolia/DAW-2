package AdivinaLaPalabra;


class Jugador {
    private String nombre;
    private long tiempo; // En milisegundos
    private int fallos;

    public Jugador(String nombre) {
        this.nombre = nombre;
        this.tiempo = 0;
        this.fallos = 0;
    }

    public void setTiempo(long tiempo) {
        this.tiempo = tiempo;
    }

    public long getTiempo() {
        return tiempo;
    }

    public void incrementarFallos() {
        this.fallos++;
    }

    public int getFallos() {
        return fallos;
    }
    public int setFallos(int fallos) {
        return this.fallos = fallos;
    }
    

    public String getNombre() {
        return nombre;
    }

    @Override
    public String toString() {
        return "Jugador: " + nombre + ", Tiempo: " + (tiempo / 1000) + " segundos, Fallos: " + fallos;
    }
}


