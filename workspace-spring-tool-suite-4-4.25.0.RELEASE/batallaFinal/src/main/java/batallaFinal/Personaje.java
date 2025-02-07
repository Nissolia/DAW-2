package batallaFinal;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.stereotype.Component;

@Component
public class Personaje {
    private String nombre;
    private String ataqueEspecial;
    private String clase;
    private int ataqueBase;
    private double posibleCrit;
    private int vida;

    private lvl nivelDificultad;

    // Constructor vacío
    public Personaje() {
        this.nombre = "Noelia";
        this.ataqueEspecial = "Ninguno";
        this.clase = tipoClase();
        this.ataqueBase = (int) generarRand(2, 10);
        this.posibleCrit = generarRand(0, 5);
    }

    // Constructor con parámetros
    public Personaje(String nombre, String ataqueEspecial) {
        this.nombre = nombre;
        this.ataqueEspecial = ataqueEspecial;
        this.clase = tipoClase();
        this.ataqueBase = (int) generarRand(2, 10);
        this.posibleCrit = generarRand(0, 5);
    }

    // Inyección de nivel de dificultad
    @Autowired
    @Qualifier("lvlFacil")
    public void setNivel(lvl nivelDificultad) {
        this.nivelDificultad = nivelDificultad;
        this.vida = nivelDificultad.getVida();
    }

    // Métodos auxiliares
    public static double generarRand(int minimo, int maximo) {
        return (Math.random() * (maximo - minimo + 1)) + minimo;
    }

    // Tipo de clase generada al azar
    public static String tipoClase() {
        String[] clases = { "guerrero", "mago", "hechicero", "chaman", "cazador", "paladin", "brujo" };
        int indiceClase = (int) generarRand(0, clases.length - 1);
        return clases[indiceClase];
    }

    // Getters y Setters
    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getAtaqueEspecial() {
        return ataqueEspecial;
    }

    public void setAtaqueEspecial(String ataqueEspecial) {
        this.ataqueEspecial = ataqueEspecial;
    }

    public String getClase() {
        return clase;
    }

    public void setClase(String clase) {
        this.clase = clase;
    }

    public int getAtaqueBase() {
        return ataqueBase;
    }

    public void setAtaqueBase(int ataqueBase) {
        this.ataqueBase = ataqueBase;
    }

    public double getPosibleCrit() {
        return posibleCrit;
    }

    public void setPosibleCrit(double posibleCrit) {
        this.posibleCrit = posibleCrit;
    }

    public int getVida() {
        return vida;
    }

    public void setVida(int vida) {
        this.vida = vida;
    }

    // toString
    @Override
    public String toString() {
        return "Personaje: \n Nombre: " + nombre + ", Ataque especial: " + ataqueEspecial + ", Clase: " + clase
                + ", Daño de ataque: " + ataqueBase + ", Posible crítico: " + (int)(posibleCrit) + ", Vida: " + vida;
    }
}
