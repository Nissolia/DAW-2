package batallaFinal;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;
import org.springframework.context.annotation.PropertySource;

@Configuration
@ComponentScan("batallaFinal")
@PropertySource("classpath:datos.txt") 
public class Config {

	@Value("${nombres}")
	private String nombres;

	@Value("${ataqueEspecial}")
	private String ataqueEspecial;

	@Bean
	public Personaje crearPersonajeConPropiedades() {
		String[] nombresArray = nombres.split(",");
		String[] ataquesArray = ataqueEspecial.split(",");

		// Elegir un nombre de forma aleatoria
		String nombreSeleccionado = nombresArray[(int) (Math.random() * nombresArray.length)];

		// Elegir un ataque con un 50%, siendo mas probale el primero
		String ataqueSeleccionado = elegirAtaque(ataquesArray);

		return new Personaje(nombreSeleccionado, ataqueSeleccionado);
	}

	/***
	 * He creado este segundo para que puedan enfrentarse dos personajes, ya que al
	 * hacerlo desde el mismo bean me he percatado que generaba el mismo objeto
	 * 
	 * @return
	 */
	@Bean
	public Personaje crearSegundoPersonaje() {
		String[] nombresArray = nombres.split(",");
		String[] ataquesArray = ataqueEspecial.split(",");

		// Elegir un nombre de forma aleatoria
		String nombreSeleccionado = nombresArray[(int) (Math.random() * nombresArray.length)];

		// Elegir un ataque con un 50%, siendo mas probale el primero
		String ataqueSeleccionado = elegirAtaque(ataquesArray);

		return new Personaje(nombreSeleccionado, ataqueSeleccionado);
	}

	/**
	 * Elegir un ataque, pero el primero tiene un 50% más de posibilidades
	 * 
	 * @param ataquesArray
	 * @return ataque al azar
	 */
	private String elegirAtaque(String[] ataquesArray) {
	    // Generar un número aleatorio en el rango [0, 100)
	    double rand = Math.random() * 100;

	    // El primer ataque tiene un 50% de probabilidad
	    if (rand <= 50) {
	        return ataquesArray[0]; 
	    } 
	   
	    else if (rand <= 75) {
	        return ataquesArray[1]; 
	    } 
	   
	    else if (rand <= 88) {
	        return ataquesArray[2]; 
	    } 
	    
	    else {
	        return ataquesArray[3]; 
	    }
	}

}
