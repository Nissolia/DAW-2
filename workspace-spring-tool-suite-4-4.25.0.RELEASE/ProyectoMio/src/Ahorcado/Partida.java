package Ahorcado;

import java.util.Scanner;
import java.util.Timer;
import java.util.TimerTask;

public class Partida {
    public static Dibujo horca;
    public static Palabra palabra;
    public static Scanner entrada;
    public static Ranking ranking;
    public static long inicioPartida;
    public static Timer temporizadorPistas;

    public static void main(String[] args) {
        horca = new Dibujo();
        palabra = new Palabra();
        ranking = new Ranking();
        entrada = new Scanner(System.in);
        boolean noHaResueltoMal = true;
        palabra.elegirPalabra();
        inicioPartida = System.currentTimeMillis();
        iniciarTemporizadorPistas();

        while (!comprobarFinal() && noHaResueltoMal) {
            switch (elegirDelMenu()) {
                case 1:
                    if (!palabra.comprobarLetra(pedirLetra())) {
                        horca.incrementarFallo();
                        if (horca.getFallos() % 3 == 0 && palabra.hayPistas()) {
                            System.out.println("Pista: " + palabra.mostrarPista());
                        }
                    }
                    mostrarProgreso();
                    break;
                case 2:
                    if (resolver()) {
                        System.out.println("¡Has ganado!");
                        añadirRegistroRanking();
                    } else {
                        mostrarDerrota();
                        noHaResueltoMal = false;
                    }
                    break;
                case 3:
                    System.exit(0);
                default:
                    break;
            }
        }

        entrada.close();
    }

    public static void iniciarTemporizadorPistas() {
        temporizadorPistas = new Timer();
        temporizadorPistas.schedule(new TimerTask() {
            @Override
            public void run() {
                System.out.println("Han pasado más de 2 minutos, aquí tienes una pista: " + palabra.mostrarPista());
            }
        }, 120000); // 2 minutos
    }

    public static void mostrarProgreso() {
        horca.dibujar();
        palabra.mostrarResultados();
        palabra.mostrarLetrasFallidas(); // Mostrar letras fallidas
    }

    public static char pedirLetra() {
        String entradaUsuario = "";
        while (entradaUsuario.isEmpty()) {
            System.out.print("Introduce una letra: ");
            entradaUsuario = entrada.nextLine();
            if (entradaUsuario.isEmpty()) {
                System.out.println("No has introducido ninguna letra. Inténtalo de nuevo.");
            }
        }
        return entradaUsuario.charAt(0);
    }

    public static boolean resolver() {
        System.out.print("Introduce la respuesta: ");
        return palabra.comprobarPalabra(entrada.nextLine());
    }

    public static boolean comprobarFinal() {
        return horca.comprobarSiPerdido() || palabra.comprobarSiGanado();
    }

    public static int elegirDelMenu() {
        int opcion = -1;
        while (opcion < 1 || opcion > 3) {
            System.out.println();
            System.out.println("Elige una opción:");
            System.out.println("1. Letra");
            System.out.println("2. Resolver");
            System.out.println("3. Abandonar");

            try {
                opcion = entrada.nextInt();
            } catch (Exception e) {
                System.out.println("Entrada inválida, introduce un número válido.");
                entrada.nextLine(); // Limpiar el buffer en caso de excepción
            }
          
        }
        entrada.nextLine(); // Consumir el salto de línea restante
        return opcion;
    }


    public static void limpiar() {
        for (int i = 0; i < 50; i++) {
            System.out.println();
        }
    }

    public static void añadirRegistroRanking() {
        long tiempoFinal = (System.currentTimeMillis() - inicioPartida) / 1000;
        int fallos = horca.getFallos();
        System.out.print("Introduce tu nombre: ");
        String nombreJugador = entrada.nextLine();
        ranking.añadirRegistro(nombreJugador, tiempoFinal, fallos);
        ranking.mostrarRanking();
    }

    public static void mostrarDerrota() {
        horca.dibujar();
        System.out.println("Lo siento, has perdido...");
        temporizadorPistas.cancel();
    }
}
