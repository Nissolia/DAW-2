package sopa;

public class Palabra {
    private String contenido;
    private int fila;
    private int columna;
    private boolean encontrada;

    public Palabra(String contenido, int fila, int columna) {
        this.contenido = contenido;
        this.fila = fila;
        this.columna = columna;
        this.encontrada = false;
    }

    public String getContenido() {
        return contenido;
    }

    public int getFila() {
        return fila;
    }

    public int getColumna() {
        return columna;
    }

    public boolean isEncontrada() {
        return encontrada;
    }

    public void setEncontrada(boolean encontrada) {
        this.encontrada = encontrada;
    }
}
