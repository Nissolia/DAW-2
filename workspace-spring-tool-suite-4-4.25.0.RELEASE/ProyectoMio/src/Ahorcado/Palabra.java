package Ahorcado;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class Palabra implements Pista {
    private String palabraOculta;
    private char[] letrasDescubiertas;
    private List<Character> letrasFallidas; // Usar una lista para manejar las letras fallidas dinámicamente
    private int letrasRestantes;
    private int indicePista;

    public Palabra() {
        letrasFallidas = new ArrayList<>(); // Inicializar como una lista
        indicePista = 0;
    }

    public void elegirPalabra() {
        List<String> palabras = new ArrayList<>();
        File file = new File("/src/palabras.txt");

        if (!file.exists()) {
            System.err.println("El archivo no existe: " + file.getAbsolutePath());
            return; // Detener el método si no se encuentra el archivo
        }

        try (BufferedReader br = new BufferedReader(new FileReader(file))) {
            String linea;
            while ((linea = br.readLine()) != null) {
                palabras.add(linea.trim());
            }

            if (!palabras.isEmpty()) {
                String elegida = palabras.get((int) (Math.random() * palabras.size()));
                palabraOculta = elegida;
                letrasDescubiertas = new char[palabraOculta.length()];
                letrasRestantes = palabraOculta.length();
            } else {
                System.err.println("El archivo está vacío, no se puede elegir una palabra.");
            }
        } catch (IOException e) {
            System.err.println("Error al leer el archivo: " + e.getMessage());
        }
    }


    public boolean comprobarPalabra(String palabraIngresada) {
        return palabraOculta.equalsIgnoreCase(palabraIngresada);
    }

    public boolean comprobarSiGanado() {
        return letrasRestantes == 0;
    }

    @Override
    public String mostrarPista() {
        if (indicePista == 0) {
            indicePista++;
            return "Empieza por: " + palabraOculta.charAt(0);
        } else if (indicePista == 1) {
            indicePista++;
            return "Termina por: " + palabraOculta.charAt(palabraOculta.length() - 1);
        } else if (indicePista == 2) {
            indicePista++;
            return "Tiene " + contarVocales() + " vocales";
        } else {
            return "No hay más pistas.";
        }
    }

    public boolean hayPistas() {
        return indicePista < 3 || letrasOcultasRestantes() > 0;
    }

    private int contarVocales() {
        int contador = 0;
        for (char c : palabraOculta.toCharArray()) {
            if ("aeiouAEIOU".indexOf(c) != -1) {
                contador++;
            }
        }
        return contador;
    }

    private int letrasOcultasRestantes() {
        int contador = 0;
        for (char c : letrasDescubiertas) {
            if (c == '\u0000') {
                contador++;
            }
        }
        return contador;
    }

    public void mostrarResultados() {
        for (int i = 0; i < letrasDescubiertas.length; i++) {
            if (letrasDescubiertas[i] == '\u0000') {
                System.out.print("_ ");
            } else {
                System.out.print(letrasDescubiertas[i] + " ");
            }
        }
        System.out.println();
    }

    public boolean comprobarLetra(char letra) {
        boolean encontrada = false;
        for (int i = 0; i < palabraOculta.length(); i++) {
            if (palabraOculta.charAt(i) == letra && letrasDescubiertas[i] == '\u0000') {
                letrasDescubiertas[i] = letra;
                letrasRestantes--;
                encontrada = true;
            }
        }

        // Si la letra no fue encontrada, agregarla a las letras fallidas
        if (!encontrada) {
            if (!letrasFallidas.contains(letra)) { // Evitar duplicados
                letrasFallidas.add(letra); // Registrar la letra fallida
            }
        }

        return encontrada;
    }

    public void mostrarLetrasFallidas() {
        System.out.print("Letras fallidas: ");
        
        // Ordenar las letras fallidas alfabéticamente
        char[] letrasFallidasArray = new char[letrasFallidas.size()];
        for (int i = 0; i < letrasFallidas.size(); i++) {
            letrasFallidasArray[i] = letrasFallidas.get(i);
        }

        Arrays.sort(letrasFallidasArray); // Ordenar el array

        // Convertir las letras a String y mostrarlas
        String letrasFallidasString = new String(letrasFallidasArray);
        System.out.print(letrasFallidasString + " ");
        
        System.out.println();
    }
}
