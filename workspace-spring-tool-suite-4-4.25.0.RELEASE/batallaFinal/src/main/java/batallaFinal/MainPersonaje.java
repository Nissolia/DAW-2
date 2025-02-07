package batallaFinal;

import org.springframework.context.annotation.AnnotationConfigApplicationContext;
import java.util.Scanner;

public class MainPersonaje {

	public static void main(String[] args) {
		// Iniciamos el contexto de SpringAnnotations
		AnnotationConfigApplicationContext miContexto = new AnnotationConfigApplicationContext(Config.class);
System.out.println("Bienvenido a la batalla final...");
		// Creamos el scanner para pedir el nombre
		Scanner sc = new Scanner(System.in);
		System.out.println("Pon tu nombre:");
		String nombre = sc.nextLine();

		// Obtenemos el bean del pj que va a tener el nombre del usuario
		Personaje pj1 = miContexto.getBean("crearPersonajeConPropiedades", Personaje.class);
		pj1.setNombre(nombre);

		// Bean para el personaje de la máquina
		Personaje pj2 = miContexto.getBean("crearSegundoPersonaje", Personaje.class);

		// Mostrar información de los personajes
		System.out.println("Personaje 1: " + pj1);
		System.out.println("Personaje 2 (enemigo): " + pj2);

		// Simulación del combate
		while (pj1.getVida() > 0 && pj2.getVida() > 0) {
			// Turno del p1 que es el jugador
			System.out.println("\nTurno de " + pj1.getNombre() + ":");
			System.out.println("Presiona Enter para atacar, o escribe 'huir' para intentar huir.");
			String accion = sc.nextLine().trim().toLowerCase();

			if (accion.equals("huir")) {
				System.out.println(pj1.getNombre() + " ha huido de la pelea. ¡Es un cobarde pero sigue vivo!");
				break; // El combate termina si huye
			}

			// ataque del pj1 al pj2
			int daño = pj1.getAtaqueBase();
			pj2.setVida(pj2.getVida() - daño);
			System.out.println(
					pj1.getNombre() + " ataca a " + pj2.getNombre() + " y le hace " + daño + " puntos de daño.");
			System.out.println(pj2.getNombre() + " tiene " + pj2.getVida() + " puntos de vida restantes.");

			// confirmamos si el enemigo ha caído
			if (pj2.getVida() <= 0) {
				System.out.println(pj2.getNombre() + " ha sido derrotado. " + pj1.getNombre() + " gana el combate.");
				break;
			}

			// Turno de pj2 (enemigo)
			System.out.println("\nTurno de " + pj2.getNombre() + ":");
			System.out.println("El enemigo ataca...");
			// Ataque del enemigo
			daño = pj2.getAtaqueBase();
			pj1.setVida(pj1.getVida() - daño);
			System.out.println(
					pj2.getNombre() + " ataca a " + pj1.getNombre() + " y le hace " + daño + " puntos de daño.");
			System.out.println(pj1.getNombre() + " tiene " + pj1.getVida() + " puntos de vida restantes.");

			// Verificar si el jugador ha caído
			if (pj1.getVida() <= 0) {
				System.out.println(pj1.getNombre() + " ha sido derrotado. " + pj2.getNombre() + " gana el combate.");
				break;
			}
		}
		sc.close();
		// cerramos el contexto
		miContexto.close();
	}
}
